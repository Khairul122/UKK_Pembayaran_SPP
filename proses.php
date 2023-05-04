<?php 
session_start();
include "koneksi.php";
// mysqli_escape_string = mencegah sql injection
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $_POST['password']);

$sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($koneksi, $sql);
// ditemukan
if (mysqli_num_rows($query)>0){
	$data 	= mysqli_fetch_array($query);
	$_SESSION['id_petugas'] = $data['id_petugas'];
	$_SESSION['nama'] = $data['nama_petugas'];
	$_SESSION['nisn'] = $data['id_petugas'];
	$_SESSION['level']= $data['level'];
	$_SESSION['photo']="img/undraw_profile.svg";
	header("location:dashboard.php");
}else{
	include "koneksi.php";
	// $sql1 = "CALL pSiswaLogin('$username','$password')";
 	$sql1 = "SELECT * FROM siswa WHERE nisn = '$username' AND nis = '$password'";
	$query1 = mysqli_query($koneksi, $sql1);
	if (mysqli_num_rows($query1)>0){
		$data1 	= mysqli_fetch_array($query1);
		$_SESSION['nisn'] 	= $username;
		$_SESSION['nama'] 	= $data1['nama_siswa'];
		$_SESSION['nisn'] 	= $data1['nisn'];
		$_SESSION['level'] 	= 'siswa'; 
		$jk									= $data1['jenis_kelamin'];
		if($data1['photo']==""){
			if($jk=="Perempuan"){
				$_SESSION['photo'] 	= "photo/female.png";
			}else{
				$_SESSION['photo'] 	= "photo/male.png";
			}
		}else{
			$_SESSION['photo'] 	= "photo/".$data1['photo'];
		}
		header("location:dashboard.php");
	}else{
		$_SESSION['info'] = 'Salah';
		header("location:index.php");
	}
}?>
