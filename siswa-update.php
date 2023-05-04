<?php
session_start();
include "koneksi.php";
$nisn 					= $_POST['nisn'];
$nama_siswa 		= $_POST['nama_siswa'];
$alamat 				= $_POST['alamat'];
$no_telepon 		= $_POST['no_telepon'];
$jenis_kelamin 	= $_POST['jenis_kelamin'];
$photo 		      = $_FILES['photo']['name'];

$sql = "UPDATE siswa SET 
  nama_siswa    = '$nama_siswa', 
  alamat        = '$alamat', 
  no_telepon    = '$no_telepon', 
  jenis_kelamin = '$jenis_kelamin' 
WHERE nisn = '$nisn'";
$query = mysqli_query($koneksi, $sql);
if($query==1){
  if($photo !=""){
    $sql   = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $query  = mysqli_query($koneksi, $sql);
    $data   = mysqli_fetch_array($query);
    $photo  = $data['photo'];
    if($photo!=""){unlink("photo/".$photo);}

    $namaBaru 	= date('dmYHis');
    $new_images = $namaBaru.$_FILES["photo"]["name"];
    $images     = $_FILES["photo"]["tmp_name"];

    move_uploaded_file($images, "photo/".$new_images);
    $sql = "UPDATE siswa SET photo = '$new_images' WHERE nisn='$nisn'";
    $query 	= mysqli_query($koneksi, $sql);
  }
  $_SESSION['info'] = 'Diupdate';
}else{
  $_SESSION['info'] = 'Gagal Diupdate';
}
header("location:siswa.php");
?>
