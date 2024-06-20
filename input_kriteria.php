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
<div class="content-wrapper mx-auto py-8">
    <div class="container">
        <div class="flex justify-center">
            <div class="w-full lg:w-1/2">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex justify-center py-4">
                    <h2 class="text-xl font-bold bg-orange-500 w-[50%] text-center rounded-md text-white">Form Kriteria</h2>
                    </div>
                    <form method="post" action="insert_kriteria.php" enctype="multipart/form-data">
                        <?php if (!empty($_GET['error_msg'])): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <?= $_GET['error_msg']; ?>
                            </div>
                        <?php endif ?>
                        <div class="mb-4">
                            <label for="kriteria" class="block text-gray-700 text-sm font-bold mb-2">Nama Kriteria</label>
                            <input type="text" required class="form-input rounded-md shadow-sm w-full border" id="kriteria" name="kriteria">
                        </div>
                        <div class="mb-4">
                            <label for="bobot" class="block text-gray-700 text-sm font-bold mb-2">Bobot</label>
                            <?php 
                                $n = 0; 
                                foreach ($db->select('bobot','kriteria')->get() as $k){
                                    $n += $k['bobot'];
                                }
                                $h = 1000-$n;
                            ?>
                            <input type="number" required name="bobot" class="border form-input rounded-md shadow-sm w-full" pattern="^[0-9\.\-\/]+$" value="<?= $h ?>">
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                            <select class="form-select rounded-md shadow-sm w-full border" name="type">
                                <option value="Cost">Cost</option>
                                <option value="Benefit">Benefit</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt-[10rem]">
<?php include 'footer.php';?>

</div>
    
</body>
</html>

<script type="text/javascript">
    $(function(){
        $("#ds").addClass('menu-top-active');
    });
</script>
