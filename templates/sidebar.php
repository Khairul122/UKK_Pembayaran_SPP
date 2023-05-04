<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="img/logo.jpg" alt="logo" height="20px" width="20px">
    </div>
    <div class="sidebar-brand-text mx-3">SPP KARTIKA</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <?php 
  // Login sebagai Administrator
  if($_SESSION['level']=="admin"){?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>MASTER</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="petugas.php">PETUGAS</a>
          <a class="collapse-item" href="unit.php">NAMA UNIT</a>
          <a class="collapse-item" href="kelas.php">KELAS</a>
          <a class="collapse-item" href="spp.php">SPP</a>
          <a class="collapse-item" href="siswa.php">SISWA</a>
          <a class="collapse-item" href="siswa-detail.php">DETAIL SISWA</a>
        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php 
  }?>

  <!-- Nav Item - Pembayaran -->
  <?php 
  // Login bukan sebagai Siswa
  if($_SESSION['level']!="siswa"){?>
    <li class="nav-item">
      <a class="nav-link" href="pembayaran.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Pembayaran</span>
      </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Nav Item - Laporan -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan-laporan</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <?php 
          if($_SESSION['level']!="siswa"){?>
            <a class="collapse-item" href="laporan-petugas.php">Petugas</a>
            <a class="collapse-item" href="laporan-nama-kompetensi.php">Nama unit</a>
            <a class="collapse-item" href="laporan-kelas.php">Kelas</a>
            <a class="collapse-item" href="laporan-spp.php">SPP</a>
            <a class="collapse-item" href="laporan-siswa.php">Siswa</a>
            <?php 
          }?>
          <a class="collapse-item" href="laporan-transaksi.php">Transaksi</a>
        </div>
      </div>
    </li>
    <?php 
  }?>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>

<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
