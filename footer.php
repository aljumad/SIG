        </div>
      </div>

<?php
 // skrip koneksi database
include 'config/koneksi.php';
 
 $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
 $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
 $waktu   = time(); //
  
 // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
 $s = mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE ip='$ip' AND tanggal='$tanggal'");
 
 // Kalau belum ada, simpan data user tersebut ke database
 if(mysqli_num_rows($s) == 0){
     mysqli_query($koneksi, "INSERT INTO pengunjung(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
 }
 // Jika sudah ada, update
 else{
     mysqli_query($koneksi, "UPDATE pengunjung SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
 }

 $tayanghari = mysqli_query($koneksi, "SELECT SUM(hits) AS th FROM pengunjung WHERE tanggal='$tanggal'");
 $th = mysqli_fetch_array($tayanghari);
 $tayanganperhari = $th['th'];

 $tayangtot = mysqli_query($koneksi, "SELECT SUM(hits) AS ttot FROM pengunjung");
 $ttot = mysqli_fetch_array($tayangtot);
 $totaltayangan = $ttot['ttot'];
 
 $pengunjung       = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE tanggal='$tanggal' GROUP BY ip")); // Hitung jumlah pengunjung
 $query22        = mysqli_query($koneksi, "SELECT COUNT(hits) as total FROM pengunjung");
 $hasil2        = mysqli_fetch_array($query22);
 $totalpengunjung  =  $hasil2['total']; // hitung total pengunjung
 $bataswaktu       = time() - 300;
 $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE online > '$bataswaktu'")); // hitung pengunjung online
 ?> 

      <div class="row text-light p-3" style="background: navy">
        <div class="col">
          
          <table align="center" class="p-2">
            <tr>
              <td>Pengunjung Hari ini</td>
              <td>:</td>
              <td><?php echo $pengunjung; ?></td>
           </tr>
           <tr>
              <td>Total Pengunjung</td>
              <td>:</td>
              <td><?php echo $totalpengunjung; ?></td>
           </tr>
           <tr>
              <td>View Hari ini</td>
              <td>:</td>
              <td><?php echo $tayanganperhari; ?></td>
           </tr>
           <tr>
              <td>Total View</td>
              <td>:</td>
              <td><?php echo $totaltayangan; ?></td>
           </tr>
           <tr>
              <td>Pengunjung Online</td>
              <td>:</td>
              <td><?php echo $pengunjungonline; ?></td>
           </tr>
           </table>
         
        </div>
      </div>
      <div class="row text-light text-center p-3" style="background: #ff00ad">
        <div class="col">
          <b>STMIK CATUR SAKTI KENDARI</b>
        </div>
      </div>

      <div class="row text-light text-center p-2" style="background: #A50973">
        <div class="col">
          &copy; 2020
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="leaflet/leaflet.js"></script>
  </body>
</html>