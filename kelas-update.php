<?php
session_start();
include "koneksi.php";
$id_kelas 	    = $_POST['id_kelas'];
$kelas          = $_POST['kelas'];
$nama_kelas     = $_POST['nama_kelas'];
$id_unit  = $_POST['id_unit'];

$sql 		= "SELECT * FROM kelas WHERE kelas ='$kelas' AND nama_kelas = '$nama_kelas' AND id_unit = '$id_unit'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Diupdate';
}else{
  $sql = "UPDATE kelas SET 
  kelas ='$kelas', 
  nama_kelas ='$nama_kelas', 
  id_unit ='$id_unit' 
WHERE id_kelas = '$id_kelas'";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Diupdate';
}
header("location:kelas.php");
