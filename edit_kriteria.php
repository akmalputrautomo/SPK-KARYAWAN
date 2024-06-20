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
    <title>Form Kriteria</title>
</head>
<body class="bg-gray-100">
<div class="py-[4rem] flex flex-col justify-center items-center ">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <div class="mb-8 text-center">
            <h4 class="text-2xl font-bold mb-4 bg-orange-500 text-center text-white rounded-md ">Form Kriteria</h4>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="update_kriteria.php" enctype="multipart/form-data">
                    <?php if (!empty($_GET['error_msg'])): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <?= htmlspecialchars($_GET['error_msg']); ?>
                        </div>
                    <?php endif ?>
                    <?php foreach ($db->select('*', 'kriteria')->where('id_kriteria=' . $_GET['id'])->get() as $data): ?>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($data[0]) ?>">
                        <div class="mb-4">
                            <label for="kriteria" class="block text-sm font-medium text-gray-700">Nama Kriteria</label>
                            <input type="text" class="form-input border rounded-md shadow-sm w-full h-10" id="kriteria" name="kriteria" value="<?= htmlspecialchars($data['kriteria']) ?>" required>
                        </div>
                        <div class="mb-4">
                            <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
                            <input type="number" name="bobot" class="border form-input rounded-md shadow-sm w-full h-10" value="<?= htmlspecialchars($data['bobot']) ?>" pattern="^[0-9\.\-\/]+$" required>
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select class="form-select rounded-md shadow-sm border w-full h-10" name="type" required>
                                <option value="Cost" <?php if ($data['type'] == 'Cost') { echo 'selected'; } ?>>Cost</option>
                                <option value="Benefit" <?php if ($data['type'] == 'Benefit') { echo 'selected'; } ?>>Benefit</option>
                            </select>
                        </div>
                    <?php endforeach ?>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    

<?php include 'footer.php';?>

</body>
</html>


<script type="text/javascript">
    $(function(){
        $("#ds").addClass('menu-top-active');
    });
</script>
