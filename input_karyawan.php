<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login.php?error_login=1');
    exit();
}
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

<div class="content-wrapper">
    <div class="content">
        <div class="container mx-auto">
            <div class="w-full">
                <?php if (!empty($_GET['error_msg'])) : ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <?= htmlspecialchars($_GET['error_msg']); ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="w-full max-w-lg mx-auto pt-4">
                <form method="post" action="insert_karyawan.php" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h4 class="text-2xl font-bold mb-4 px-4 bg-orange-500 text-center rounded-md text-white">Form Sales</h4>
                    <div class="mb-4">
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="nik" name="nik">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
                        <input type="text" required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="nama" name="nama">
                    </div>
                    <div class="mb-4">
                        <label for="jeniskelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select required class="mt-1 block w-full pl-3 pr-10 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="jeniskelamin" name="jeniskelamin">
                            <option value="">-PILIH JENIS KELAMIN-</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="alamat" name="alamat"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="number" required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="telepon" name="telepon">
                    </div>
                    <div class="mb-4">
                        <label for="ttl" class="block text-sm font-medium text-gray-700">Tanggal / Bulan / Tahun Lahir</label>
                        <input type="date" required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="ttl" name="ttl">
                    </div>
                    <div class="mb-4">
                        <label for="tempatlahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" required class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="tempatlahir" name="tempatlahir">
                    </div>
                    <div class="mb-4">
                        <label for="pendidikan" class="block text-sm font-medium text-gray-700">Pendidikan Terakhir</label>
                        <select required class="mt-1 block w-full pl-3 pr-10 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="pendidikan" name="pendidikan">
                            <option value="">-PILIH PENDIDIKAN-</option>
                            <option value="SD">SD</option>
                            <option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <input required type="text" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="jabatan" name="jabatan">
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function() {
        $("#ck").addClass('menu-top-active');
    });
</script>
