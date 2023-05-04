<?php 
$judul = "EDIT MASTER PEMBAYARAN";
include "header.php";
include "koneksi.php";
$id_pembayaran = $_GET['id_pembayaran'];
$sql = "SELECT * FROM tbl_pembayaran a INNER JOIN tb_siswa b ON a.nisn=b.nisn WHERE a.id_pembayaran='$id_pembayaran'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$nisn = $data['nisn'];
$nama = $data['nama'];
$bulan_bayar = $data['bulan_bayar'];
$id_spp = $data['id_spp'];
?>
<div class="col-6">
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="pembayaran-update.php" method="post">
					<input type="hidden" name="id_pembayaran" value="<?= $id_pembayaran;?>">
					<input type="hidden" name="nisn" value="<?= $nisn;?>">
					
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Siswa</span>
						<input type="text" class="form-control" value="<?= $nama;?>" readonly>
					</div>

					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Tgl Bayar</span>
						<input type="date" name="tgl_bayar" required autocomplete="off" class="form-control" value="<?= $data['tgl_bayar'];?>">
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Nama Bulan</span>
						<select name="bulan_bayar" class="form-control" required>
							<option value="01" <?php if($bulan_bayar=="01"){echo 'selected="selected"';}?>>Januari</option>
							<option value="02" <?php if($bulan_bayar=="02"){echo 'selected="selected"';}?>>Februari</option>
							<option value="03" <?php if($bulan_bayar=="03"){echo 'selected="selected"';}?>>Maret</option>
							<option value="04" <?php if($bulan_bayar=="04"){echo 'selected="selected"';}?>>April</option>
							<option value="05" <?php if($bulan_bayar=="05"){echo 'selected="selected"';}?>>Mei</option>
							<option value="06" <?php if($bulan_bayar=="06"){echo 'selected="selected"';}?>>Juni</option>
							<option value="07" <?php if($bulan_bayar=="07"){echo 'selected="selected"';}?>>Juli</option>
							<option value="08" <?php if($bulan_bayar=="08"){echo 'selected="selected"';}?>>Agustus</option>
							<option value="09" <?php if($bulan_bayar=="09"){echo 'selected="selected"';}?>>September</option>
							<option value="10" <?php if($bulan_bayar=="10"){echo 'selected="selected"';}?>>Oktober</option>
							<option value="11" <?php if($bulan_bayar=="11"){echo 'selected="selected"';}?>>November</option>
							<option value="12" <?php if($bulan_bayar=="12"){echo 'selected="selected"';}?>>Desembar</option>
						</select>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Tahun</span>
						<select name="id_spp" class="form-control" required >
							<?php
							$sql = "SELECT * FROM tbl_spp ORDER BY tahun";
							$query = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($query)){?>
								<option value="<?= $d['id_spp'];?>" <?php if($data['id_spp']==$id_spp){echo 'selected="selected"';}?>><?= $d['tahun'];?></option>
								<?php
							}?>
						</select>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Jumlah Bayar</span>
						<input type="text" name="jumlah_bayar" required autocomplete="off" class="form-control" value="<?= $data['jumlah_bayar']; ?>">
					</div>
					<div class="input-group mb-1">
						<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update </button>| <a href="pembayaran.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>
</div>
