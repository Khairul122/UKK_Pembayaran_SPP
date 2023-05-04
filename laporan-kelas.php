<?php
$judul = "Laporan Kelas";
include "templates/templates.php";
?>

<div class="container-fluid pt-3 pb-5">
  <div class="row mt-3">
    <div class="col-xl-8 table-responsive">
      <a href="cetak-laporan-kelas.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak Kelas&nbsp;&nbsp;</a>

      <table class="table table-bordered table-hover" id="laporanKelas">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kelas</th>
            <th>Nama Kelas</th>
            <th>Nama Unit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no     = 1;
          $sql     = "SELECT * FROM kelas a INNER JOIN unit b ON a.id_unit=b.id_unit";
          $query   = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td><?= $data['kelas']; ?></td>
              <td><?= $data['kelas']; ?>-<?= $data['nama_kelas']; ?></td>
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