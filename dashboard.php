<!-- Header -->
<?php
$judul = "H O M E";
include "templates/templates.php";

// Hitung Siswa laki-laki
$sql = "SELECT * FROM siswa WHERE jenis_kelamin='Laki-laki'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) > 0) {
  $laki_laki = mysqli_num_rows($query);
} else {
  $laki_laki = 0;
}

// Hitung Siswa Perempuan
$sql = "SELECT * FROM siswa WHERE jenis_kelamin='Perempuan'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) > 0) {
  $perempuan = mysqli_num_rows($query);
} else {
  $perempuan = 0;
}

// Rencana Tagihan
if ($level != "siswa") {
  $sql = "SELECT sum(total_tagihan) as ttl_tagihan FROM siswa";
} else {
  $nisn = $_SESSION['nisn'];
  $sql = "SELECT sum(total_tagihan) as ttl_tagihan FROM siswa WHERE nisn='$nisn'";
}
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) > 0) {
  $data = mysqli_fetch_array($query);
  $total_tagihan = $data['ttl_tagihan'];
} else {
  $total_tagihan = 0;
}

// Penerimaan
$sql = "SELECT sum(total_bayar) as ttl_bayar FROM siswa ";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) > 0) {
  $data = mysqli_fetch_array($query);
  $total_bayar = $data['ttl_bayar'];
} else {
  $total_bayar = 0;
}
?>

<!--body -->
<div class="container">
  <div class="row my-2 ">
    <div class="col-10">
      <div class="jumbotron p-3 m-0">
        <h1 class="display-5">Selamat Datang <?= $nama; ?></h1>
        <p class="jumbotron-body">di Aplikasi Pembayaran SPP</p>
        <hr>
        <p class="jumbotron-footter">KARTIKA <?= date('Y'); ?></p>
      </div>
    </div>
  </div>
  <?php
  if ($level != "siswa") { ?>
    <div class="row pt-3">
      <!-- Total Siswa -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-info border-success judul-spp">SISWA <span class="badge badge-primary text-right"><?= $laki_laki + $perempuan; ?></span></div>
          <div class="card-body jenis-kelamin">
            <div class="row">
              <div class="col-md-6">
                <?= $laki_laki; ?>
              </div>
              <div class="col-md-6">
                <?= $perempuan; ?>
              </div>
            </div>
          </div>
          <div class="card-footer border-info siswa">
            <div class="row">
              <div class="col-md-6">Laki-laki</div>
              <div class="col-md-6">Perempuan</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Rencana Penerimaan -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-danger border-success judul-spp">RENCANA PENERIMAAN </div>
          <div class="card-body rencana-penerimaan">
            <?= number_format($total_tagihan); ?>
          </div>
        </div>
      </div>

      <!-- Penerimaa -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-success judul-spp">PENERIMAAN </div>
          <div class="card-body rencana-penerimaan">
            <?= number_format($total_bayar); ?>
          </div>
        </div>
      </div>

      <!-- Sisa Penerimaan -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-warning judul-spp">SISA </div>
          <div class="card-body rencana-penerimaan">
            <?= number_format($total_tagihan - $total_bayar); ?>
          </div>
        </div>
      </div>

    </div>
  <?php
  } else {
    // Rincian Pembayaran siswa
    $sql = "SELECT sum(total_bayar) as ttl_bayar FROM siswa WHERE nisn ='$nisn'";
    $query = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($query) > 0) {
      $data = mysqli_fetch_array($query);
      $ttl_byr = $data['ttl_bayar'];
    } else {
      $ttl_byr = 0;
    } ?>

    <div class="row pt-3">
      <!-- Total Tagihan -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-danger border-success judul-spp">TOTAL TAGIHAN </div>
          <div class="card-body rencana-penerimaan">
            <?= number_format($total_tagihan); ?>
          </div>
        </div>
      </div>

      <!-- Rincian Pembayaran -->
      <div class="col-6">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-success judul-spp">RINCIAN PEMBAYARAN</div>
          <div class="card-body rincian-pembayaran">
            <div class="row">
              <div class="col-xl-12 table-responsive">
                <table class="table table-bordered" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No.</th>
                      <th>Bulan - Tahun</th>
                      <th>Tgl Bayar</th>
                      <th>Jumlah Bayar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa=c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn WHERE d.nisn='$nisn' ORDER BY a.id_detail_pembayaran";
                    $query = mysqli_query($koneksi, $sql);
                    if (mysqli_num_rows($query) > 0) {
                      while ($data = mysqli_fetch_array($query)) {
                        $tgl_bayar = $data['tgl_bayar'];
                        if ($tgl_bayar == "0000-00-00") {
                          $tgl_bayar = "";
                          $nominal = "";
                        } else {
                          $tgl_bayar = date_format(date_create($data['tgl_bayar']), "d-m-Y");
                          $nominal = number_format($data['nominal'], 0, ",", ".");
                        } ?>

                        <tr>
                          <td class="text-center" width="8%"><?= $no++; ?>.</td>
                          <td><?= $data['keterangan']; ?></td>
                          <td width="24%" align="center"><?= $tgl_bayar; ?></td>
                          <td align="right"><?= $nominal; ?></td>

                        </tr>
                    <?php
                      }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card-footer border-success siswa">
            Total Pembayaran : <?= number_format($ttl_byr); ?>
          </div>
        </div>
      </div>

      <!-- Penerimaa -->
      <div class="col-3">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-warning judul-spp">SISA </div>
          <div class="card-body rencana-penerimaan">
            <?= number_format($total_tagihan - $ttl_byr); ?>
          </div>
        </div>
      </div>

    </div>
  <?php
  } ?>
</div>

<!-- Footer -->
<?php include "templates/footer.php"; ?>