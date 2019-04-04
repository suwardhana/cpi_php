<?php
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
for ($i=0; $i<5 ; $i++) { 
  $save_data = [
    'id_calon'    => $_POST['id_calon'],
    'id_kriteria' => $i+1,
    'nilai'       => $_POST['nilai'][$i]
  ];
  print_r($save_data);
  $db->insert('nilai',$save_data);
}
header("Location: tampil_nilai.php");
?>