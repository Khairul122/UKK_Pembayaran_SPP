<?php
session_start();
include "koneksi.php";
$id_unit         = $_POST['id_unit'];
$nama_unit_lama = $_POST['nama_unit_lama'];
$nama_unit_baru = $_POST['nama_unit_baru'];

if ($nama_unit_baru == $nama_unit_lama) {
  $_SESSION['info'] = 'Gagal Diupdate';
} else {
  $sql = "SELECT * FROM unit WHERE nama_unit = '$nama_unit_baru'";
  $query   = mysqli_query($koneksi, $sql);
  // Ketika ditemukan
  if (mysqli_num_rows($query) > 0) {
    $_SESSION['info'] = 'Gagal Diupdate';
  } else {
    $sql = "UPDATE unit SET nama_unit ='$nama_unit_baru' WHERE id_unit = '$id_unit'";
    mysqli_query($koneksi, $sql);
    $_SESSION['info'] = 'Diupdate';
  }
}
header("location:unit.php");
