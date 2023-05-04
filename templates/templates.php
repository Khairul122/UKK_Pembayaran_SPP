<?php 
session_start();
$nama     = $_SESSION['nama'];
$level    = $_SESSION['level'];
$nisn     = $_SESSION['nisn'];

include "koneksi.php";
include "header.php";
include "sidebar.php";
include "topbar.php";


?>