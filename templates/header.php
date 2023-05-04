<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul; ?></title>
    
    <link rel="shortcut icon" href="img/logo.jpg" />
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="css/sb-admin-2.min.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="css/component-chosen.css" />
    <link rel="stylesheet" href="css/all-style.css" />
  </head>
  <body id="page-top">
    <div id="wrapper">
      
      <div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ 
        echo $_SESSION['info']; } unset($_SESSION['info']); ?>">
      </div>