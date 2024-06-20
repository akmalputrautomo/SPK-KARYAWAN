<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
        .dropdown-menu {
            display: none;
        }
        .dropdown-menu.show {
            display: block;
            width: 11rem;
        }
    </style>
</head>
<body>
    <div class="flex">
    <div>
    <img class="w-[6rem] h-[6rem]" src="../SPK-KARYAWAN-TERBAIK/tcpdf/images/tet.png"/>
    </div>
    <div>  
    <h1 class="font-bold text-4xl">SPK SAW SALES TERBAIK</h1>
    <div class="bg-orange-500 h-[0.5rem] w-full rounded-md"></div>
    <h1 class="font-bold text-2xl items-center">PT.Zakishiss Sinergi Karya Sejahtera</h1>
    </div>

    </div>
<section class="bg-blue-700 py-4">
    <div class="container">
        <div class="flex justify-between  items-center">
            <!-- Menu Items -->
            <ul class="flex text-white px-4 font-bold">
                <li class="mr-[10rem] pl-4  "><a href="index.php" class="hover:bg-orange-300 p-4">Dashboard</a></li>
                <li class="mr-[10rem] relative dropdown">
                            <a href="#" class="hover:bg-orange-300 p-4 dropdown-toggle" onclick="toggleDropdown(event, 'masterDropdown')">Master</a>
                            <ul id="masterDropdown" class="absolute hidden bg-gray-700 mt-2 py-2 rounded-lg shadow-lg dropdown-menu">
                                <li><a href="tampil_admin.php" class="block px-4 py-2  hover:text-gray-300">Data Manager</a></li>
                                <li><a href="tampil_karyawan.php" class="block px-4 py-2 hover:text-gray-300">Data Sales</a></li>
                                <li><a href="tampil_kriteria.php" class="block px-4 py-2 hover:text-gray-300 z-4 ">Data Kriteria</a></li>
                                <li><a href="tampil_subkriteria.php" class="block px-4 py-2 hover:text-gray-300">Data Sub Kriteria</a></li>
                    </ul>
                </li>
                <li class="mr-[10rem]"><a href="tampil_tpa.php" class="hover:bg-orange-300 p-4">Penilaian Sales</a></li>
                <li class="mr-[10rem]"><a href="proses_spk.php" class="hover:bg-orange-300 p-4">Proses SPK</a></li>
                <!-- <li class="mr-[10rem]"><a href="ubah_password.php" class="hover:text-gray-300">Ubah Password</a></li> -->
                <li class="mr-[10rem] relative dropdown">
                    <a href="#" class="hover:bg-orange-300 p-4 dropdown-toggle" onclick="toggleDropdown(event, 'laporanDropdown')">Laporan</a>
                    <ul id="laporanDropdown" class="absolute hidden bg-gray-700 mt-2 py-2 rounded-lg shadow-lg dropdown-menu">
                        <li><a href="lap_admin.php" class="block px-4 py-2 hover:text-gray-300">Lap Manager</a></li>
                        <li><a href="lap_karyawan.php" class="block px-4 py-2 hover:text-gray-300">Lap Data Sales</a></li>
                        <li><a href="lap_kriteria.php" class="block px-4 py-2 hover:text-gray-300">Lap Kriteria</a></li>
                        <li><a href="lap_subkriteria.php" class="block px-4 py-2 hover:text-gray-300">Lap Sub Kriteria</a></li>
                        <li><a href="lap_penilaian.php" class="block px-4 py-2 hover:text-gray-300">Lap Penilaian</a></li>
                    </ul>
                </li>
                <li><a href="logout.php" class="hover:bg-orange-300 p-4">Logout</a></li>
            </ul>
        </div>
    </div>
</section>

<script>
    function toggleDropdown(event, dropdownId) {
        event.preventDefault();
        var dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
        dropdown.classList.toggle('show');
    }
    
    // Close dropdowns if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.add('hidden');
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

</body>
</html>
