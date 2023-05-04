<!-- Header -->
<?php 
  $judul = "Petugas";
  include "templates/templates.php";
?>

<!-- Body -->
<div class="container">
  <div class="row">
    <div class="col-10">
      <h2>Rekapituasi Master Petugas</h2>
      <hr>
      <button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fas fa-plus"></i> Tambah
      </button>
      
      <table class="table table-bordered table-hover" id="petugas">
        <thead>
          <tr class="text-center">
            <th width="5%">No.</th>
            <th>Username</th>
            <th>Nama Petugas</th>
            <th>Level</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $no = 1;
          // $sql = "CALL pPetugas()";
          $sql = "SELECT * FROM petugas";
          $query = mysqli_query($koneksi, $sql);
          while($data = mysqli_fetch_array($query)){
            $username=$data['username'];?>
            <tr>
              <td align="center" width="3%"><?= $no++;?>.</td>
              <td width="25%"><?= $username;?></td>
              <td><?= $data['nama_petugas'];?></td>
              <td width="20%"><?= $data['level'];?></td>
              <td align="center" width="20%">
                <?php 
                if($username!="admin"){?>
                  <a href="petugas-edit.php?id_petugas=<?= $data['id_petugas'];?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | 
                  <a href="petugas-delete.php?id_petugas=<?= $data['id_petugas'];?>" class="badge badge-danger delete-data p-2" title='Delete'><i class="fas fa-trash"></i></a> 
                  <?php 
                }?>
              </td>
            </tr>
            <?php
          }?>
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
					Input Master Petugas
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="petugas-simpan.php" method="post">
				  <!-- Nama Petugas -->
          <div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Petugas</span>
						<input type="text" name="nama_petugas" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Nama Petugas">
					</div>

          <!-- Username -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Username</span>
						<input type="text" name="username" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Username">
					</div>

          <!-- Password -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Password</span>
						<input type="password" name="password" required  class="form-control form-control-sm" placeholder="Input Password">
					</div>

          <!-- Level -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Level</span>
						<select name="level" class="form-control form-control-chosen" required>
							<option value="" selected>~ Pilih Level ~</option>
							<option value="admin">Admin</option>
							<option value="petugas">Petugas</option>
						</select>
					</div>
          
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- footer -->
<?php include "templates/footer.php";?>
<script>
	$(document).ready(function() {
		$('#petugas').dataTable();
  });
</script>