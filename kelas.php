<?php
$judul = "MASTER KELAS";
include "templates/templates.php";
?>

<div class="container">
	<div class="row">
		<div class="col-10">
			<h2>Rekapitulasi Master Kelas</h2>
			<hr>
			<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fas fa-plus"></i> Tambah
			</button>

			<table class="table table-bordered table-hover" id="kelas">
				<thead>
					<tr class="text-center">
						<th>No.</th>
						<th>Kelas</th>
						<th>Nama Kelas</th>
						<th>Unit</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no 		= 1;
					$sql 		= "SELECT * FROM kelas a INNER JOIN unit b ON a.id_unit=b.id_unit ORDER BY b.nama_unit, a.kelas, a.nama_kelas";
					$query 	= mysqli_query($koneksi, $sql);
					while ($data = mysqli_fetch_array($query)) {
						$id_kelas = $data['id_kelas']; ?>
						<tr>
							<td align="center" width="5%"><?= $no++; ?>.</td>
							<td><?= $data['kelas']; ?></td>
							<td><?= $data['kelas']; ?> - <?= $data['nama_kelas']; ?></td>
							<td><?= $data['nama_unit']; ?></td>
							<td align="center" width="25%">
								<?php
								$sql1 = "SELECT * FROM detail_siswa WHERE id_detail_siswa = '$id_kelas'";
								$query1 = mysqli_query($koneksi, $sql1);
								if (mysqli_num_rows($query1) == '0') { ?>
									<a href="kelas-edit.php?id_kelas=<?= $data['id_kelas']; ?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="kelas-delete.php?id_kelas=<?= $data['id_kelas']; ?>" class="badge badge-danger delete-data p-2" title='Delete'><i class="fas fa-trash"></i></a>
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
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Input Master Kelas
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="kelas-simpan.php" method="post">
					<!-- Kelas -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Kelas</span>
						<select name="kelas" class="form-control form-control-chosen" required>
							<option value="" selected>~ Pilih Kelas ~</option>
							<option value="X">Kelas X</option>
							<option value="XI">Kelas XI</option>
							<option value="XII">Kelas XII</option>
						</select>
					</div>

					<!-- Nama Kelas -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nama Kelas</span>
						<input type="text" name="nama_kelas" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Kelas">
					</div>

					<!-- Unit -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nama Unit</span>
						<select name="id_unit" class="form-control form-control-chosen" required>
							<option value="" selected>~ Pilih Nama Unit ~</option>
							<?php
							$sql = "SELECT * FROM unit ORDER BY nama_unit";
							$query = mysqli_query($koneksi, $sql);
							while ($d = mysqli_fetch_array($query)) { ?>
								<option value="<?= $d['id_unit']; ?>"><?= $d['nama_unit']; ?></option>
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
		$('#kelas').dataTable();
	});
</script>