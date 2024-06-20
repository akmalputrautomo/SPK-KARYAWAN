<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login and Search</title>
</head>
<body class="bg-gray-500">
    <div class="flex justify-center items-center min-h-screen pb-[15rem] ">
        <div class="w-full max-w-4xl mx-4">
            <div class="flex flex-wrap mx-2">
                <!-- Login Section -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <div class="bg-white shadow-md p-6 rounded-lg">
                        <?php if ($_GET['error_login']==1): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                Anda Harus Login Terlebih Dahulu!
                            </div>
                        <?php endif ?>
                        <h4 class="text-2xl font-bold text-gray-700 pb-2">Login</h4>
                        <div class="bg-orange-500 rounded-md w-[70%] h-[0.5rem] mb-2"></div>
                        <form method="post" action="proses_login.php">
                            <label class="block text-gray-700 mb-2 font-bold ">Username</label>
                            <input placeholder="username" required type="text" name="username" class="w-full p-3 border border-gray-300 rounded mb-4" />
                            
                            <label class="block text-gray-700 mb-2 font-bold ">Password</label>
                            <input placeholder="password" type="password" name="password" class="w-full p-3 border border-gray-300 rounded mb-4" />                        
                            
                            <button type="submit" class="font-bold w-full bg-blue-500 text-white p-3 rounded hover:bg-blue-700 transition duration-300">
                                <span class="glyphicon glyphicon-user"></span> &nbsp;Login
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Search Section -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <div class="bg-white shadow-md p-6 rounded-lg h-[21rem]">
                        <h4 class="text-2xl font-bold text-gray-700 mb-2">Cari Karyawan</h4>
                        <div class="bg-orange-500 rounded-md w-[50%] h-[0.5rem] mb-4"></div>
                        <form method="get" action="cari_karyawan.php">
                            <div class="flex">
                                <input type="text" class="w-full p-3 border border-gray-300 rounded-l" name="nama" placeholder="Search">
                                <button class="bg-gray-300 p-3 rounded-r hover:bg-gray-400 transition duration-300" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php include 'footer.php';?>
