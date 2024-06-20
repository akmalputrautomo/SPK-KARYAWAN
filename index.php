<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php');
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
    <link rel="stylesheet" type="text/css" href="assets/css/datatable.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/datatable.js"></script>
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    
<div class="content-wrapper">
    <div class="content ">
        <div class="container mx-auto px-2">
            <div class="text-center flex justify-center items-center p-4 ">
                <h4 class="text-2xl bg-orange-500 rounded-md w-[30%] text-white font-bold">DASHBOARD</h4>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                <div class="bg-blue-200 border border-blue-400 rounded-lg p-6">
                    <div class="text-center">
                        <i class="fa fa-group fa-5x text-blue-600"></i>
                    </div>
                    <div class="text-center mt-4">
                        <div class="text-3xl font-bold"><?php echo $db->totaladmin() ?></div>
                        <div class="font-bold">Total Manager</div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="tampil_admin.php" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">View Details</a>
                    </div>
                </div>
                <div class="bg-blue-200 border border-blue-400 rounded-lg p-6">
                    <div class="text-center">
                        <i class="fa fa-tasks fa-5x text-blue-600"></i>
                    </div>
                    <div class="text-center mt-4">
                        <div class="text-3xl font-bold"><?php echo $db->totalkriteria() ?></div>
                        <div class="font-bold">Total Kriteria</div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="tampil_kriteria.php" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">View Details</a>
                    </div>
                </div>
                <div class="bg-blue-200 border border-blue-400 rounded-lg p-6">
                    <div class="text-center z-1">
                        <i class="fa fa-tasks fa-5x text-blue-600"></i>
                    </div>
                    <div class="text-center mt-4">
                        <div class="text-3xl font-bold"><?php echo $db->totalsubkriteria() ?></div>
                        <div class="font-bold">Total Sub Kriteria</div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="tampil_subkriteria.php" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">View Details</a>
                    </div>
                </div>
                <div class="bg-blue-200 border border-blue-400 rounded-lg p-6">
                    <div class="text-center">
                        <i class="fa fa-group fa-5x text-blue-600"></i>
                    </div>
                    <div class="text-center mt-4">
                        <div class="text-3xl font-bold"><?php echo $db->totalkaryawan() ?></div>
                        <div class="font-bold">Total Sales</div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="tampil_karyawan.php" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt-[20rem]">
<?php include 'footer.php'; ?>
</div> 
</body>
</html>


<script type="text/javascript">
    $(function(){
        $("#home").addClass('menu-top-active');
    });
</script>
