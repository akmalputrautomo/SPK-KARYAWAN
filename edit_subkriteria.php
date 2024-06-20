<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login.php?error_login=1');
    exit();
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
    <title>Form Sub Kriteria</title>
</head>
<body class="bg-gray-100">

<div class="content-wrapper">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
                    <h4 class="text-2xl font-bold mb-4 text-center bg-orange-500 text-white  rounded-md">Form Sub Kriteria</h4>
                    
                    <?php if (!empty($_GET['error_msg'])): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <?= htmlspecialchars($_GET['error_msg']); ?>
                        </div>
                    <?php endif ?> 

                    <form method="post" action="update_subkriteria.php" enctype="multipart/form-data">
                        <?php foreach ($db->select('*','sub_kriteria')->where('id_subkriteria='.$_GET['id'])->get() as $data): ?>
                            <input type="hidden" name="id" value="<?= htmlspecialchars($data[0]) ?>">
                            <div class="mb-4">
                                <label for="subkriteria" class="block text-sm font-medium text-gray-700">Nama Sub Kriteria</label>
                                <input type="text" readonly class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 border block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="subkriteria" name="subkriteria" value="<?= htmlspecialchars($data['subkriteria']) ?>">
                            </div>
                            <div class="mb-4">
                                <label for="id_kriteria" class="block text-sm font-medium text-gray-700">Nama Kriteria</label>
                                <select required class="mt-1 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="id_kriteria" name="id_kriteria">
                                    <?php foreach ($db->select('*','kriteria')->get() as $val): ?> 
                                        <option value="<?= htmlspecialchars($val['id_kriteria']); ?>" <?php if($data['id_kriteria'] == $val['id_kriteria']) { echo 'selected'; } ?>>
                                            <?= htmlspecialchars($val['kriteria']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>   
                            </div>
                            <div class="mb-4">
                                <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
                                <input type="number" name="nilai" id="nilai" class="mt-1 focus:ring-indigo-500 border focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?= htmlspecialchars($data['nilai']) ?>" pattern="^[0-9\.\-\/]+$">
                            </div>
                        <?php endforeach ?>
                        
                        <div class="mb-4">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt-16">
    <?php include 'footer.php';?>
</div>
</body>
</html>

<script type="text/javascript">
    $(function(){
        $("#sk").addClass('menu-top-active');
    });
</script>
