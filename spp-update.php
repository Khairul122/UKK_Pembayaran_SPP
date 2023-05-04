<?php
session_start();
include "koneksi.php";
$id_spp             = $_POST['id_spp'];
$tahun_ajaran_lama	= $_POST['tahun_ajaran_lama'];
$tahun_ajaran_baru	= $_POST['tahun_ajaran_baru'];
$nominal   = str_replace(',','', mysqli_escape_string($koneksi, $_POST['nominal']));

if($tahun_ajaran_lama==$tahun_ajaran_baru){
  $_SESSION['info'] = 'Gagal Diupdate';
}else{
  $sql = "SELECT * FROM spp WHERE tahun_ajaran = '$tahun_ajaran_baru'";
  $query = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($query)>0){
    $_SESSION['info'] = 'Gagal Diupdate';
  }else{
    $sql = "UPDATE spp SET tahun_ajaran = '$tahun_ajaran_baru', nominal='$nominal' WHERE id_spp = '$id_spp'";
    $query = mysqli_query($koneksi, $sql);
    if($query==1){
      $_SESSION['info'] = 'Diupdate';
    }else{
      $_SESSION['info'] = 'Gagal Diupdate';
    }
  }
}
header("location:spp.php");
?>
