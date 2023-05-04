<?php
session_start();
include "koneksi.php";
$tahun_ajaran	= $_POST['tahun_ajaran'];
$nominal = str_replace(',','', mysqli_escape_string($koneksi, $_POST['nominal']));

$sql 		= "SELECT * FROM spp WHERE tahun_ajaran = '$tahun_ajaran'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO spp(tahun_ajaran, nominal) VALUES('$tahun_ajaran', '$nominal')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:spp.php");
?>
