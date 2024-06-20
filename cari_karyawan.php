<?php
    session_start();
	error_reporting(0);
?>
<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">

<div class="content-wrapper">
    <div class="container mx-auto">
        <div class="py-8">
            <div class="w-full md:w-1/2 mx-auto">
                <div class="bg-white shadow-md rounded px-4 py-4 mb-4">
                    <strong class="block mb-2">Cari Calon Karyawan</strong>
                    <form method="get" action="cari_karyawan.php">
                        <div class="flex">
                            <input type="text" class="w-full border border-gray-300 rounded py-2 px-4 mr-2" name="nama" placeholder="Search">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full">
            <div class="bg-white shadow-md rounded">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $name = $_GET['nama'];
                            $no = 1;
                            foreach ($db->select('karyawan.*,hasil_spk.hasil_spk','karyawan,hasil_spk')->where('karyawan.id_calon_kr=hasil_spk.id_calon_kr and karyawan.nama')->like("$name")->get() as $row):?>
                            <tr>
                                <td class="border px-4 py-2"><?= $no++?></td>
                                <td class="border px-4 py-2"><?= $row['nama']?></td>
                                <td class="border px-4 py-2"><?= $row['hasil_spk']?></td>
                            </tr>   
                        <?php endforeach ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pt-[10rem]">
<?php include 'footer.php'; ?>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#home").addClass('menu-top-active');
    });
</script>
</body>
</html>

