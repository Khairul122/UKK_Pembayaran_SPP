<?php
$judul = "Laporan Nama Unit";
include "templates/templates.php";
?>

<div class="container-fluid pt-3 pb-5">
  <div class="row mt-3">
    <div class="col-xl-8 table-responsive">
      <a href="cetak-laporan-unit.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak Nama Unit&nbsp;&nbsp;</a>

      <table class="table table-bordered table-hover" id="laporanKelas">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Unit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no     = 1;
          $sql     = "SELECT * FROM unit";
          $query   = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td><?= $data['nama_unit']; ?></td>
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