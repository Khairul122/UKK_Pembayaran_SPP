<?php include "header.php";?>
<?php include "sidebar.php"; ?>
<?php include "topbar.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Level</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				include "../koneksi.php";
				$sql = "SELECT * FROM tbl_login";
				$query = mysqli_query($koneksi, $sql);
				while($data = mysqli_fetch_array($query)){?>
					<tr>
						<td><?= $no++; ?>.</td>
						<td><?= $data['nama_user']; ?></td>
						<td><?= $data['username']; ?></td>
						<td><?= $data['level'];  ?></td>
						<td><a href=""><i class="fas fa-edit text-success"></i></a> | <a href=""><i class="fas fa-trash text-danger"></i></a></td>
					</tr>
					<?php 
				} ?>
			</tbody>
		</table>
	</div>
</div>

<?php include "sticky-footer.php"; ?>
<?php include "logout.php"; ?>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script src="js/jam.js"></script>
</body>
</html>