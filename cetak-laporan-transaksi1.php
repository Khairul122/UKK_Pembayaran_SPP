<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Cetak Rekapitulasi Transaksi</title>
  <link rel="shorcut icon" type="text/css" href="img/logo.jpg">
  <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css" />

  <style>
    body {
      margin-left: 20px;
      margin-top: 20px;
    }

    .box-header {
      margin-left: 30px;
      margin-top: 20px;
      margin-bottom: 5px;
    }

    tr>th {
      text-align: center;
      height: 35px;
      border: 2px solid;
    }

    tr>td {
      padding-left: 5px;
      vertical-align: middle !important;
    }

    tr>td>img {
      margin-top: 3px;
      margin-bottom: 3px;
    }

    #cetak {
      margin-left: 30px;
      margin-right: 30px;
    }
  </style>
</head>

<body onload="window.print(); window.onafterprint = window.close; ">
  <?php
  include "koneksi.php";
  $no = 1;
  $periodeDari    = $_POST['periodeDari'];
  $periodeSampai  = $_POST['periodeSampai'];
  $nisn           = $_POST['nisn']; ?>

  <span style="font-size: 24px;">REKAPITULASI TRANSAKSI PERIODE <?= date_format(date_create($periodeDari), "d M Y") . " s/d tanggal " . date_format(date_create($periodeSampai), "d M Y"); ?> </span>
  <?php
  if ($nisn != "") {
    $sql = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $query = mysqli_query($koneksi, $sql);
    if ($a = mysqli_num_rows($query) > 0) {
      $data = mysqli_fetch_array($query);
      $nama = $data['nama_siswa'];
    }
  }
  ?>
  </br>
  <?php
  if ($nisn != "") { ?>
    <span style="font-size: 18px;">Nama : <?= $nama; ?> - Nis : <?= $nisn; ?></span>
  <?php
  } ?>
  <table class="table table-bordered" style="width:96%">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Tgl</th>
        <th>Tahun Ajaran</th>
        <th>Photo</th>
        <?php
        if ($nisn == "") { ?>
          <th>NIS</th>
          <th>Nama Siswa</th>
        <?php
        } ?>
        <th>Kelas</th>
        <th>Nama Kelas</th>
        <th>Tgl Bayar</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $ttl = 0;
      include "koneksi.php";
      if ($nisn == "") {
        $sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa = c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn INNER JOIN kelas e ON c.id_kelas = e.id_kelas INNER JOIN spp f ON c.id_spp=f.id_spp WHERE a.tgl_bayar<>'0000-00-00'";
      } else {
        $sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa = c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn INNER JOIN kelas e ON c.id_kelas = e.id_kelas INNER JOIN spp f ON c.id_spp=f.id_spp WHERE a.tgl_bayar<>'0000-00-00' AND d.nisn='$nisn'";
      }
      $query = mysqli_query($koneksi, $sql);
      if ($a = mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_array($query)) {
          $tgl      = $data['tgl_bayar'];
          if (($tgl >= $periodeDari && $tgl <= $periodeSampai) || ($periodeDari == "" && $periodeSampai == "")) {
            $ttl = $ttl + $data['total_bayar'];
            $photo = $data['photo'];
            if ($photo == "") {
              if ($data['jenis_kelamin'] == 'Laki-laki') {
                $photo = "male.png";
              } else {
                $photo = "female.png";
              }
            }

      ?>
            <tr>
              <td align="center"><?= $no++; ?>.</td>
              <td align="center"><?= date_format(date_create($data['tgl_bayar']), "d M Y"); ?></td>
              <td align="center"><?= $data['tahun_ajaran']; ?></td>
              <td align="center"><img src="photo/<?= $photo; ?>" width="40px" height="40xp"></td>
              <?php
              if ($nisn == "") { ?>
                <td><?= $data['nisn']; ?></td>
                <td><?= $data['nama_siswa']; ?></td>
              <?php
              } ?>
              <td align="center"><?= $data['kelas']; ?></td>
              <td align="center"><?= $data['kelas']; ?>-<?= $data['nama_kelas']; ?></td>
              <td><?= date_format(date_create($data['tgl_bayar']), "d M Y"); ?></td>
              <td align="right"><?= number_format($data['total_bayar'], 0); ?></td>
            </tr>
      <?php
          }
        }
      } ?>
      <tr>
        <?php
        if ($nisn == "") { ?>
          <td colspan="9" align="right">Total</td>
        <?php
        } else { ?>
          <td colspan="7" align="right">Total</td>
        <?php
        } ?>
        <td align="right"><?= number_format($ttl, 0); ?> </td>
      </tr>

    </tbody>
  </table>
</body>

</html>