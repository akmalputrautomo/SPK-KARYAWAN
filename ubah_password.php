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
<body>
    
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6">Form Ubah Password</h2>
        <form method="post" action="update_password.php" enctype="multipart/form-data">
            <?php if (!empty($_GET['error_msg'])): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <?= $_GET['error_msg']; ?>
                </div>
            <?php endif ?>
            <div class="mb-4">
                <label for="inputEmail" class="block text-gray-700">New Password</label>
                <input required type="password" name="np" class="form-input mt-1 block w-full border border-gray-300 rounded py-2 px-3" id="inputEmail" placeholder="New Password">
            </div>
            <div class="mb-4">
                <label for="inputPassword" class="block text-gray-700">Re-type Password</label>
                <input required type="password" name="rp" class="form-input mt-1 block w-full border border-gray-300 rounded py-2 px-3" id="inputPassword" placeholder="Re-type Password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>


<?php include 'footer.php';?>
<script type="text/javascript">
    $(function(){
        $("#sk").addClass('menu-top-active');
    });
</script>