<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login.php?error_login=1');
    exit();
}

function hitung_lama_bergabung($tgl_lahir)
{
    $today = date('Y-m-d');
    $now = time();
    list($thn, $bln, $tgl) = explode('-', $tgl_lahir);
    $time_lahir = mktime(0, 0, 0, $bln, $tgl, $thn);

    $selisih = $now - $time_lahir;

    $tahun = floor($selisih / (60 * 60 * 24 * 365));
    $bulan = round(($selisih % (60 * 60 * 24 * 365)) / (60 * 60 * 24 * 30));

    return $tahun . ' tahun ' . $bulan . ' bulan';
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
    <title>Master Data Sales</title>
</head>

<body class="bg-gray-100">

    <div class="content-wrapper">
        <div class="content">
            <div class="container mx-auto">
                <div class="py-8">
                    <h4 class="text-2xl font-bold px-4">Master Data Sales</h4>
                    <div class="px-4">
                        <div class="w-full rounded-xl bg-orange-500 h-[0.5rem]"></div>
                    </div>
                </div>
                <div class="w-full">
                    <?php if (!empty($_GET['error_msg'])) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <?= htmlspecialchars($_GET['error_msg']); ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="w-full pl-[2rem]">
                    <div><a href="input_karyawan.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a></div>
                    <br>
                    <div class="overflow-x-auto border border-gray-300 rounded-lg">
                        <table id="example1" class="table-auto min-w-full">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2 border border-gray-300">NIK</th>
                                    <th class="px-4 py-2 border border-gray-300">Nama</th>
                                    <th class="px-4 py-2 border border-gray-300">Jenis Kelamin</th>
                                    <th class="px-4 py-2 border border-gray-300">Alamat</th>
                                    <th class="px-4 py-2 border border-gray-300">Telepon</th>
                                    <th class="px-4 py-2 border border-gray-300">Tempat lahir</th>
                                    <th class="px-4 py-2 border border-gray-300">Tanggal lahir</th>
                                    <th class="px-4 py-2 border border-gray-300">Pendidikan</th>
                                    <th class="px-4 py-2 border border-gray-300">Jabatan</th>
                                    <th class="px-4 py-2 border border-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($db->select('*', 'karyawan')->get() as $data) : ?>
                                    <tr class="bg-white border-b border-gray-200">
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['NIK']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['nama']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['jeniskelamin']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['alamat']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['telepon']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['TempatLahir']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['ttl']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['PendidikanTerakhir']); ?></td>
                                        <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($data['Jabatan']); ?></td>
                                        <td class="px-4 py-2 flex gap-2 border border-gray-300">
                                            <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="edit_karyawan.php?id=<?= htmlspecialchars($data[0]); ?>">Edit</a>
                                            <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Yakin Hapus?')" href="delete_karyawan.php?id=<?= htmlspecialchars($data[0]); ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
    </div>
</body>

</html>

<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function() {
        $("#ck").addClass('menu-top-active');
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#example1').dataTable();
    });
</script>
