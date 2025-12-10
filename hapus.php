<?php
require_once "config/Database.php";
require_once "classses/Mahasiswa.php";

$database = new Database();
$db = $database->getConnection();

$mhs = new Mahasiswa($db);
$mhs->id = $_GET['id'];

if ($mhs->delete($mhs->id)) {
    setcookie('success', 'hapus', time() + 1);
    header(header: "Location: index.php");
    exit();
}
?>
