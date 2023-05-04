<?php
date_default_timezone_set("Asia/Jakarta");
$tglHariIni = date('Y-m-d');
$judul = "Laporan Transaksi";
include "templates/templates.php";
?>
<style>
  .lebar1 {
    width: 80px !important;
    height: 30px !important;
  }
</style>

<div class="container-fluid pt-3 pb-5">
  <div class="row">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase text-dark">Rekapitulasi Transaksi</h3>
      <hr class="hr">
    </div>
  </div>

  <!-- Periode -->
  <form action="cetak-laporan-transaksi.php" method="post" target="_blank">
    <div class="row mb-4 mt-2">
      <div class="col-xl-11">
        <div class="input-group mb-1">
          <span class="input-group-text lebar1">Dari</span>
          <input type="date" name="periodeDari" id="periodeDari" class="form-control form-control-sm" value="<?= $tglHariIni; ?>">

          <span class="input-group-text lebar1">Sampai</span>
          <input type="date" name="periodeSampai" id="periodeSampai" class="form-control form-control-sm" value="<?= $tglHariIni; ?>">

          <select name="nisn" class="form-control form-control-sm form-control-chosen">
            <?php
            if ($_SESSION['level'] != "siswa") { ?>
              <option value="" selected>~ Pilih Nama Siswa~</option>
              <?php
              $sql     = "SELECT * FROM siswa a INNER JOIN detail_siswa b ON a.nisn=b.nisn INNER JOIN kelas c ON b.id_kelas = c.id_kelas INNER JOIN unit d ON c.id_unit=d.id_unit ORDER BY c.id_kelas, c.nama_kelas, a.nama_siswa ";
            } else {
              $nisn = $_SESSION['nisn'];
              $sql     = "SELECT * FROM siswa a INNER JOIN kelas b ON a.id_kelas = b.id_kelas WHERE nisn = '$nisn' ORDER BY a.id_kelas, b.nama_kelas, a.nama ";
            }
            $query   = mysqli_query($koneksi, $sql);
            if ($_SESSION['level'] != "siswa") {
              while ($k = mysqli_fetch_array($query)) { ?>
                <option value="<?= $k['nisn']; ?>"><?= $k['nama_siswa']; ?> - <?= $k['kelas']; ?>-<?= $k['nama_kelas']; ?> - <?= $k['nama_unit']; ?></option>
              <?php
              }
            } else {
              $data = mysqli_fetch_array($query);
              $nama_kelas = $data['nama_kelas']; ?>
              <option value="<?= $nisn; ?>"><?= $nama . " - Kelas : " . $nama_kelas; ?></option>
            <?php
            } ?>
          </select>

          <a class="btn btn-sm btn-primary text-white" id="periodeCari"><i class="fas fa-search pt-1"></i></a>

          <button class="btn btn-sm btn-success text-white" type="submit" id="periodePrint" name="cetak"><i class="fas fa-print"></i></button>
        </div>
      </div>
    </div>
  </form>

  <!-- Tabel -->
  <div class="row">
    <div class="col-xl-12 table-responsive">
      <div id="tampilkanTransaksiPeriode">
        <table class="table table-bordered table-hover table-sm" id="tblTransaksi">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th>Tgl Bayar</th>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th>Nama Kelas</th>
              <th>Bulan</th>
              <th>Jumlah Bayar</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            $sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa = c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn INNER JOIN kelas e ON c.id_kelas = e.id_kelas WHERE a.tgl_bayar<>'0000-00-00'";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td align="center"><?= $no++; ?>.</td>
                <td align="center"><?= date_format(date_create($data['tgl_bayar']), "d M Y"); ?></td>
                <td><?= $data['nisn']; ?></td>
                <td><?= $data['nama_siswa']; ?></td>
                <td align="center"><?= $data['kelas']; ?></td>
                <td align="center"><?= $data['kelas']; ?>-<?= $data['nama_kelas']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td align="right"><?= number_format($data['nominal'], 0); ?></td>
              </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>
<script>
  $(document).ready(function() {
    $('#tblTransaksi').dataTable();
    // Menampilkan Tabel Transaksi Per Periode

    $(document).on('click', '#periodeCari', function() {
      var periodeDari = $('#periodeDari').val();
      var periodeSampai = $('#periodeSampai').val();
      var nisn = $('[name="nisn"]').val();
      $.ajax({
        method: 'POST',
        data: {
          periodeDari: periodeDari,
          periodeSampai: periodeSampai,
          nisn: nisn
        },
        url: 'transaksi-cari-periode.php',
        cache: false,
        success: function() {
          $('#tampilkanTransaksiPeriode').load('transaksi-cari-periode.php', {
            periodeDari: periodeDari,
            periodeSampai: periodeSampai,
            nisn: nisn
          });
        }
      });
    });

    $('.form-control-chosen').chosen({
      allow_single_deselect: true,
    });
  });
</script>