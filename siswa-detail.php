<?php
$judul = "Master Detail Siswa";
include "templates/templates.php";
?>

<div class="container">
	<div class="row">
		<div class="col">
			<h2>Rekapitulasi Detail Siswa</h2>
			<hr>
			<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fas fa-plus"></i> Tambah
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12 table-responsive">
			<table class="table table-bordered table-hover" id="siswa" width="120%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tahun Ajaran</th>
						<th>NISN</th>
						<th>Nama Siswa</th>
						<th>Nama Kelas</th>
						<th>Unit</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = "SELECT * FROM detail_siswa a LEFT JOIN kelas b ON a.id_kelas=b.id_kelas LEFT JOIN spp c ON a.id_spp=c.id_spp LEFT JOIN siswa d ON a.nisn=d.nisn LEFT JOIN unit e ON b.id_unit=e.id_unit ORDER BY c.tahun_ajaran, d.nama_siswa";
					$query = mysqli_query($koneksi, $sql);
					while ($data = mysqli_fetch_array($query)) {
						$nisn = $data['nisn']; ?>
						<tr>
							<td class="text-center" width="3%"><?= $no++; ?>.</td>
							<td class="text-center" width="15%"><?= $data['tahun_ajaran']; ?></td>
							<td width="5%"><?= $nisn; ?></td>
							<td><?= $data['nama_siswa']; ?></td>
							<td width="14%"><?= $data['kelas']; ?>-<?= $data['nama_kelas']; ?></td>
							<td><?= $data['nama_unit']; ?></td>
							<td align="center" width="13%">
								<?php
								$sql1 = "SELECT * FROM detail_siswa a INNER JOIN siswa b ON a.nisn=b.nisn WHERE b.nisn='$nisn'";
								$query1 = mysqli_query($koneksi, $sql1);
								if (mysqli_num_rows($query1) > '0') { ?>
									<a href="siswa-detail-delete.php?id_detail_siswa=<?= $data['id_detail_siswa']; ?>" class="badge badge-danger delete-data p-2" title='Delete'><i class="fas fa-trash"></i></a>
								<?php
								} ?>
							</td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal Tambah-->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">
						Input Detail Siswa
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="siswa-detail-simpan.php" method="post">
						<!-- NISN -->
						<div class="input-group mb-1">
							<span class="input-group-text lebar">NISN</span>
							<select name="nisn" class="form-control form-control-chosen" required>
								<option value="" selected>~ Pilih Nama Siswa ~</option>
								<?php
								$sql = "SELECT * FROM siswa ORDER BY nama_siswa, nisn";
								$query = mysqli_query($koneksi, $sql);
								while ($d = mysqli_fetch_array($query)) { ?>
									<option value="<?= $d['nisn']; ?>">NISN: <?= $d['nisn']; ?> - <?= $d['nama_siswa']; ?></option>
								<?php
								} ?>
							</select>
						</div>

						<!-- Nama Kelas -->
						<div class="input-group mb-1">
							<span class="input-group-text lebar">Nama Kelas</span>
							<select name="id_kelas" class="form-control form-control-chosen" required>
								<option value="" selected>~ Pilih Nama Kelas ~</option>
								<?php
								$sql = "SELECT * FROM kelas a INNER JOIN unit b ON a.id_unit=b.id_unit ORDER BY b.nama_unit, a.kelas, a.nama_kelas";
								$query = mysqli_query($koneksi, $sql);
								while ($d = mysqli_fetch_array($query)) { ?>
									<option value="<?= $d['id_kelas']; ?>"><?= $d['kelas']; ?>-<?= $d['nama_kelas']; ?> - <?= $d['nama_unit']; ?></option>
								<?php
								} ?>
							</select>
						</div>

						<!-- Nilai SPP -->
						<div class="input-group mb-1">
							<span class="input-group-text lebar">Nilai SPP</span>
							<select name="id_spp" class="form-control form-control-chosen" required>
								<option value="" selected>~ Pilih Nilai SPP ~</option>
								<?php
								$sql = "SELECT * FROM spp ORDER BY nominal";
								$query = mysqli_query($koneksi, $sql);
								while ($d = mysqli_fetch_array($query)) { ?>
									<option value="<?= $d['id_spp']; ?>">Rp. <?= number_format($d['nominal']); ?> - Tahun Ajaran: <?= $d['tahun_ajaran']; ?></option>
								<?php
								} ?>
							</select>
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include "templates/footer.php"; ?>
	<script>
		$(document).ready(function() {
			$('#siswa').dataTable();
		});
	</script>