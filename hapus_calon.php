<?php 
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->delete('calon_peminjam','id_calon='.$_GET['id']); 
header("Location: calon_peminjam.php");

?>