<?php 
$judul = "Edit Master Petugas";
include "templates/templates.php";

$id_petugas = $_GET['id_petugas'];
$sql = "SELECT * FROM petugas WHERE id_petugas='$id_petugas'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$level = $data['level'];?>

<div class="container">
  <div class="row">
    <div class="col-6">
			<h2>Edit Master Petugas</h2>
			<form action="petugas-update.php" method="post">
				<input type="hidden" name="id_petugas" value="<?= $id_petugas;?>">

				<!-- Nama Petugas -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Nama Petugas</span>
					<input type="text" name="nama_petugas" class="form-control form-control-sm" required autofocus autocomplete="off" value="<?= $data['nama_petugas'];?>">
				</div>

				<!-- Username -->
				<div class="input-group mb-1">
					<span class="input-group-text lebar" >Username</span>
					<input  type="hidden" name="username_lama" value="<?= $data['username'];?>">
					
					<input  type="text" name="username_baru" class="form-control form-control-sm" required autocomplete="off" value="<?= $data['username'];?>">
				</div>

				<!-- Password -->
				<div class="input-group mb-1">
					<span class="input-group-text lebar" >Password</span>
					<input type="password" name="password" class="form-control form-control-sm" required value="<?= $data['password'];?>">
				</div>

				<!-- Level -->
				<div class="input-group mb-2">
					<span class="input-group-text lebar" >Level</span>
					<select name="level" required class="form-control form-control-chosen">
						<option value="admin" <?php if($level=='admin'){echo 'selected="selected"';}?>>Admin</option>
						<option value="petugas"<?php if($level=='petugas'){echo 'selected="selected"';}?>>Petugas</option>
					</select>
				</div>
				<div class="input-group mb-1">
					<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Update</button> | <a href="petugas.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
