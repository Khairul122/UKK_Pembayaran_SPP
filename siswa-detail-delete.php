<?php
session_start();
include "koneksi.php";
$id_detail_siswa = $_GET['id_detail_siswa'];

$sql 		= "SELECT * FROM pembayaran WHERE id_detail_siswa = '$id_detail_siswa' AND total_bayar>0";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Dihapus';
}else{
  $sql5   = "SELECT * FROM pembayaran a INNER JOIN detail_siswa b ON a.id_detail_siswa=b.id_detail_siswa INNER JOIN siswa c ON b.nisn=c.nisn INNER JOIN spp d ON b.id_spp=d.id_spp WHERE a.id_detail_siswa = '$id_detail_siswa'";
  $query5         = mysqli_query($koneksi, $sql5);
  $data5          = mysqli_fetch_array($query5);
  $id_pembayaran  = $data5['id_pembayaran'];
  $nisn           = $data5['nisn'];
  $nominal        = $data5['nominal']*12;

  $sql1 = "DELETE FROM detail_siswa WHERE id_detail_siswa ='$id_detail_siswa'";
  mysqli_query($koneksi, $sql1);

  $sql2 = "DELETE FROM pembayaran WHERE id_detail_siswa ='$id_detail_siswa'";
  mysqli_query($koneksi, $sql2);

  $sql3 = "DELETE FROM detail_pembayaran WHERE id_pembayaran ='$id_pembayaran'";
  mysqli_query($koneksi, $sql3);

  $sql4 = "UPDATE siswa SET 
    total_tagihan = total_tagihan - '$nominal'
  WHERE nisn ='$nisn'";
  mysqli_query($koneksi, $sql4);


  $_SESSION['info']='Dihapus';
}
header("location:siswa-detail.php");
?>