<?php
    include '../config/koneksi.php';
    session_start();
    
    if(!isset($_SESSION['user'])) {
        echo "<script>alert('Anda Belum Login!');document.location.href='login.php';</script>";
    } 

    $ambil = $_SESSION['user'];
    

    $admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$ambil'");

    $dadmin = mysqli_fetch_array($admin);
    $ambil2 = $dadmin['hak_akses'];
    $home = '';

    if($ambil2 == '') {
      echo "<script>alert('Anda Belum Login!');document.location.href='login.php';</script>";
    }
    else if($ambil2 == 'Administrator') {
      $home = 'administrator.php';
    }
    else {
      $home = 'index.php';
    }

    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <style>
      .list-group a:hover {
        background: #A50973;
        color: white;
      }
      .menu {
        background: #FF00AD;
        color: white;
        border: 1px solid white;
      }
      .komentar {
      border: 1px solid #5cb85c;
      border-radius :4px;
      width: 100%;
      height: 340px;
      overflow: scroll;
  }
      

    </style>

    <link rel="stylesheet" href="../leaflet/leaflet.css" />
    <script src="../leaflet/leaflet.js"></script>

    <title>ADMIN | SIG OLEH-OLEH KHAS SULTRA</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row text-light text-center p-3" style="background: #A50973">
        <div class="col">
          <a href="<?php echo $home; ?>" class="text-light" style="text-decoration: none;"><h3>SISTEM INFORMASI GEOGRAFIS TOKO OLEH-OLEH KHAS SULTRA</h3></a>
        </div>
      </div>
      <div class="row" >
      <div class="col p-0 m-0">
        
        <div class="col-sm-9 pt-2 w-100 float-sm-right" style="min-height: 500px;">