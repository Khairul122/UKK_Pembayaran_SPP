<?php 
$judul = "Edit Master Siswa";
include "templates/templates.php";

$nisn = $_GET['nisn'];
$sql	= "SELECT * FROM siswa WHERE nisn='$nisn'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$jenis_kelamin = $data['jenis_kelamin'];
?>
<div class="container">
  <div class="row">
    <div class="col-6">
			<h2>Edit Master Siswa</h2>
			<form action="siswa-update.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="nisn" value="<?= $nisn;?>">

				<!-- Nama Siswa -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Nama Siswa</span>
					<input name="nama_siswa" type="text" class="form-control form-control-sm" value="<?= $data['nama_siswa'];?>" autocomplete="off" required>
				</div>

				<!-- Jenis Kelamin -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Jenis Kelamin</span>
					<select name="jenis_kelamin" class="form-control form-control-chosen" required>
						<option value="Laki-laki" <?php if($jenis_kelamin=="Laki-laki"){echo 'selected="selected"';}?>>Laki-laki</option>
						<option value="Perempuan" <?php if($jenis_kelamin=="Perempuan"){echo 'selected="selected"';}?>>Perempuan</option>
					</select>
				</div>

				<!-- Alamat -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Alamat</span>
					<input name="alamat" type="text" class="form-control form-control-sm" required autocomplete="off" value="<?= $data['alamat'];?>">
				</div>

				<!-- Telp / WA -->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Telp / WA</span>
					<input name="no_telepon" type="text" class="form-control form-control-sm" required autocomplete="off" value="<?= $data['no_telepon'];?>">
				</div>

				  <!-- Photo -->
					<div class="input-group mb-1">
          <span class="input-group-text lebar">Photo</span>
          <?php 
          if($data['photo']!=""){?>
            <img src="photo/<?= $data['photo']; ?>" alt="photo" width="40" height="40">
            <?php 
          }else{
						if($jenis_kelamin=="Laki-laki"){?>
            	<img src="photo/male.png" alt="photo" width="40" height="40">
							<?php 
						}else{?>
            	<img src="photo/female.png" alt="photo" width="40" height="40">
            	<?php
						}
          }?>
        </div>

				<!-- Photo -->
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Photo</span>
          <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
        </div>

				<!-- Tombol Update / Cancel -->
				<div class="input-group mb-1 input-sm">
					<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update </button>| <a href="siswa.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
