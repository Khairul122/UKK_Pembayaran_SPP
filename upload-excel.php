<?php 
include "koneksi.php";
include "templates/excel_reader2.php";

$target = basename($_FILES['fileExcel']['name']);
move_uploaded_file($_FILES['fileExcel']['tmp_name'], $target);

chmod($_FILES['fileExcel']['name'],0777);
$data = new Spreadsheet_Excel_Reader($_FILES['fileExcel']['name'], false);
$jumlah_baris = $data->rowcount(($sheet_index =0));
for($i=2; $i<=$jumlah_baris; $i++){
  $nisn = $data->val($i,1);
  $nis = $data->val($i,2);
  $nama_siswa = $data->val($i,3);
  $jenis_kelamin = $data->val($i,4);
  $alamat = $data->val($i,5);
  $no_telp = $data->val($i,6);

  $sql = "INSERT INTO siswa(nisn, nis, nama_siswa, jenis_kelamin, alamat, no_telepon) VALUES('$nisn', '$nis', '$nama_siswa', '$jenis_kelamin', '$alamat', '$no_telepon')";
  mysqli_query($koneksi, $sql);
}
unlink($_FILES['fileExcel']['name']);
$_SESSION['info'] = 'Disimpan';
header("location:siswa.php");