<?php 
	include 'header.php';
	include "config/koneksi.php";

	// TAMPIL DATA
	function tampil($koneksi) {

		
	?>


	<h3 class="text-center">DAFTAR OLEH-OLEH KHAS SULAWESI TENGGARA</h3>
	<hr>
	<div class="row justify-content-center">
		<table>
			<tr>
				<td>
					<form class="form-inline" method="post" action="">

					  <select class="custom-select my-1 mr-sm-2" id="urut" name="urut">
			  		      <option>-Urutkan-</option>
			  		      <option>Harga Terendah</option>
			  		      <option>Harga Tertinggi</option>
					  </select>
					  <button type="submit" name="filter" class="btn btn-primary my-1">Urutkan</button>
					</form>
				</td>
				<td> </td>
				<td>
					<form class="form-inline" method="post" action="">
					  <input type="search" class="form-control my-1 mr-sm-2" id="cari" name="cari" placeholder="Cari..">

					  <button type="submit" name="btnCari" class="btn btn-primary my-1">Cari</button>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<form class="form-inline" method="post" action="">
					  <input type="number" min="0" class="form-control my-1 mr-sm-2" id="dari" name="dari" placeholder="Dari Harga..">
					  <input type="number" min="0" class="form-control my-1 mr-sm-2" id="sampai" name="sampai" placeholder="Sampai Harga..">

					  <button type="submit" name="btnFilter" class="btn btn-primary my-1">Filter Harga</button>
					</form>
				</td>
				</td>
			</tr>
		</table>
	</div>
	<hr>


		<div class="container-fluid mt-4">
			<div class="row justify-content-center">
			  
			
		<?php

		if (isset($_POST['btnCari'])) {
			$cari = $_POST['cari'];

			if ((isset($_POST['filter'])) and ($_POST['urut'] != '-Urutkan-')) {
				if ($_POST['urut'] == 'Harga Terendah') {
			    	$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh ORDER BY harga ASC WHERE nama_oleh2 like '%".$cari."%' ");
			    }
			    else {
			    	$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh ORDER BY harga DESC WHERE nama_oleh2 like '%".$cari."%' ");
			    }
			}
			else if (isset($_POST['btnFilter'])) {
				if (($_POST['dari'] != "") AND ($_POST['sampai'] != "")) {
					$dari = $_POST['dari'];
					$sampai = $_POST['sampai'];
					$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE harga BETWEEN $dari AND $sampai ORDER BY harga ASC");
					}
				else {
					$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh");
				}
			}
			else {
				$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE nama_oleh2 like '%".$cari."%'");
			}

		}
		else {			
			if ((isset($_POST['filter'])) and ($_POST['urut'] != '-Urutkan-')) {
				if ($_POST['urut'] == 'Harga Terendah') {
			    	$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh ORDER BY harga ASC");
			    }
			    else {
			    	$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh ORDER BY harga DESC");
			    }
			}
			else if (isset($_POST['btnFilter'])) {
				if (($_POST['dari'] != "") AND ($_POST['sampai'] != "")) {
					$dari = $_POST['dari'];
					$sampai = $_POST['sampai'];
					$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE harga BETWEEN $dari AND $sampai ORDER BY harga ASC");
					}
				else {
					$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh");
				}
			}
			else {
				$data2 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh");
			}
		}

			    while ($d = mysqli_fetch_array($data2)) {

			        $id = $d['id_oleh2'];
			        $nama = $d['nama_oleh2'];
			        $idtoko = $d['id_toko'];
			        $harga = $d['harga'];
			        $stok = $d['stok'];
			        $ket = $d['ket'];
			        $gbr = $d['gambar'];

			        

			        $sql1 = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$idtoko'");
			        $d2 = mysqli_fetch_array($sql1);
			        $nmtoko = $d2['nama_toko'];


			?>
			<div class="card-deck col-auto-mb-3 m-2 shadow p-1 bg-white rounded">
				<div class="card  my-3" style="width: 12rem;">
					<a href="oleh-oleh.php?aksi=detail&id=<?php echo $id ?>&tk=<?php echo $idtoko ?>" style="text-decoration: none;">
				    <img src="img/oleh2/<?php echo $gbr; ?>" class="card-img-top " width="150" height="150" alt="..."></a>
				    <div class="card-body">
				      <a href="oleh-oleh.php?aksi=detail&id=<?php echo $id ?>&tk=<?php echo $idtoko ?>" style="text-decoration: none; color: #A50973"><p class="card-title text-center text-uppercase"><strong><?php  echo $nama; ?></strong></p></a>
				    </div>
				    <a href="toko.php?aksi=detail&id=<?php echo $idtoko ?>" class="" style="text-decoration: none; background: white; color:black;">
					    <div class="card-footer text-center p-1">
					      <p class="text-center m-0 text-uppercase"><?php echo $nmtoko; ?></p>
					    </div>
				    </a>
					<div class="card-footer text-center p-1 bg-info text-light">
					    <p class="text-center m-0"><strong>Rp. <?php echo $harga; ?></strong></p>
					</div>
				    <a href="oleh-oleh.php?aksi=detail&id=<?php echo $id ?>&tk=<?php echo $idtoko ?>" class="" style="text-decoration: none; background: #A50973; color:white;">
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

			$sql1 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE id_oleh2='$idx'");
			$d = mysqli_fetch_array($sql1);
			$id = $d['id_oleh2'];
	        $nama = $d['nama_oleh2'];
	        $idtoko = $d['id_toko'];
	        $harga = $d['harga'];
	        $stok = $d['stok'];
	        $ket = $d['ket'];
	        $gbr = $d['gambar'];

	        $arr = array();

		    $data2 = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$idtoko'");
		    $data1 = mysqli_fetch_array($data2);
		    $idtoko = $data1['id_toko'];
		    $nmtoko = $data1['nama_toko'];
			$idkb = $data1['id_kab_kota'];
			$kb = $data1['kab_kota'];
			$alm = $data1['alamat'];
			$lat = $data1['latitude'];
			$lon = $data1['longitude'];
			$gbrtk = $data1['gambar'];
			$hp = $data1['hp'];
			$hpp = substr($hp, 1);
			$arr[] = [ "id" => $idtoko, "nama" => $nmtoko, "gbr" => $gbrtk, "kab" => $kb, "alm" => $alm, "latitude" => $lat, "longitude" => $lon];

				        

		?>






			<button type="button" class="btn btn-danger mt-2" onclick="javascript:history.back()"><span ></span> &laquo; Kembali</button>

<?php 
// function getJarak($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Mi') 
// { 
// 	$theta = $longitude1 - $longitude2; 
// 	$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
// 	$distance = acos($distance); 
// 	$distance = rad2deg($distance); 
// 	$distance = $distance * 60 * 1.1515; 
// 	switch($unit) 
// 	{ 
// 		case 'Mi': break; 
// 		case 'Km' : $distance = $distance * 1.609344; 
// 	} 
// 	return (round($distance,2)); 
// }
 ?>
			
			<hr>
			<div class="container-fluid">
			<div class="row">
        		<div class="col-md-8 ">
				<div class="table-responsive mx-auto col bg-light py-3 shadow bg-white rounded">
					<h5 class="text-center"><?php echo $nama; ?></h5>
					<table class="table w-100 mx-auto table-striped table-sm table-hover">
						<tr>
							<td colspan="3" class="text-center"><img src="img/oleh2/<?php echo $gbr ?>" class="img-thumbnail w-75"></td>
						</tr>
						<tr>
							<td width="95">Toko</td>
							<td>:</td>
							<td><?php echo $nmtoko ?></td>
						</tr>
						<tr>
							<td width="95">Alamat</td>
							<td>:</td>
							<td><?php echo $alm ?></td>
						</tr>
						<tr>
							<td width="95">Kab/Kota</td>
							<td>:</td>
							<td><?php echo $kb ?></td>
						</tr>
						<tr>
							<td width="95">Harga</td>
							<td>:</td>
							<td>Rp. <?php echo $harga ?></td>
						</tr>
						<tr>
							<td width="95">Stok</td>
							<td>:</td>
							<td><?php echo $stok ?></td>
						</tr>
						<tr>
							<td width="95">Jarak</td>
							<td>:</td>
							<td><span  id="tampilkan"></span> km
							<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry"></script>

<script>

function getLocation() {
    if (window.navigator.geolocation) {
        window.navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Yah browsernya ngga support Geolocation!");
    }
}

 			function showPosition(position) {
                var lat1 = position.coords.latitude;
                var lon1 = position.coords.longitude;

                //lokasi pertama
				// var posisi_1 = new google.maps.LatLng(lat1, lon1);

				var toko2 = JSON.parse( '<?php echo json_encode($arr) ?>' );

				var lat2  = toko[0]['latitude'];
				var lon2 = toko[0]['longitude'];

				//lokasi kedua
				// var posisi_2 = new google.maps.LatLng(lat2, lon2);

				// document.getElementById("tampilkan").innerHTML = hitungJarak(posisi_1, posisi_2);


				// function hitungJarak(posisi_1, posisi_2) {
				//   return (google.maps.geometry.spherical.computeDistanceBetween(posisi_1, posisi_2) / 1000).toFixed(2);
				// } 

			  var p = 0.017453292519943295;    //This is  Math.PI / 180
			  var c = Math.cos;
			  var a = 0.5 - c((lat2 - lat1) * p)/2 + 
			          c(lat1 * p) * c(lat2 * p) * 
			          (1 - c((lon2 - lon1) * p))/2;
			  var R = 6371; //  Earth distance in km so it will return the distance in km
			  var dist = (2 * R * Math.asin(Math.sqrt(a))); 
			  dist = dist.toFixed(2);
			 document.getElementById("tampilkan").innerHTML = dist;

			}
 
		 function showError(error) {
		    switch(error.code) {
		        case error.PERMISSION_DENIED:
		            view.innerHTML = "Deteksi lokasi tidak diijinkan"
		            break;
		        case error.POSITION_UNAVAILABLE:
		            view.innerHTML = "Info lokasimu tidak bisa ditemukan"
		            break;
		        case error.TIMEOUT:
		            view.innerHTML = "Request timeout"
		            break;
		        case error.UNKNOWN_ERROR:
		            view.innerHTML = "An unknown error occurred."
		            break;
		    }
		 }

</script>
							</td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td><?php echo $ket ?></td>
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
		<div class="table-responsive mx-auto col bg-light py-3 shadow bg-white rounded">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
			            <div class="panel-heading bg-danger text-light p-2">
                			<h5 class="panel-title"><span class="glyphicon glyphicon-user"></span>Chat Via Whatsapp</h5> 
              			</div>
              			<div class="panel-body">
							<center>
							<a href="https://api.whatsapp.com/send?phone=62<?php echo $hpp; ?>" target="_blank"><img src="img/wa.png" width="100%"></a>
							</center>
						</div>
					</div>
				</div>
			</div><br>        				 

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div></div>
	<hr>

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