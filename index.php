<?php
require_once "config/Database.php";
require_once "classses/Mahasiswa.php";

$database = new Database();
$db = $database->getConnection();
$mhs = new Mahasiswa($db);
$data = $mhs->readAll();

?>
<!DOCTYPE html>
<html>
<head><title>Data Mahasiswa</title></head>
<body>
    <h2>Data Mahasiswa</h2>
    <a href="tambah.php">+ Tambah Data</a><br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <tr> </tr>
        <?php 
        $no = 1;
        while ($row = $data->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['jurusan']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a>
                    |
                    <a href='hapus.php?id={$row['id']}'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }?>
    </table>
</body>
</html>
