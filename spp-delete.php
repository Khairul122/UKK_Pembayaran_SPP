<?php
session_start();
include "koneksi.php";
$id_spp = $_GET['id_spp'];

$sql 		= "SELECT * FROM spp a INNER JOIN pembayaran b ON a.tahun_ajaran = b.tahun_ajaran WHERE a.id_spp = '$id_spp'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Dihapus';
}else{
  $sql = "DELETE FROM spp WHERE id_spp ='$id_spp'";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Dihapus';
}
header("location:spp.php");
?>