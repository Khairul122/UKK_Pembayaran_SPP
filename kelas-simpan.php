<?php
session_start();
include "koneksi.php";
$kelas        = $_POST['kelas'];
$nama_kelas   = $_POST['nama_kelas'];
$id_unit= $_POST['id_unit'];

$sql = "SELECT * FROM kelas WHERE kelas = '$kelas' AND nama_kelas = '$nama_kelas' AND id_unit = '$id_unit'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO kelas(kelas, nama_kelas, id_unit) VALUES('$kelas', '$nama_kelas', '$id_unit')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:kelas.php");
