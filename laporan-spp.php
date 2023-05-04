<?php
  $judul = "Laporan SPP";
  include "templates/templates.php";
?>

<div class="container-fluid pt-3 pb-5">
  <div class="row mt-3">
    <div class="col-xl-6 table-responsive">
      <a href="cetak-laporan-spp.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak SPP&nbsp;&nbsp;</a>

      <table class="table table-bordered table-hover" id="laporanSPP">
        <thead>
          <tr>
            <th>No.</th>
						<th>Tahun Ajaran</th>
						<th>Nominal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no 		= 1;
          $sql = "SELECT * FROM spp ORDER BY tahun_ajaran";
					$query = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td align="center" width="5%"><?= $no++;?>.</td>
							<td align="center"><?= $data['tahun_ajaran'];?></td>
							<td align="right"><?= number_format($data['nominal']);?></td>
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
		$('#laporanSPP').dataTable();
	});
</script>
