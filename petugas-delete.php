<?php
session_start();
include "koneksi.php";
$id_petugas = $_GET['id_petugas'];

$sql = "DELETE FROM petugas WHERE id_petugas ='$id_petugas'";
$query = mysqli_query($koneksi, $sql);
if($query==1){
  $_SESSION['info'] = 'Dihapus';
}else{
  $_SESSION['info'] = 'Gagal Dihapus';
}
header("location:petugas.php");
?>