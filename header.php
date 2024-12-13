<?php 
  include 'config/koneksi.php';
  session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="179358821991-bmkcgcr0b1g8767dk0vm71rngj21mspa.apps.googleusercontent.com">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <style>
      body {
        background-color: #cc00ff;
      }
      p {
        text-align: justify;
      }
      .menu {
        padding: 5px;
        font-weight: bold;
        font-size: 18px;
      }
      .menu:hover {
        background-color: black;
      }
      .icon {
        text-decoration: none;
        color: #A50973;
      }
      .icon:hover {
        background: #F3F3F3;
        text-decoration: none;
      }
      .icon a {
        text-decoration: none;
        color: #A50973;
      }
      .isi {
        background:#F1F3F4;
      }

      .komentar {
      border: 1px solid #5cb85c;
      border-radius :4px;
      width: 100%;
      height: 300px;
      overflow: scroll;
  }
      

    </style> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link rel="stylesheet" href="leaflet/leaflet.css" />
    <script src="leaflet/leaflet.js"></script>

    <title>SIG TOKO OLEH-OLEH KHAS SULTRA</title>
  </head>

  <body onload="getLocation()">
    <div class="container">

      <div class="row text-light text-center p-3" style="background: #A50973">
        <div class="col">
          <a href="index.php" class="text-light" style="text-decoration: none;"><h3>SISTEM INFORMASI GEOGRAFIS TOKO OLEH-OLEH KHAS SULTRA</h3></a>
          <div id="google_translate_element"></div>

          <script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.InlineLayout}, 'google_translate_element');
          }
          </script>

          <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
      </div>

      <div class="row text-light text-center p-1" style="background: #ff00ad;">
        <div class="col">
          <nav class="navbar navbar-expand-lg navbar-dark" style="background: #ff00ad;">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand menu text-light d-lg-none d-xl-none" href="#">MENU</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <a class="navbar-brand menu" href="index.php" style="color: white;">
                  <li class="nav-item">HOME</li>
                </a>
                <span><hr class="d-lg-none d-xl-none"></span>

                <span class="d-none d-lg-block text-light mt-1 mr-3" style="font-size: 20px;">|</span>
                <a class="navbar-brand menu" href="cari.php" style="color: white;">
                  <li class="nav-item">CARI TOKO OLEH-OLEH</li>
                </a>
                <span><hr class="d-lg-none d-xl-none"></span>
                <span class="d-none d-lg-block text-light mt-1 mr-3" style="font-size: 20px;">|</span>
                
                <a class="navbar-brand menu" href="oleh-oleh.php" style="color: white;">
                  <li class="nav-item">OLEH-OLEH KHAS SULTRA</li>
        </a>
        <span class="d-none d-lg-block text-light mt-1 mr-3" style="font-size: 20px;">|</span>
                <span><hr class="d-lg-none d-xl-none"></span>
                <a class="navbar-brand menu" href="toko.php" style="color: white;">
                  <li class="nav-item">TOKO OLEH-OLEH</li>
        </a>
                <span><hr class="d-lg-none d-xl-none"></span>
                
              </ul>
            </div>
          </nav>
        </div>
      </div>

 

      <div class="row bg-info text-center text-light pt-2">
        <div class="col mb-2">
          <h5>
            <div id="tgl" class=" p-1 bg-info mb-3"></div>
            <span id="jam" class=" p-1 bg-danger rounded"></span> :
            <span id="menit" class=" p-1 bg-success rounded"></span> :
            <span id="detik" class="p-1 bg-warning rounded"></span>
          </h5>
        </div>

    <script type="text/javascript" language="javascript">
        window.setTimeout("waktu()", 1000);
        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            var jam = tanggal.getHours();
            var menit = tanggal.getMinutes();
            var detik = tanggal.getSeconds();
            var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            if (tanggal.getHours() < 10) {
              jam = '0' + tanggal.getHours();
            }
            if (tanggal.getMinutes() < 10) {
              menit = '0' + tanggal.getMinutes();
            }
            if (tanggal.getSeconds() < 10) {
              detik = '0' + tanggal.getSeconds();
            }
            document.getElementById("tgl").innerHTML = hari[tanggal.getDay()] + ', ' + tanggal.getDate() + ' ' + bulan[tanggal.getMonth()] + ' ' + tanggal.getFullYear();
            document.getElementById("jam").innerHTML = jam;
            document.getElementById("menit").innerHTML = menit;
            document.getElementById("detik").innerHTML = detik;
          

        }
    </script>
      </div>

      <div class="row">
        <div class="col pt-3 isi" style="min-height: 350px;border: 1px solid #DFDFDF;">