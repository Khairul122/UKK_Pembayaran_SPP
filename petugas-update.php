<?php
session_start();
include "koneksi.php";
$id_petugas 	= $_POST['id_petugas'];
$nama_petugas	= $_POST['nama_petugas'];
$username_lama= $_POST['username_lama'];
$username_baru= $_POST['username_baru'];
$password 		= $_POST['password'];
$level 				= $_POST['level'];
	
if($username_lama==$username_baru){
  $_SESSION['info'] = 'Gagal Diupdate';
}else{
  $sql = "SELECT * FROM petugas WHERE username ='$username_baru'";
  $query = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($query)>0){
    $_SESSION['info'] = 'Gagal Diupdate';
  }else{
    $sql = "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username_baru', password='$password', level='$level' WHERE id_petugas = '$id_petugas'";
    $query = mysqli_query($koneksi, $sql);
    if($query==1){
      $_SESSION['info'] = 'Diupdate';
    }else{
      $_SESSION['info'] = 'Gagal Diupdate';
    }
  }
}
header("location:petugas.php");
?>
