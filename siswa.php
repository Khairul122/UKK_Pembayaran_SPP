<?php
$judul = "Master Siswa";
include "templates/templates.php";
?>

<div class="container">
	<h2>Rekapitulasi Master Siswa</h2>
	<hr>
	<div class="row">
		<div class="col-2">
			<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fas fa-plus"></i> Tambah
			</button>
		</div>

	</div>

	<div class="row mb-5">
		<div class="col-xl-12 table-responsive mb">
			<table class="table table-bordered table-hover" id="siswa" width="150%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Photo</th>
						<th>NISN</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Gender</th>
						<th>Alamat</th>
						<th>Telp</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = "SELECT * FROM siswa ORDER BY nama_siswa";
					$query = mysqli_query($koneksi, $sql);
					while ($data = mysqli_fetch_array($query)) {
						$nisn					= $data['nisn'];
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
							<td class="text-center" width="1%"><?= $no++; ?>.</td>
							<td align="center">
								<img src="<?= $photo; ?>" alt="photo" width="40" height="40" title="Gambar">
							</td>
							<td><?= $nisn; ?></td>
							<td><?= $data['nis']; ?></td>
							<td width="15%"><?= $data['nama_siswa']; ?></td>
							<td width="7%"><?= $jenis_kelamin; ?></td>
							<td><?= $data['alamat']; ?></td>
							<td><?= $data['no_telepon']; ?></td>
							<td align="center">
								<?php
								$sql1 = "SELECT * FROM siswa WHERE nama_siswa = '$nisn'";
								$query1 = mysqli_query($koneksi, $sql1);
								if (mysqli_num_rows($query1) == '0') { ?>
									<a href="siswa-edit.php?nisn=<?= $data['nisn']; ?>" class="badge badge-primary p-2 mb-1 mt-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="siswa-delete.php?nisn=<?= $data['nisn']; ?>" class="badge badge-danger delete-data p-2" title='Delete'><i class="fas fa-trash"></i></a>
								<?php
								}
								?>
							</td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Input Master Siswa
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="siswa-simpan.php" method="post" enctype="multipart/form-data">
					<!-- NISN -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">NISN</span>
						<input type="text" name="nisn" required autocomplete="off" class="form-control form-control-sm" placeholder="Input NISN">
					</div>

					<!-- NIS -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">NIS</span>
						<input type="text" name="nis" required autocomplete="off" class="form-control form-control-sm" placeholder="Input No Induk Siswa">
					</div>

					<!-- Nama Siswa -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nama Siswa</span>
						<input type="text" name="nama_siswa" required class="form-control form-control-sm" placeholder="Input Nama Siswa" autocomplete="off">
					</div>

					<!-- Jenis Kelamin -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Jenis Kelamin</span>
						<select name="jenis_kelamin" class="form-control form-control-chosen" required>
							<option value="" selected>~ Pilih Jenis Kelamin ~</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>

					<!-- Alamat -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Alamat</span>
						<textarea name="alamat" class="form-control form-control-sm" cols="30" rows="3" required></textarea>
					</div>

					<!-- Telp -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Telp</span>
						<input type="text" name="no_telepon" required class="form-control form-control-sm" placeholder="Input No Telp/WA" autocomplete="off">
					</div>

					<!-- Photo -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Photo</span>
						<input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
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