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
    <title>Form Kriteria</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 flex justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-[50%]">
            <div class="flex justify-center">
            <h2 class="text-2xl font-bold bg-orange-500 text-white flex justify-center rounded-md w-[50%] ">Edit Penilaian Sales</h2>
        </div>
            <?php if (!empty($_GET['error_msg'])): ?>
                <div class="mb-4 p-4 bg-red-200 text-red-800 rounded-lg">
                    <?= $_GET['error_msg']; ?>
                </div>
            <?php endif ?>
            <?php foreach ($db->select('hasil_tpa.*,karyawan.id_calon_kr,karyawan.nama','hasil_tpa,karyawan')->where('hasil_tpa.id_calon_kr=karyawan.id_calon_kr and hasil_tpa.id_calon_kr='.$_GET['id'])->get() as $data): ?>
                <form method="post" action="update_tpa.php">
                    <input type="hidden" name="id" value="<?= $data['id_calon_kr']?>">
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama</label>
                        <input type="text" class="form-control block w-full mt-2 p-2 border border-gray-300 rounded-lg" id="nama" name="nama" value="<?= $data['nama']?>" readonly>
                    </div>
                    <?php foreach ($db->select('id_kriteria,kriteria','kriteria')->get() as $r): ?>
                        <div class="mb-4">
                            <label class="block text-gray-700"><?= $r['kriteria']?></label>
                            <select required class="form-control block w-full mt-2 p-2 border border-gray-300 rounded-lg" name="kriteria[]">
                                <?php foreach ($db->select('*','sub_kriteria')->where('id_kriteria = '.$r['id_kriteria'].'')->get() as $val): ?> 
                                    <option value="<?= $val['id_subkriteria']?>"
                                    <?php if($db->getnamesubkriteria($data[$r['kriteria']]) == $val['subkriteria']) { echo ' selected="selected"'; } ?>
                                    ><?= $val['subkriteria'] ?> (Nilai = <?= $val['nilai'] ?>)</option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    <?php endforeach ?>
                    <div class="mt-6">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function(){
        $("#tpa").addClass('menu-top-active');
    });
</script>
