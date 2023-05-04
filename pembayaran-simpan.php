<?php
session_start();
include "koneksi.php";
$tgl_bayar 		= $_POST['tgl_bayar'];
$id_petugas		= $_SESSION['id_petugas'];
$id_pembayaran= $_POST['id_pembayaran'];

$sql = "SELECT * FROM pembayaran a INNER JOIN detail_siswa b ON a.id_detail_siswa=b.id_detail_siswa INNER JOIN detail_pembayaran c ON a.id_pembayaran=c.id_pembayaran WHERE c.tgl_bayar='0000-00-00' AND c.id_pembayaran = '$id_pembayaran' ORDER BY c.id_detail_pembayaran";
$query = mysqli_query($koneksi, $sql);
$data  = mysqli_fetch_assoc($query);
$nominal  = $data['nominal'];
$id_detail_pembayaran  = $data['id_detail_pembayaran'];
$nisn  = $data['nisn'];

$sql1 = "UPDATE detail_pembayaran SET 
  tgl_bayar  = '$tgl_bayar', 
  id_petugas = '$id_petugas' 
WHERE id_detail_pembayaran = '$id_detail_pembayaran'";
mysqli_query($koneksi, $sql1);

$sql2 = "UPDATE pembayaran SET 
  total_bayar = total_bayar + '$nominal' 
WHERE id_pembayaran = '$id_pembayaran'";
mysqli_query($koneksi, $sql2);

$sql3 = "UPDATE siswa SET 
  total_bayar = total_bayar + '$nominal' 
WHERE nisn = '$nisn'";
mysqli_query($koneksi, $sql3);

$_SESSION['info'] = 'Disimpan';
header("location:pembayaran.php");
?>
