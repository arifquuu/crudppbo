<?php
require_once "config/Database.php";
require_once "classses/Mahasiswa.php";

$database = new Database();
$db = $database->getConnection();

$mhs = new Mahasiswa($db);

if ($_POST) {
    $mhs->nama = $_POST['nama'];
    $mhs->nim = $_POST['nim'];
    $mhs->jurusan = $_POST['jurusan'];

    if ($mhs->create()) {
        header("Location: index.php?success='menambahkan'");
    } else {
        echo "Gagal menambah data.";
    }
}
?>

<form method="POST">
    Nama: <input name="nama" required><br>
    NIM: <input name="nim" required><br>
    Jurusan: <input name="jurusan" required><br>
    <button type="submit">Simpan</button>
</form>
