<?php
session_start();
include "koneksi.php";
$id_kelas = $_GET['id_kelas'];

$sql 		= "SELECT * FROM siswa WHERE id_kelas = '$id_kelas'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Dihapus';
}else{
  $sql = "DELETE FROM kelas WHERE id_kelas ='$id_kelas'";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Dihapus';
}
header("location:kelas.php");
?>