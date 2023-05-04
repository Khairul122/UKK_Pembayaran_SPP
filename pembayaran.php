<?php
error_reporting(0);
$judul = "PEMBAYARAN";
include "templates/templates.php";
$tgl = date('Y-m-d'); ?>

<div class="container">
	<div class="row">
		<div class="col">
			<h2>Rekapiluasi Pembayaran</h2>
			<hr>
			<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fas fa-plus"></i> Tambah
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-12 table-responsive">
			<table class="table table-bordered table-hover" id="pembayaran" cellspacing="0" width="140%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tahun Ajaran</th>
						<th>Nama Siswa</th>
						<th>Nama Kelas</th>
						<th>Tgl Bayar</th>
						<th>Bulan - Tahun</th>
						<th>Jumlah Bayar</th>
						<th>Nama Petugas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa=c.id_detail_siswa INNER JOIN spp d ON c.id_spp=d.id_spp INNER JOIN siswa e ON c.nisn=e.nisn INNER JOIN kelas f ON c.id_kelas=f.id_kelas INNER JOIN petugas g ON a.id_petugas=g.id_petugas INNER JOIN unit h ON f.id_unit=h.id_unit WHERE a.tgl_bayar<>'0000-00-00'";
					$query = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($query) > 0) {
						while ($data = mysqli_fetch_array($query)) { ?>
							<tr>
								<td align="center" width="5%"><?= $no++; ?>.</td>
								<td align="center"><?= $data['tahun_ajaran']; ?></td>
								<td><?= $data['nama_siswa']; ?></td>
								<td><?= $data['nama_kelas']; ?> - <?= $data['nama_unit']; ?></td>
								<td align="center" width="10%"><?= date_format(date_create($data['tgl_bayar']), "d-m-Y"); ?></td>
								<td><?= $data['keterangan']; ?></td>
								<td align="right"><?= number_format($data['nominal']); ?></td>
								<td><?= $data['nama_petugas']; ?></td>
								<td align="center" style="display:inline-block; width:100px;">
									<a href="pembayaran-delete.php?id_detail_pembayaran=<?= $data['id_detail_pembayaran']; ?>" class="badge badge-danger delete-data p-2" title='Delete'><i class="fas fa-trash"></i></a>
								</td>
							</tr>
					<?php
						}
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Input Pembayaran
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="pembayaran-simpan.php" method="post">

					<!-- Tanggal Bayar -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Tgl Bayar</span>
						<input type="date" name="tgl_bayar" required autocomplete="off" class="form-control form-control-sm" value="<?= $tgl; ?>">
					</div>

					<!-- Nama Siswa -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nama Siswa</span>
						<select name="id_pembayaran" class="form-control form-control-chosen" id="pilihNamaSiswa" required>
							<option value="" selected>~ Pilih Nama Siswa ~</option>
							<?php
							include "koneksi.php";
							$sql = "SELECT * FROM siswa a INNER JOIN detail_siswa b ON a.nisn=b.nisn INNER JOIN kelas c ON b.id_kelas=c.id_kelas INNER JOIN spp d ON b.id_spp=d.id_spp INNER JOIN unit e ON c.id_unit=e.id_unit INNER JOIN pembayaran f ON b.id_detail_siswa=f.id_detail_siswa";
							$query = mysqli_query($koneksi, $sql);
							while ($d = mysqli_fetch_array($query)) { ?>
								<option value="<?= $d['id_pembayaran']; ?>"><?= $d['nama_siswa'] . ' - ' . $d['kelas'] . '-' . $d['nama_kelas'] . ' - ' . $d['nama_unit'] . ' - ' . $d['tahun_ajaran']; ?></option>
							<?php
							} ?>
						</select>
					</div>

					<input type="hidden" name="id_pembayaran">

					<!-- Nama Keterangan -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nama Bulan</span>
						<input type="text" name="keterangan" class="form-control form-control-sm" readonly required>
					</div>

					<!-- Nominal -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nominal</span>
						<input type="text" name="nominal" class="form-control form-control-sm" readonly required>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Bayar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include "templates/footer.php"; ?>
<script>
	$(document).ready(function() {
		$('#pembayaran').dataTable();

		$(document).on('change', '#pilihNamaSiswa', function() {
			var id_pembayaran = $('[name="id_pembayaran"]').val();
			$.ajax({
				method: 'POST',
				data: {
					id_pembayaran: id_pembayaran
				},
				url: 'siswa-cari-ajax.php',
				cache: false,
				success: function(result) {
					var row = JSON.parse(result);
					var keterangan = row.keterangan;
					var id_detail_pembayaran = row.id_detail_pembayaran;
					var nominal = row.nominal;
					$("[name='keterangan']").val(keterangan);
					$("[name='nominal']").val(nominal);
					$("[name='id_pembayaran']").val(id_pembayaran);
				}
			})

		});
	});
</script>