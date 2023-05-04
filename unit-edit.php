<?php
$judul = "Edit Unit";
include "templates/templates.php";

$id_unit = $_GET['id_unit'];
$sql = "SELECT * FROM unit WHERE id_unit='$id_unit'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query); ?>

<div class="container">
	<div class="row">
		<div class="col-6">
			<h2>Edit Nama Unit</h2>
			<form action="unit-update.php" method="post">
				<input type="hidden" name="id_unit" value="<?= $id_unit; ?>">

				<input name="nama_unit_lama" value="<?= $data['nama_unit']; ?>" type="hidden">

				<!-- Nama Unit Baru-->
				<div class="input-group mb-1">
					<span class="input-group-text lebar">Nama Unit</span>
					<input name="nama_unit_baru" value="<?= $data['nama_unit']; ?>" class="form-control form-control-sm" required>
				</div>

				<div class="input-group mb-1">
					<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Update</button> | <a href="unit.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "templates/footer.php"; ?>