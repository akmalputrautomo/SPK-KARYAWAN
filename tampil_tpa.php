<?php
    session_start();
    error_reporting(0);
    if (empty($_SESSION['id'])) {
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
    <title>Penilaian Karyawan</title>
</head>
<body>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="mb-6">
            <h4 class="text-2xl font-bold">Penilaian Sales</h4>
            <div class="bg-orange-500 w-full h-[0.5rem]"></div>
        </div>
        <?php if (!empty($_GET['error_msg'])): ?>
            <div class="mb-6 p-4 bg-red-200 text-red-800 rounded-lg">
                <?= $_GET['error_msg']; ?>
            </div>
        <?php endif ?>
        <div class="mb-6">
            <a href="input_tpa.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <?php foreach ($db->select('kriteria', 'kriteria')->get() as $kr): ?>
                            <th class="py-2 px-4 border-b"><?= $kr['kriteria'] ?></th>
                        <?php endforeach ?>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($db->select('karyawan.id_calon_kr,karyawan.nama,hasil_tpa.*', 'karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= $no; ?></td>
                            <td class="py-2 px-4 border-b"><?= $data['nama'] ?></td>
                            <?php foreach ($db->select('kriteria', 'kriteria')->get() as $k): ?>
                                <td class="py-2 px-4 border-b"><?= $db->getnamesubkriteria($data[$k['kriteria']]) ?> (Nilai = <?= $db->getnilaisubkriteria($data[$k['kriteria']]) ?>)</td>
                            <?php endforeach ?>
                            <td class="py-2 px-4 border-b">
                                <a href="edit_tpa.php?id=<?= $data[0] ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                <a href="delete_tpa.php?id=<?= $data[0] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function() {
        $("#tpa").addClass('menu-top-active');
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#example1').dataTable();
    });
</script>
