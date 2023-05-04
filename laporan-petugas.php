<?php
  $judul = "Laporan Nama Petugas";
  include "templates/templates.php";
?>

<div class="container-fluid pt-3 pb-5">
  <div class="row mt-3">
    <div class="col-xl-8 table-responsive">
      <a href="cetak-laporan-petugas.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak Petugas&nbsp;&nbsp;</a>

      <table class="table table-bordered table-hover" id="laporanKelas">
        <thead>
          <tr class="text-center">
            <th width="5%">No.</th>
            <th>Username</th>
            <th>Nama Petugas</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no 		= 1;
          $sql = "SELECT * FROM petugas";
          $query 	= mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td align="center" width="3%"><?= $no++;?>.</td>
              <td width="25%"><?=  $data['nama_petugas']; ?></td>
              <td><?= $data['nama_petugas']; ?></td>
              <td width="20%"><?= $data['level']; ?></td>
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
		$('#laporanKelas').dataTable();
	});
</script>
