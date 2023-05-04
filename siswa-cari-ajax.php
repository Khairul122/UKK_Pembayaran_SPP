<?php
include "koneksi.php";
$id_pembayaran = $_POST['id_pembayaran'];

$sql = "SELECT * FROM detail_pembayaran WHERE id_pembayaran ='$id_pembayaran' AND tgl_bayar='0000-00-00' ORDER BY id_detail_pembayaran";
$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $data   = mysqli_fetch_assoc($query);
  $result = [];
  $result = $data;
  echo json_encode($result);
}


?>