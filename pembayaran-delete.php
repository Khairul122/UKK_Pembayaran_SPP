<?php
session_start();
include "koneksi.php";
$id_detail_pembayaran = $_GET['id_detail_pembayaran'];

$sql = "UPDATE detail_pembayaran SET 
  tgl_bayar = '0000-00-00' 
WHERE id_detail_pembayaran ='$id_detail_pembayaran'";
mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa = c.id_detail_siswa INNER JOIN siswa d ON c.nisn = d.nisn WHERE a.id_detail_pembayaran = '$id_detail_pembayaran'";
$query1 = mysqli_query($koneksi, $sql1);
$data1  = mysqli_fetch_array($query1);
echo $id_pembayaran  = $data1['id_pembayaran'];
echo $nominal        = $data1['nominal'];
echo $nisn           = $data1['nisn'];

$sql2 = "UPDATE pembayaran SET 
  total_bayar = total_bayar - '$nominal' 
WHERE id_pembayaran ='$id_pembayaran'";
mysqli_query($koneksi, $sql2);

$sql3 = "UPDATE siswa SET 
  total_bayar = total_bayar - '$nominal' 
WHERE nisn ='$nisn'";
mysqli_query($koneksi, $sql3);


$_SESSION['info'] = 'Dihapus';
header("location:pembayaran.php");
?>