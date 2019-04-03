<?php
include('../class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->select('kriteria'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();
print_r($res);