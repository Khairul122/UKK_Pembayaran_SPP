<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cetak Rekapitulasi SPP</title>
    <link rel="shorcut icon" type="text/css" href="img/logo.png">
    <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css"/>
   
    <style>
      body{margin-left: 20px; margin-top: 20px;}
      .box-header{margin-left: 30px; margin-top: 20px; margin-bottom: 5px;}
      tr>th{text-align: center; height: 35px; border: 2px solid;}
      tr>td{padding-left: 5px; vertical-align: middle!important;}
      tr>td>img{margin-top: 3px; margin-bottom: 3px;}
      #cetak{margin-left: 30px; margin-right: 30px;}
    </style>
  </head>
  <body onload="window.print(); window.onafterprint = window.close; ">
    <span style="font-size: 24px;">REKAPITULASI SPP</span>
    <table class="table table-bordered" style="width:50%">
      <thead>
        <tr>
          <th>No.</th>
					<th>Tahun Ajaran</th>
					<th>Nominal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $no 		= 1;
        $sql = "SELECT * FROM spp ORDER BY tahun_ajaran";
				$query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) { ?>
          <tr>
            <td align="center" width="5%"><?= $no++;?>.</td>
						<td width="75%"><?= $data['tahun_ajaran'];?></td>
						<td align="right"><?= number_format($data['nominal']);?></td>
          </tr>
        <?php
        } ?>
      </tbody>
    </table>
  </body>
</html>

