<?php
session_start();
include "koneksi.php";
$nama_unit= $_POST['nama_unit'];

$sql 		= "SELECT * FROM unit WHERE nama_unit = '$nama_unit'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO unit(nama_unit) VALUES('$nama_unit')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:unit.php");
