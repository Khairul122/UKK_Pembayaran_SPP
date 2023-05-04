<?php
  session_start();
  include "koneksi.php";
  $no  = 1;
  $periodeDari   = $_POST['periodeDari'];
  $periodeSampai = $_POST['periodeSampai'];
  $nisn          = $_POST['nisn'];
?>
<table class="table table-bordered table-hover table-sm" id="tblTransaksi2">
  <thead>
    <tr>
      <th width="5%">No.</th>
      <th>Tgl Bayar</th>
      <th>NIS</th>
      <th>Nama Siswa</th>
      <th>Kelas</th>
      <th>Nama Kelas</th>
      <th>Jumlah Bayar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($nisn==""){
      $sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa = c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn INNER JOIN kelas e ON c.id_kelas = e.id_kelas WHERE a.tgl_bayar<>'0000-00-00'";
    }else{
      $sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa = c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn INNER JOIN kelas e ON c.id_kelas = e.id_kelas WHERE a.tgl_bayar<>'0000-00-00' AND d.nisn='$nisn'";
    }
    $query = mysqli_query($koneksi, $sql);
    if($a=mysqli_num_rows($query)>0){
      while($data = mysqli_fetch_array($query)){
        $tgl = $data['tgl_bayar'];
        if(($tgl >= $periodeDari && $tgl <= $periodeSampai) || ($periodeDari == "" && $periodeSampai == "")){
          $tanggal =  date_format(date_create($data['tgl_bayar']),"d M Y");?>
          <tr>
            <td align="center"><?= $no++; ?>.</td>
            <td align="center"><?= $tanggal; ?></td>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nama_siswa']; ?></td>
            <td align="center"><?= $data['kelas']; ?></td>
            <td align="center"><?= $data['kelas']; ?>-<?= $data['nama_kelas']; ?></td>
            <td align="right"><?= number_format($data['total_bayar'],0); ?></td>
          </tr>
          <?php
        }
      }
    }?>
  </tbody>
</table>
<script>
	$(document).ready(function() {
		$('#tblTransaksi2').dataTable();
	});
</script>