<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Cetak Rekapitulasi Nama Siswa</title>
  <link rel="shorcut icon" type="text/css" href="img/logo.png">
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
      vertical-align: middle !important;
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
  <span style="font-size: 24px;">REKAPITULASI NAMA SISWA</span>
  <table class="table table-bordered" style="width:95%">
    <thead>
      <tr>
        <th>No.</th>
        <th>Photo</th>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>JK</th>
        <th>Kelas</th>
        <th>Nama Kelas</th>
        <th>Unit</th>
        <th>Alamat</th>
        <th>Telp</th>
        <th>Ttl Bayar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include "koneksi.php";
      $no = 1;
      $ttl_bayar = 0;
      $sql = "SELECT * FROM siswa a INNER JOIN detail_siswa b ON a.nisn=b.nisn INNER JOIN kelas c ON b.id_kelas=c.id_kelas INNER JOIN unit d ON c.id_unit=d.id_unit ORDER BY c.nama_kelas, a.nama_siswa";
      $query = mysqli_query($koneksi, $sql);
      while ($data = mysqli_fetch_array($query)) {
        $photo        = $data['photo'];
        $jenis_kelamin = $data['jenis_kelamin'];
        if ($photo == "") {
          if ($jenis_kelamin == "Laki-laki") {
            $photo = "photo/male.png";
          } else {
            $photo = "photo/female.png";
          }
        } else {
          $photo = "photo/" . $data['photo'];
        }
        $ttl_bayar = $ttl_bayar + $data['total_bayar']; ?>
        <tr>
          <td class="text-center" width="5%"><?= $no++; ?>.</td>
          <td align="center">
            <img src="<?= $photo; ?>" alt="photo" width="40" height="40" title="Gambar">
          </td>
          <td><?= $data['nisn']; ?></td>
          <td><?= $data['nis']; ?></td>
          <td><?= $data['nama_siswa']; ?></td>
          <td><?= $data['jenis_kelamin']; ?></td>
          <td><?= $data['kelas']; ?></td>
          <td><?= $data['kelas']; ?>-<?= $data['nama_kelas']; ?></td>
          <td><?= $data['nama_unit']; ?></td>
          <td><?= $data['alamat']; ?></td>
          <td><?= $data['no_telepon']; ?></td>
          <td class="text-right"><?= number_format($data['total_bayar']); ?></td>
        </tr>
      <?php
      } ?>
      <tr>
        <td colspan="11" align="right">Total</td>
        <td align="right"><?= number_format($ttl_bayar, 0); ?></td>
      </tr>
    </tbody>
  </table>
</body>

</html>