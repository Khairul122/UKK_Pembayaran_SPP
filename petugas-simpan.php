<?php
session_start();
include "koneksi.php";
$username 		= $_POST['username'];
$password 		= $_POST['password'];
$nama_petugas	= $_POST['nama_petugas'];
$level 				= $_POST['level'];

$sql = "SELECT * FROM petugas WHERE username = '$username'";
$query= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO petugas(username, password, nama_petugas, level) VALUES('$username', '$password', '$nama_petugas','$level')";
  $query= mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:petugas.php");
?>
