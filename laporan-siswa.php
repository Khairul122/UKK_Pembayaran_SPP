<?php
$judul = "Laporan Kelas";
include "templates/templates.php";
?>

<div class="container-fluid pt-3 pb-5">
	<div class="row mt-3">
		<div class="col-xl-12 table-responsive">
			<a href="cetak-laporan-siswa.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak Siswa&nbsp;&nbsp;</a>
			<table class="table table-bordered table-hover" id="laporanSiswa" width="150%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Photo</th>
						<th>NISN</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>JK</th>
						<th>Kelas</th>
						<th>Nama Kelas</th>
						<th>Unit</th>
						<th>Alamat</th>
						<th>Telp</th>
						<th>Ttl Bayar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no 		= 1;
					$sql = "SELECT * FROM siswa a INNER JOIN detail_siswa b ON a.nisn=b.nisn INNER JOIN kelas c ON b.id_kelas=c.id_kelas INNER JOIN unit d ON c.id_unit=d.id_unit ORDER BY c.nama_kelas, a.nama_siswa";
					$query = mysqli_query($koneksi, $sql);
					while ($data = mysqli_fetch_array($query)) {
						$photo				= $data['photo'];
						$jenis_kelamin = $data['jenis_kelamin'];
						if ($photo == "") {
							if ($jenis_kelamin == "Laki-laki") {
								$photo = "photo/male.png";
							} else {
								$photo = "photo/female.png";
							}
						} else {
							$photo = "photo/" . $data['photo'];
						} ?>
						<tr>
							<td class="text-center"><?= $no++; ?>.</td>
							<td align="center">
								<img src="<?= $photo; ?>" alt="photo" width="40" height="40" title="Gambar">
							</td>
							<td><?= $data['nisn']; ?></td>
							<td><?= $data['nis']; ?></td>
							<td><?= $data['nama_siswa']; ?></td>
							<td><?= $data['jenis_kelamin']; ?></td>
							<td><?= $data['kelas']; ?></td>
							<td><?= $data['kelas']; ?>-<?= $data['nama_kelas']; ?></td>
							<td><?= $data['nama_unit']; ?></td>
							<td><?= $data['alamat']; ?></td>
							<td><?= $data['no_telepon']; ?></td>
							<td class="text-right"><?= number_format($data['total_bayar']); ?></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include "templates/footer.php"; ?>
<script>
	$(document).ready(function() {
		$('#laporanSiswa').dataTable();
	});
</script>
</body>

</html>