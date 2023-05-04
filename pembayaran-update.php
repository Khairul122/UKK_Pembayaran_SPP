<?php
session_start();
include "koneksi.php";
$id_pembayaran 	= $_POST['id_pembayaran'];
$tgl_bayar 			= $_POST['tgl_bayar'];
$nisn	 					= $_POST['nisn'];
$bulan_bayar 		= $_POST['bulan_bayar'];
$id_spp 				= $_POST['id_spp'];
$jumlah_bayar 	= $_POST['jumlah_bayar'];
$id_petugas 		= $_SESSION['id_petugas'];

$sql = "UPDATE tbl_pembayaran SET nisn='$nisn', tgl_bayar='$tgl_bayar', bulan_bayar='$bulan_bayar', jumlah_bayar='$jumlah_bayar', id_petugas='$id_petugas', id_spp ='$id_spp' WHERE id_pembayaran='$id_pembayaran'";

mysqli_query($koneksi, $sql);
header("location:pembayaran.php");
?>
