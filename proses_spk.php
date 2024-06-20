<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php?error_login=1');
    }
?>
<?php 
    session_start();
    error_reporting(0);
    include 'db/db_config.php';
?>
<?php include 'menu.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Proses SPK</title>
</head>
<body class="bg-gray-100 min-h-screen">
<div class="container mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="pb-4">
        <h4 class="text-2xl font-bold">Proses SPK</h4>
        <div class="bg-orange-500 h-[0.5rem] w-full "></div>
        </div>
        <h3 class="text-xl font-semibold mb-4">Tabel Hasil TPA</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                        <th class="border border-gray-300 px-4 py-2">
                            <?php
                                $tmp = explode('_',$k['kriteria']);
                                echo ucwords(implode(' ',$tmp));
                            ?>
                        </th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                    ?>
                        <tr class="border-t">
                            <td class="border border-gray-300 px-4 py-2"><?= $data['nama']?></td>
                            <?php foreach ($db->select('kriteria','kriteria')->get() as $td): ?>
                            <td class="border border-gray-300 px-4 py-2"><?= $db->getnilaisubkriteria($data[$td['kriteria']])?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center my-6">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="tpl()">PROSES</button>
        </div>
        <div id="proses_spk" style="display: none;">
            <h3 class="text-xl font-semibold mb-4">Normalisasi</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                            <th class="border border-gray-300 px-4 py-2">
                                <?php
                                    $tmp = explode('_',$k['kriteria']);
                                    echo ucwords(implode(' ',$tmp));
                                ?>
                            </th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                        ?>
                            <tr class="border-t">
                                <td class="border border-gray-300 px-4 py-2"><?= $data['nama']?></td>
                                <?php foreach ($db->select('kriteria','kriteria')->get() as $td): ?>
                                <td class="border border-gray-300 px-4 py-2"><?= number_format($db->rumus($db->getnilaisubkriteria($data[$td['kriteria']]),$td['kriteria']),2   );?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <h3 class="text-xl font-semibold my-4">Proses Penentuan</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($db->select('karyawan.id_calon_kr,karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                        ?>
                            <tr class="border-t">
                                <td class="border border-gray-300 px-4 py-2"><?= $data['nama']?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                <?php 
                                    $hasil = [];
                                    $bulan = date('m'); 
                                    $tahun = date('Y'); 
                                    $tanggal = date('Y-m-d');

                                    $minggu = $db->weekOfMonth($tanggal);

                                    foreach($db->select('kriteria','kriteria')->get() as $dt){
                                        array_push($hasil,$db->rumus($db->getnilaisubkriteria($data[$dt['kriteria']]),$dt['kriteria'])*$db->bobot($dt['kriteria']));
                                    }
                                    echo $h = number_format(array_sum($hasil));
                                    if($db->select('id_calon_kr','hasil_spk')->where("id_calon_kr='$data[id_calon_kr]' and minggu='$minggu' and bulan='$bulan' and tahun='$tahun'")->count() == 0){
                                        $db->insert('hasil_spk',"'','$data[id_calon_kr]','$h','$minggu','$bulan','$tahun'")->count();
                                    } else {
                                        $db->update('hasil_spk',"hasil_spk='$h',minggu='$minggu',bulan='$bulan',tahun='$tahun'")->where("id_calon_kr='$data[id_calon_kr]' and minggu='$minggu' and bulan='$bulan' and tahun='$tahun'")->count();
                                    }
                                    
                                    ?>
                                </td>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <h3 class="text-xl font-semibold my-4">Perankingan</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Hasil</th>
                            <?php $no = 1; foreach ($db->select('kriteria','kriteria')->get() as $th): ?>
                            <th class="border border-gray-300 px-4 py-2">K<?= $no?></th>
                            <?php $no++; endforeach ?>
                            <th class="border border-gray-300 px-4 py-2" rowspan="2" style="padding-bottom:25px">Hasil</th>
                            <th class="border border-gray-300 px-4 py-2" rowspan="2" style="padding-bottom:25px">Ranking</th>
                        </tr>
                        <tr>
    <th class="border border-gray-300 px-4 py-2">Bobot</th>
    <?php foreach ($db->select('bobot','kriteria')->get() as $th): ?>
    <th class="border border-gray-300 px-4 py-2"><?= intval($th['bobot']) ?></th>
    <?php endforeach ?>
</tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $bulan = date('m'); 
                            $tahun = date('Y'); 
                            $tanggal = date('Y-m-d');

                            $minggu = $db->weekOfMonth($tanggal);
                            foreach ($db->select('distinct(karyawan.nama),hasil_tpa.*,hasil_spk.*','karyawan,hasil_tpa,hasil_spk')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr and karyawan.id_calon_kr=hasil_spk.id_calon_kr and hasil_spk.minggu='.$minggu.' and hasil_spk.bulan='.$bulan.' and hasil_spk.tahun='.$tahun.'')->order_by('hasil_spk.hasil_spk','desc')->get() as $data):
                        ?>
                            <tr class="border-t">
                                <td class="border border-gray-300 px-4 py-2"><?= $data['nama']?></td>
                                <?php foreach ($db->select('kriteria','kriteria')->get() as $td): ?>
                                <td class="border border-gray-300 px-4 py-2"><?= number_format($db->rumus($db->getnilaisubkriteria($data[$td['kriteria']]),$td['kriteria']),2);?></td>
                                <?php endforeach ?>
                                <td class="border border-gray-300 px-4 py-2">
                                <?php 
                                    $hasil = [];
                                    foreach($db->select('kriteria','kriteria')->get() as $dt){
                                        array_push($hasil,$db->rumus($db->getnilaisubkriteria($data[$dt['kriteria']]),$dt['kriteria'])*$db->bobot($dt['kriteria']));
                                    }
                                    echo $r = number_format(array_sum($hasil));
                                ?>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <?= $no?>
                                </td>
                            </tr>
                        <?php
                            $no++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="pt-[12rem]">
<?php include 'footer.php'; ?>
</div>
<script type="text/javascript">
    function tpl() {
        document.getElementById('proses_spk').style.display = 'block';
    }
</script>
</body>
</html>

