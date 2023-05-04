<?php
session_start();
include "koneksi.php";
$id_unit = $_GET['id_unit'];

$sql = "DELETE FROM unit WHERE id_unit ='$id_unit'";
mysqli_query($koneksi, $sql);
$_SESSION['info'] = 'Dihapus';
header("location:unit.php");
