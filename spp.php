<?php
$judul = "Master SPP";
include "templates/templates.php";
?>

<div class="container">
	<div class="row">
		<div class="col-8">
			<h2>Rekapitulasi Master SPP</h2>
			<hr>
			<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fas fa-plus"></i> Tambah
			</button>

			<table class="table table-bordered table-hover" id="spp">
				<thead>
					<tr class="text-center">
						<th>No.</th>
						<th>Tahun Ajaran</th>
						<th>Nominal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = "SELECT * FROM spp ORDER BY tahun_ajaran";
					$query = mysqli_query($koneksi, $sql);
					while ($data = mysqli_fetch_array($query)) {
						$id_spp = $data['id_spp']; ?>
						<tr>
							<td align="center" width="5%"><?= $no++; ?>.</td>
							<td align="center"><?= $data['tahun_ajaran']; ?></td>
							<td align="right"><?= number_format($data['nominal']); ?></td>
							<td align="center" width="25%">
								<?php
								$sql1 = "SELECT * FROM spp WHERE tahun_ajaran = '$id_spp'";
								$query1 = mysqli_query($koneksi, $sql1);
								if (mysqli_num_rows($query1) == '0') { ?>
									<a href="spp-edit.php?id_spp=<?= $data['id_spp']; ?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="spp-delete.php?id_spp=<?= $data['id_spp']; ?>" class="badge badge-danger delete-data p-2" title="Delete"><i class="fas fa-trash"></i></a>
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
					Input Master SPP
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="spp-simpan.php" method="post">
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Tahun Ajaran</span>
						<input type="text" name="tahun_ajaran" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Tahun Ajaran">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Bulanan</span>
						<input type="text" name="nominal" class="form-control form-control-sm text-right angkaSemua money" placeholder="Input SPP Bulanan" required autocomplete="off">
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
		$('#spp').dataTable();
	});
</script>