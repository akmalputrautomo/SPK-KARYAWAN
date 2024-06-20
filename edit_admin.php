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
    <title>Document</title>
</head>
<body class="bg-gray-100">

<div class="content-wrapper">
    <div class="container mx-auto">
        <div class="w-full">
            <?php if (!empty($_GET['error_msg'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?= $_GET['error_msg']; ?></span>
                </div>
            <?php endif ?>
        </div>
        <div class="w-full max-w-md mx-auto pt-4">
            <form method="post" action="update_admin.php" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h4 class="text-2xl font-bold mb-4 px-4 flex text-white rounded-md justify-center bg-orange-500 w-full">Edit Manager</h4>
                <?php foreach ($db->select('*','admin')->where('id='.$_GET['id'])->get() as $data): ?>
                    <input type="hidden" name="id" value="<?= $data[0]?>">
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                        <input required type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" value="<?= $data['nama']?>">
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                        <textarea required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alamat" name="alamat"><?= $data['alamat']?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="telepon" class="block text-gray-700 text-sm font-bold mb-2">Telepon</label>
                        <input required type="number" name="telepon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" pattern="^[0-9\.\-\/]+$" value="<?= $data['telepon']?>">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input required type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" value="<?= $data['email']?>">
                    </div>
                <?php endforeach ?>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php';?>

<script type="text/javascript">
    $(function(){
        $("#sk").addClass('menu-top-active');
    });
</script>
</body>
</html>
