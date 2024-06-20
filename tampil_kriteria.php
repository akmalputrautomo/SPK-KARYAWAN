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
        <div class="py-6 px-4">
            <h4 class=" text-2xl font-bold ">Master Data Kriteria</h4>
            <div class="rounded-md bg-orange-500 h-[0.5rem] w-full"></div>
            </div>
        <div class="w-full">
            <?php if (!empty($_GET['error_msg'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <?= $_GET['error_msg']; ?>
                </div>
            <?php endif ?>
        </div>  
        <div class="w-full pl-[2rem]">
            <a href="input_kriteria.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a>
            <br>
            <div class="overflow-x-auto pt-4">
                <table id="example1" class="table-auto min-w-full border border-solid bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Kriteria</th>
                            <th class="px-4 py-2 border">Bobot</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($db->select('*','kriteria')->get() as $data): ?>
                            <tr>
                                <td class="px-4 py-2 border"><?= $no;?></td>
                                <td class="px-4 py-2 border"><?= $data['kriteria']?></td>
                                <td class="px-4 py-2 border"><?= $data['bobot']?></td>
                                <td class="px-4 py-2 border items-center flex justify-center gap-3 ">
                                    <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="edit_kriteria.php?id=<?php echo $data[0]?>">Edit</a>
                                    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Yakin Hapus?')" href="delete_kriteria.php?id=<?php echo $data[0]?>">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>
<div class="pt-[14rem]">
    <?php include 'footer.php'; ?>
</div>
</body>
</html>

<script type="text/javascript">
    $(function(){
        $("#ds").addClass('menu-top-active');
    });

    $(function() {
        $('#example1').dataTable();
    });
</script>
