<?php 
session_start();
$level = $_SESSION['level'];
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Pembayaran</title>
</head>
<body onload="window.print(); window.onafterprint = window.close;">
	<h1>Rekapiluasi Pembayaran</h1>
	<table border="1" width="100%">
		<tr>
			<th>No.</th>
			<th>Nama Siswa</th>
			<th>Nama Kelas</th>
			<th>Tgl Bayar</th>
			<th>Tahun Ajaran</th>
			<th>Nama Bulan</th>
			<th>Jumlah Bayar</th>
			<th>Nama Petugas</th>
		</tr>
		<?php
		$no = 1;
		$total_bayar=0;
		if($level=="siswa"){
			$nisn = $_SESSION['nisn'];
			$sql = "SELECT * FROM tbl_pembayaran a INNER JOIN tb_siswa b ON a.nisn=b.nisn INNER JOIN tbl_kelas c ON b.id_kelas=c.id_kelas INNER JOIN tbl_spp d ON a.id_spp=d.id_spp INNER JOIN tbl_petugas e ON a.id_petugas=e.id_petugas WHERE a.nisn='$nisn' ORDER BY a.tgl_bayar";
		}else{
			$sql = "SELECT * FROM tbl_pembayaran a INNER JOIN tb_siswa b ON a.nisn=b.nisn INNER JOIN tbl_kelas c ON b.id_kelas=c.id_kelas INNER JOIN tbl_spp d ON a.id_spp=d.id_spp INNER JOIN tbl_petugas e ON a.id_petugas=e.id_petugas ORDER BY a.tgl_bayar";
		}
		$query = mysqli_query($koneksi, $sql);
		while($data = mysqli_fetch_array($query)){
			$kd_bulan = $data['bulan_bayar'];
			if($kd_bulan=="01"){$nama_bulan = "Januari";}
			elseif($kd_bulan=="02"){$nama_bulan = "Februari";}
			elseif($kd_bulan=="03"){$nama_bulan = "Maret";}
			elseif($kd_bulan=="04"){$nama_bulan = "April";}
			elseif($kd_bulan=="05"){$nama_bulan = "Mei";}
			elseif($kd_bulan=="06"){$nama_bulan = "Juni";}
			elseif($kd_bulan=="07"){$nama_bulan = "Juli";}
			elseif($kd_bulan=="08"){$nama_bulan = "Agustus";}
			elseif($kd_bulan=="09"){$nama_bulan = "September";}
			elseif($kd_bulan=="10"){$nama_bulan = "Oktober";}
			elseif($kd_bulan=="11"){$nama_bulan = "November";}
			elseif($kd_bulan=="12"){$nama_bulan = "Desember";}
			$total_bayar = $total_bayar + $data['jumlah_bayar'];
			?>
			<tr>
				<td align="center" width="5%"><?= $no++;?>.</td>
				<td><?= $data['nama'];?></td>
				<td><?= $data['nama_kelas'];?></td>
				<td><?= date_format(date_create($data['tgl_bayar']),"d M Y");?></td>
				<td align="center"><?= $data['tahun_ajaran'];?></td>
				<td><?= $nama_bulan;?></td>
				<td align="right"><?= number_format($data['jumlah_bayar']);?></td>
				<td><?= $data['nama_petugas'];?></td>
			</tr>
			<?php
		}?>
		<tr>
			<td colspan="6" align="right">Total Bayar</td>
			<td align="right"><?= number_format($total_bayar); ?></td>
			<td></td>
		</tr>
	</table>
</body>
</html>
