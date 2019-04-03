<?php
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$save_data = [
    'nama'   => $_POST['nama'],
    'kontak' => $_POST['kontak']
];
$db->insert('calon_peminjam',$save_data);
header("Location: calon_peminjam.php");
?>