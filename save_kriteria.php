<?php
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$save_data = [
    'nama_kriteria' => $_POST['nama_kriteria'],
    'bobot'         => $_POST['bobot'],
    'trend'         => $_POST['trend']
];
$db->update('kriteria',$save_data,'id_kriteria='.$_POST['id']);
header("Location: kriteria.php");
?>