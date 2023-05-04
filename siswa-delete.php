<?php
session_start();
include "koneksi.php";
$nisn = $_GET['nisn'];

$sql 		= "SELECT * FROM pembayaran WHERE nisn = '$nisn'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Dihapus';
}else{
  $sql   = "SELECT * FROM siswa WHERE nisn = '$nisn'";
  $query  = mysqli_query($koneksi, $sql);
  $data   = mysqli_fetch_array($query);
  $photo  = $data['photo'];

  $sql = "DELETE FROM siswa WHERE nisn ='$nisn'";
  mysqli_query($koneksi, $sql);

  if($photo!=""){
    unlink("photo/".$photo);
  }
  $_SESSION['info']='Dihapus';
}
header("location:siswa.php");
?>