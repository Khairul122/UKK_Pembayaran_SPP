<?php 
$judul = "Edit Master SPP";
include "templates/templates.php";

$id_spp = $_GET['id_spp'];
$sql = "SELECT * FROM spp WHERE id_spp='$id_spp'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<div class="container">
  <div class="row">
    <div class="col-6">
			<h2>Edit Master SPP</h2>
			<form action="spp-update.php" method="post">
				<input type="hidden" name="id_spp" value="<?= $id_spp;?>">

				<!-- Tahun Ajaran -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Tahun Ajaran</span>

					<input type="hidden" name="tahun_ajaran_lama" value="<?= $data['tahun_ajaran'];?>">

					<input type="text" name="tahun_ajaran_baru" class="form-control form-control-sm" required autofocus autocomplete="off" value="<?= $data['tahun_ajaran'];?>">
				</div>
				
				<!-- Nominal -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Nominal</span>
					<input name="nominal" class="form-control form-control-sm text-right money angkaSemua" required value="<?= $data['nominal'];?>">
				</div>

				<!-- Tombol Update / Cancel -->
				<div class="input-group mb-1 input-sm">
					<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update </button>| <a href="spp.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
