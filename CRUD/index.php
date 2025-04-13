<?php
include_once("koneksi.php");

$query = "SELECT * FROM tb_tanaman";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar Tanaman - Siramono</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .thead {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body class="bg-green-100 text-gray-800 font-sans flex flex-col min-h-screen">
    <header class="bg-green-600 text-white p-2 flex justify-between w-full items-center px-8">
            <img src="../img/siramono_logo.png" alt="Siramono Logo" class="h-20">
            <nav class="space-x-4">
                <button class="text-lg font-semibold hover:underline"
                    onclick="location.href='../beranda.html'">Beranda</button>
        </header>
    <div class="container mt-4">
        <div class="alert alert-success text-center">
            <h2>DAFTAR TANAMAN SIRAMONO</h2>
        </div>
        <a href="tambahtanaman.php" class="btn btn-primary mb-3">Tambah Tanaman</a>
        <a href="../beranda.html" class="btn btn-primary mb-3">Beranda</a>
        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                    <th>ID</th>
                    <th>Nama Tanaman</th>
                    <th>Jenis Tanaman</th>
                    <th>Tanggal Tanam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_array($hasil)) : ?>
                    <tr>
                        <td><?= $data['id_tanaman']; ?></td>
                        <td><?= $data['nama_tanaman']; ?></td>
                        <td><?= $data['jenis_tanaman']; ?></td>
                        <td><?= $data['tanggal_tanam']; ?></td>
                        <td>
                            <a href="ubahtanaman.php?id=<?= $data['id_tanaman']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="hapustanaman.php?id=<?= $data['id_tanaman']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>