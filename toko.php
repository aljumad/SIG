<?php 
	include 'header.php';
	include "config/koneksi.php";

	// TAMPIL DATA
	function tampil($koneksi) {
		$query = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY nama_toko");
	?>

		<h3 class="text-center">DAFTAR TOKO OLEH-OLEH KHAS SULAWESI TENGGARA</h3>
		<hr>
		<div class="container-fluid mt-4">
			<div class="row justify-content-center">
			  
			
				<?php

				    while ($d = mysqli_fetch_array($query)) {

				        $id = $d['id_toko'];
				        $nama = $d['nama_toko'];
				        $idkb = $d['id_kab_kota'];
				        $kb = $d['kab_kota'];
				        $alm = $d['alamat'];
				        $lat = $d['latitude'];
				        $lon = $d['longitude'];
				        $gbr = $d['gambar'];
				        $hp = $d['hp'];
				?>
			<div class="card-deck col-auto-mb-3 m-2 shadow p-1 bg-white rounded">
				<div class="card  my-3" style="width: 12rem;">
					<a href="toko.php?aksi=detail&id=<?php echo $id ?>" style="text-decoration: none;">
				    <img src="img/toko/<?php echo $gbr; ?>" class="card-img-top " width="150" height="150" alt="..."></a>
				    <div class="card-body">
				      <a href="toko.php?aksi=detail&id=<?php echo $id ?>" style="text-decoration: none; color: #A50973"><p class="card-title text-center text-uppercase"><strong><?php  echo $nama; ?></strong></p></a>
				    </div>
				    <a href="toko.php?aksi=detail&id=<?php echo $id ?>" class="" style="text-decoration: none; background: #A50973; color:white;">
					    <div class="card-footer text-center p-1">
					      <p class="text-center m-0"><strong>DETAIL</strong></p>
					    </div>
				    </a>
			    	</div>
			  </div>
		
				           	
				<?php
				    }
				?>

			</div>
		</div>
		<hr>
		
<?php
	}

	// DETAIL DATA
	function detail($koneksi) {
		if(isset($_GET['id'])) {
			$idx = $_GET['id'];
			$arr = array();

			$data = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$idx'");
			$d = mysqli_fetch_array($data);

	        $nama = $d['nama_toko'];
	        $idkb = $d['id_kab_kota'];
	        $kb = $d['kab_kota'];
	        $alm = $d['alamat'];
	        $lat = $d['latitude'];
	        $lon = $d['longitude'];
	        $gbr = $d['gambar'];
	        $hp = $d['hp'];

	        $hpp = substr($hp, 1);

	        $arr_ol = '';

	        
	        $arr[] = [ "id" => $idx, "nama" => $nama, "gbr" => $gbr, "kab" => $kb, "alm" => $alm, "latitude" => $lat, "longitude" => $lon];

	        $data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE id_toko='$idx'");
			while  ($d2 = mysqli_fetch_array($data2)) {
	        	$dx = $d2['nama_oleh2'];

				$arr_ol .= $dx.", ";
			}

			
			$ol = substr($arr_ol, 0,-2);

		?>
			<button type="button" class="btn btn-danger mt-2" onclick="javascript:history.back()"><span ></span> &laquo; Kembali</button>
			<h3 class="text-center">DETAIL TOKO</h3>
			<hr>
			<div class="container-fluid">
			<div class="row">
        		<div class="col-md-8 ">
				<div class="table-responsive mx-auto col bg-light py-3 shadow bg-white rounded">
					<table class="table w-100 mx-auto table-striped table-sm table-hover">
						<tr>
							<td colspan="3" class="text-center"><img src="img/toko/<?php echo $gbr ?>" class="img-thumbnail w-50"></td>
						</tr>
						<tr>
							<td width="95">Nama Toko</td>
							<td>:</td>
							<td><?php echo $nama ?></td>
						</tr>
						<tr>
							<td>Oleh-Oleh</td>
							<td>:</td>
							<td><?php echo $ol ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $alm ?></td>
						</tr>
						<tr>
							<td>Kab/Kota</td>
							<td>:</td>
							<td><?php echo $kb ?></td>
						</tr>
						<tr>
							<td>No. HP/WA</td>
							<td>:</td>
							<td><?php echo $hp ?></td>
						</tr>
					</table>
				</div>
			</div>
		<div class="col">
			<div class="table-responsive mx-auto col-lg-9 bg-light py-3 shadow bg-white rounded">
				

<div class="row">
<div class="col">
<div class="panel panel-success">
              <div class="panel-heading">
                <h5 class="panel-title"><span class="glyphicon glyphicon-user"></span>Chat Via Whatsapp</h5> 
              </div>
              <div class="panel-body">
<center>
<a href="https://api.whatsapp.com/send?phone=62<?php echo $hpp; ?>" target="_blank"><img src="img/wa.png" width="100%"></a>
</center>
</div>
</div></div></div>

			</div>
		</div>
	</div>
	<hr>

		<div class="row">
        		<div class="col ">

					<h3 class="text-center">KATALOG</h3>



		<div class="container-fluid mt-4">
			<div class="row justify-content-center">
			  
			
			<?php

			    $data3 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE id_toko='$idx'");
			    while ($d3 = mysqli_fetch_array($data3)) {

			        $id = $d3['id_oleh2'];
			        $nmol = $d3['nama_oleh2'];
			        $idtoko = $d3['id_toko'];
			        $harga = $d3['harga'];
			        $stok = $d3['stok'];
			        $ket = $d3['ket'];
			        $gbr = $d3['gambar'];

			        $sql1 = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$idtoko'");
			        $d4 = mysqli_fetch_array($sql1);
			        $nmtoko = $d4['nama_toko'];

			?>
			<div class="card-deck col-auto-mb-3 m-2 shadow p-1 bg-white rounded">
				<div class="card  my-3" style="width: 12rem;">
					<a href="oleh-oleh.php?aksi=detail&id=<?php echo $id ?>&tk=<?php echo $idtoko ?>" style="text-decoration: none;">
				    <img src="img/oleh2/<?php echo $gbr; ?>" class="card-img-top " width="150" height="150" alt="..."></a>
				    <div class="card-body">
				      <a href="oleh-oleh.php?aksi=detail&id=<?php echo $id ?>&tk=<?php echo $idtoko ?>" style="text-decoration: none; color: #A50973"><p class="card-title text-center text-uppercase"><strong><?php  echo $nmol; ?></strong></p></a>
				    </div>
				    <a href="toko.php?aksi=detail&id=<?php echo $_ ?>" class="" style="text-decoration: none; background: white; color:black;">
					    <div class="card-footer text-center p-1">
					      <p class="text-center m-0 ">Stok : <?php echo $stok; ?></p>
					    </div>
				    </a>
					<div class="card-footer text-center p-1">
					    <p class="text-center m-0"><strong>Rp. <?php echo $harga; ?></strong></p>
					</div>
				    <a href="oleh-oleh.php?aksi=detail&id=<?php echo $id ?>" class="" style="text-decoration: none; background: #A50973; color:white;">
					    <div class="card-footer text-center p-1">
					      <p class="text-center m-0"><strong>DETAIL</strong></p>
					    </div>
				    </a>
			    	</div>
			  </div>
		
				           	
				<?php
				    }
				?>

			</div>
		</div><hr>

  <div class="text-center">

 <div id="map" style="width: 100%; height: 400px"></div>
 <script>
var toko = JSON.parse( '<?php echo json_encode($arr) ?>' );

var map = L.map('map').setView([toko[0]['latitude'], toko[0]['longitude']], 15);

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
		}
	} 


	// PROGRAM UTAMA
	if(isset($_GET['aksi'])) {
		switch($_GET['aksi']) {
			case 'tampil':
				tampil($koneksi);
				break;
			case 'detail':
				detail($koneksi);
				break;
			default:
				echo "<h3 class='text-center text-light bg-danger'>Aksi <i>".$_GET['aksi']."</i> tidak ada!</h3>";
				tampil($koneksi);
		}
	}
	else {
		tampil($koneksi);
	}


	include 'footer.php';
 ?>