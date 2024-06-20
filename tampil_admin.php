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
        <div class="py-8 flex flex-col border">
            <h4 class="text-2xl font-bold pl-4">Data Manager</h4>
            <div class="px-4 py-2">
            <div class="w-full bg-orange-500 rounded-md h-[0.5rem] px-[2rem]">
        </div>
        </div>
        </div>
        
        <div class="w-full">
            <?php if (!empty($_GET['error_msg'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline"><?= $_GET['error_msg']; ?></span>
                </div>
            <?php endif ?>
        </div>
        <div class="w-full px-[2rem]">
            <div class="mb-4">
                <a href="input_admin.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a>
            </div>
            <div class="bg-white shadow-md rounded ">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Telepon</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($db->select('*','admin')->get() as $data): ?>
                            <tr>
                                <td class="border px-4 py-2"><?= $no;?></td>
                                <td class="border px-4 py-2"><?= $data['nama']?></td>
                                <td class="border px-4 py-2"><?= $data['alamat']?></td>
                                <td class="border px-4 py-2"><?= $data['telepon']?></td>
                                <td class="border px-4 py-2"><?= $data['email']?></td>
                                <td class="border px-4 py-2">
                                    <?php
                                    if($data['username']!="admin"):
                                    ?>
                                    <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2" href="edit_admin.php?id=<?php echo $data[0]?>">Edit</a>
                                    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Yakin Hapus?')" href="delete_admin.php?id=<?php echo $data[0]?>">Hapus</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php $no++; endforeach; ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>
<div class="pt-[16rem]">
<?php include 'footer.php'; ?>
</div>

<script type="text/javascript">
    $(function(){
        $("#AD").addClass('menu-top-active');
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#example1').dataTable();
    });
</script>
</body>
</html>
