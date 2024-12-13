<?php 
  include 'header.php';
  include "config/koneksi.php";
  $arr = array();
  $query = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY nama_toko");

  while($d = mysqli_fetch_array($query)) {

                $id = $d['id_toko'];
                $nama = $d['nama_toko'];
                $idkb = $d['id_kab_kota'];
                $kb = $d['kab_kota'];
                $alm = $d['alamat'];
                $lat = $d['latitude'];
                $lon = $d['longitude'];
                $gbr = $d['gambar'];
    

    $arr[] = [ "id" => $id, "nama" => $nama, "gbr" => $gbr, "kab" => $kb, "alm" => $alm, "latitude" => $lat, "longitude" => $lon];
  }

 ?>

  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/oleh2/Brownte-630x380.jpg" class="img-fluid rounded mx-auto d-block w-100" alt="Chrysanthemum">
      </div>
      <?php 
        $query = mysqli_query($koneksi, "SELECT * FROM oleh_oleh");
        while($data = mysqli_fetch_array($query)) {
        $gb = $data['gambar'];
        if($gb != 'Brownte-630x380.jpg') {
       ?>
      <div class="carousel-item">
        <img src="img/oleh2/<?php echo $gb; ?>" class="img-fluid rounded mx-auto d-block w-100" alt="Chrysanthemum">
      </div>
    <?php }} ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <hr>
  <div class="bg-white p-4">
  <h1 class="text-center">Selamat Datang</h1>
  <p class="text-justify">Sistem Informasi Geografis Toko Oleh-Oleh Khas Sultra adalah website yang menyediakan informasi Oleh-oleh khas Provinsi Sulawesi Tenggara.</p>

  <p class="text-justify">Sistem Informasi Geografis Toko Oleh-Oleh Khas Sultra adalah website yang mengumpulkan dan menyampaikan informasi bagi para pengambil keputusan serta kepada stake holder (orang yang punya kepentingan) dengan toko oleh-oleh. Sistem informasi toko oleh-oleh menggunakan software atau perangkat lunak yang memang dibuat atau diperuntukkan untuk toko oleh-oleh. Dengan adanya sistem informasi untuk toko oleh-oleh tentunya akan memudahkan para pemilik toko oleh-oleh dalam mempromosikan produk oleh-oleh-nya. Baik dalam hal urusan cadangan stok di toko oleh-oleh, harga, dll.</p>

  <hr>

  <div class="row mx-auto justify-content-center">
    <div class="col icon">
      <a href="cari.php">
      <p class="text-center pt-3">
        <img src="img/cari.png"  class="img-responsive w-50 shadow p-1 bg-white rounded-circle" alt="Responsive image"/>
        <h5 class="text-center d-none d-sm-block">Cari Oleh-oleh</h5>
        <h6 class="text-center d-sm-none d-md-none d-lg-none d-xl-none">Cari Oleh-oleh</h6>
      </p>
      </a>
    </div>
    <div class="col icon">
      <a href="oleh-oleh.php">
      <p class="text-center pt-3">
        <img src="img/oleh2.png"  class="img-responsive w-50 shadow p-1 bg-white rounded-circle" alt="Responsive image"/>
        <h5 class="text-center d-none d-sm-block">Daftar Oleh-oleh</h5>
        <h6 class="text-center d-sm-none d-md-none d-lg-none d-xl-none">Daftar Oleh-oleh</h6>
      </p>
    </a>
    </div>
    <div class="col icon">
      <a href="toko.php">
      <p class="text-center pt-3">
        <img src="img/toko.png"  class="img-responsive w-50 shadow bg-white rounded-circle" alt="Responsive image"/>
        <h5 class="text-center d-none d-sm-block">Daftar Toko</h5>
        <h6 class="text-center d-sm-none d-md-none d-lg-none d-xl-none">Daftar Toko</h6>
      </p>
    </a>
    </div>
  </div>
  </div>
  <hr>
  <div class="text-center">

 <div id="map" style="width: 100%; height: 400px"></div>
 <script>

var map = L.map('map').setView([-3.9848754772934067, 122.46700358558459], 7);
var toko = JSON.parse( '<?php echo json_encode($arr) ?>' );

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


   for(var i=0; i<toko.length; i++) {
    var marker = L.marker( [toko[i]['latitude'], toko[i]['longitude']]).addTo(map);
    marker.bindPopup( "<b>" + toko[i]['nama']+"</b><br>Kab/Kota:" + toko[i]['kab'] + "<br />Alamat: " + toko[i]['alm'] + "<br><center><img src='img/toko/" + toko[i]['gbr'] + "' width='300px'></center>");
   }

  

 </script>
  </div>


  <hr>

 <?php 
  include 'footer.php';
 ?>