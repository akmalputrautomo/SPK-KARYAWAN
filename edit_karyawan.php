<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login.php?error_login=1');
    exit(); // Memastikan tidak ada eksekusi lebih lanjut setelah redirect
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
    <title>Form Karyawan</title>
</head>

<body class="bg-gray-100">

<div class="content-wrapper px-[20rem] pt-4">
    <div class=" w-full ">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex justify-center items-center">
            <h2 class="text-xl font-bold mb-4 bg-orange-500 text-center rounded-md text-white w-[50%]">Form Sales</h2>
            </div>
            <form method="post" action="update_karyawan.php" enctype="multipart/form-data">
                <?php if (!empty($_GET['error_msg'])): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <?= htmlspecialchars($_GET['error_msg']); ?>
                    </div>
                <?php endif ?>
                <?php foreach ($db->select('*','karyawan')->where('id_calon_kr='.$_GET['id'])->get() as $val): ?>
                    <input type="hidden" name="id_calon_kr" value="<?= $val['id_calon_kr']?>">
                    <div class="mb-4">
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" readonly class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="nik" name="nik" value="<?= $val['NIK']?>">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Sales</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="nama" name="nama" value="<?= $val['nama']?>">
                    </div>
                    <div class="mb-4">
                        <label for="jeniskelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="jeniskelamin" name="jeniskelamin">
                            <option value="">-PILIH JENIS KELAMIN-</option>
                            <option <?= ($val['jeniskelamin'] == 'Pria') ? 'selected' : '' ?> value='Pria'>Pria</option>
                            <option <?= ($val['jeniskelamin'] == 'Wanita') ? 'selected' : '' ?> value='Wanita'>Wanita</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="2" name="alamat"><?= $val['alamat']?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="number" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="telepon" name="telepon" value="<?= $val['telepon']?>">
                    </div>
                    <div class="mb-4">
                        <label for="ttl" class="block text-sm font-medium text-gray-700">Tanggal / Bulan / Tahun Lahir</label>
                        <input type="date" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="ttl" name="ttl" value="<?= $val['ttl']?>">
                    </div>
                    <div class="mb-4">
                        <label for="tempatlahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="tempatlahir" value="<?= $val['TempatLahir']?>" name="tempatlahir">
                    </div>
                    <div class="mb-4">
                        <label for="pendidikan" class="block text-sm font-medium text-gray-700">Pendidikan Terakhir</label>
                        <select required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="pendidikan" name="pendidikan">
                            <option <?= ($val['PendidikanTerakhir'] == 'SD') ? 'selected' : '' ?> value='SD'>SD</option>
                            <option <?= ($val['PendidikanTerakhir'] == 'SMA') ? 'selected' : '' ?> value='SMA'>SMA</option>
                            <option <?= ($val['PendidikanTerakhir'] == 'D3') ? 'selected' : '' ?> value='D3'>D3</option>
                            <option <?= ($val['PendidikanTerakhir'] == 'S1') ? 'selected' : '' ?> value='S1'>S1</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <input required type="text" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="jabatan" value="<?= $val['Jabatan']?>" name="jabatan">
                    </div>
                    <div class="mb-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Simpan</button>
                    </div>
                <?php endforeach ?>
            </form>
        </div>
    </div>
</div>    

</body>

</html>

<?php include 'footer.php';?>
<script type="text/javascript">
    $(function(){
        $("#ck").addClass('menu-top-active');
    });
</script>
