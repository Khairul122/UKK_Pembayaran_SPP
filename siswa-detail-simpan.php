<?php
session_start();
include "koneksi.php";

$id_kelas	  = $_POST['id_kelas'];
$sql  = "SELECT * FROM kelas a INNER JOIN detail_siswa b ON a.id_kelas=b.id_kelas WHERE a.id_kelas='$id_kelas'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$kls  = $data['kelas'];

$nisn 		  = $_POST['nisn'];
$id_spp 	  = $_POST['id_spp'];
$id_petugas = $_SESSION['id_petugas'];

$sql  = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa=c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn WHERE d.nisn='$nisn' AND a.tgl_bayar='000-00-00'";
$query= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
  header("location:siswa-detail.php");
  exit();
}


$sql   = "SELECT * FROM spp WHERE id_spp = '$id_spp'";
$query = mysqli_query($koneksi, $sql);
$data  = mysqli_fetch_array($query);
$tahun_ajaran = $data['tahun_ajaran'];
$tahun = substr($tahun_ajaran, 0, 4);
$nominal = $data['nominal'];

$sql1  = "SELECT * FROM detail_siswa WHERE nisn = '$nisn' AND id_kelas='$id_kelas'";
$query1= mysqli_query($koneksi, $sql1);
if(mysqli_num_rows($query1)==0){
  // Menyimpan ke Detail siswa
  $sql2 = "INSERT INTO detail_siswa(nisn, id_kelas, id_spp) VALUES('$nisn','$id_kelas', '$id_spp')";
  $query2 = mysqli_query($koneksi, $sql2);
  if($query2==1){
    $_SESSION['info'] = 'Disimpan';

    $sql3   = "SELECT * FROM detail_siswa ORDER BY id_detail_siswa DESC";
    $query3 = mysqli_query($koneksi, $sql3);
    $data3  = mysqli_fetch_array($query3);
    $id_detail_siswa = $data3['id_detail_siswa'];
    
    $sql4 = "INSERT INTO pembayaran(id_detail_siswa) VALUES('$id_detail_siswa')";
    mysqli_query($koneksi, $sql4);

    $sql5   = "SELECT * FROM pembayaran ORDER BY id_pembayaran DESC";
    $query5 = mysqli_query($koneksi, $sql5);
    $data5  = mysqli_fetch_array($query5);
    $id_pembayaran = $data5['id_pembayaran'];
    
    for($i=0; $i<12; $i++){
      if($i==0){
        $bulan = 7;
        $keterangan = "Juli " .$tahun;
        $tahun_berikutnya = $tahun;
      }else if($i==1){
        $bulan = 8;
        $keterangan = "Agustus " . $tahun;
        $tahun_berikutnya = $tahun;
      }else if($i==2){
        $bulan = 9;
        $keterangan = "September " . $tahun;
        $tahun_berikutnya = $tahun;
      }else if($i==3){
        $bulan = 10;
        $keterangan = "Oktober " . $tahun;
        $tahun_berikutnya = $tahun;
      }else if($i==4){
        $bulan = 11;
        $keterangan = "November " . $tahun;
        $tahun_berikutnya = $tahun;
      }else if($i==5){
        $bulan = 12;
        $keterangan = "Desember " . $tahun;
        $tahun_berikutnya = $tahun;
      }else if($i==6){
        $bulan = 1;
        $tahun_berikutnya = $tahun+1;
        $keterangan = "Januari " . $tahun_berikutnya;
      }else if($i==7){
        $bulan = 2;
        $tahun_berikutnya = $tahun+1;
        $keterangan = "Pebruari " . $tahun_berikutnya;
      }else if($i==8){
        $bulan = 3;
        $tahun_berikutnya = $tahun+1;
        $keterangan = "Maret " . $tahun_berikutnya;
      }else if($i==9){
        $bulan = 4;
        $tahun_berikutnya = $tahun+1;
        $keterangan = "April " . $tahun_berikutnya;
      }else if($i==10){
        $bulan = 5;  
        $tahun_berikutnya = $tahun+1;
        $keterangan = "Mei " . $tahun_berikutnya;  
      }else{
        $bulan = 6;
        $tahun_berikutnya = $tahun+1;
        $keterangan = "Juni " . $tahun_berikutnya;
      } 
 
      $sql7 = "INSERT INTO detail_pembayaran(id_pembayaran, bulan, tahun, keterangan, nominal) VALUES('$id_pembayaran', '$bulan', '$tahun_berikutnya', '$keterangan', '$nominal')";
      mysqli_query($koneksi, $sql7);
      
    } 

    $sql8 = "UPDATE siswa SET total_tagihan=12*'$nominal' WHERE nisn='$nisn'";
    mysqli_query($koneksi, $sql8);
  }else{
    $_SESSION['info'] = 'Gagal Disimpan';
  }
}else{
  $_SESSION['info'] = 'Gagal Disimpan';
}
header("location:siswa-detail.php");
?>
