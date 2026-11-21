<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <p class="identitas">Angger Cakra Wicaksono | 312510054 | I253A</p>
        <a class="tambah" href="tambah.php">Tambah Barang</a>
        <div class="main">
            <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if($result && mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><img src="gambar/<?= $row['gambar'];?>" alt="<?= htmlspecialchars($row['nama']);?>"></td>
                <td><?= htmlspecialchars($row['nama']);?></td>
                <td><?= htmlspecialchars($row['kategori']);?></td>
                <td class="angka"><?= $row['harga_beli'];?></td>
                <td class="angka"><?= $row['harga_jual'];?></td>
                <td class="angka"><?= $row['stok'];?></td>
                <td>
                    <a class="ubah" href="ubah.php?id=<?= $row['id_barang'];?>">Ubah</a>
                    <a class="hapus" href="hapus.php?id=<?= $row['id_barang'];?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>
