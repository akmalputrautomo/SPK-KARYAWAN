<?php 
    session_start();
    error_reporting(0);
    include 'db/db_config.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>SPK SAW SALES TERBAIK</title>
    <!-- Tailwind CORE STYLE  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/css/datatable.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/datatable.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
    <img class="w-[6rem] h-[6rem]" src="../SPK-KARYAWAN-TERBAIK/tcpdf/images/tet.png"/>
    <div class="flex flex-col gap-1">
    <h4 class="text-2xl font-bold text-4xl">SPK SAW SALES TERBAIK</h4>
    <div class="bg-orange-500 h-[0.5rem] w-full"></div>
    <h1 class="font-bold text-2xl items-center">PT.Zakishiss Sinergi Karya Sejahtera</h1>
    </div>
    </div>
    <div class="bg-blue-700 p-4 mt-1">
        <div class="mx-auto flex justify-between items-center">
            <div class="text-white">
            </div>
            <button type="button" class="text-white md:hidden" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <div class="container mx-auto p-4">
        <!-- Additional Content Goes Here -->
    </div>
</body>
</html>
