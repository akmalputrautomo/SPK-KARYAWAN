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
<div class="pt-[2rem] flex items-center justify-center ">
    <div class="w-full max-w-3xl p-6 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-semibold mb-1">Laporan Penilaian</h2>
        <div class="bg-orange-500 w-full h-[0.5rem] rounded-md px mb-3"></div>
        <?php if (!empty($_GET['error_msg'])): ?>
            <div class="bg-red-500 text-white p-4 mb-6 rounded-md">
                <?= $_GET['error_msg']; ?>
            </div>
        <?php endif ?>
        <form method="post" action="pdf_lap_penilaian.php" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="minggu" class="block text-gray-700">Minggu</label>
                <select required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm border" id="minggu" name="minggu">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="bulan" class="block text-gray-700">Bulan</label>
                <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm border" name="bulan">
                    <?php
                    $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    for ($a = 1; $a <= 12; $a++) {
                        $pilih = ($a == date("m")) ? "selected" : "";
                        echo("<option value=\"$a\" $pilih>$bulan[$a]</option>" . "\n");
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="tahun" class="block text-gray-700">Tahun</label>
                <input type="number" name="tahun" value="<?php echo date('Y') ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm border">
            </div>
            <div class="flex justify-end">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Cetak</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<div class="pt-[6rem]">
<?php include 'footer.php';?>

</div>