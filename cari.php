<?php 
	include 'header.php';
	include "config/koneksi.php";

	$arr = array();	
	$kab = '--Semua--';
	$toko = '--Semua--';


		$data2 = mysqli_query($koneksi, "SELECT * FROM kab_kota ORDER BY nama_kab_kota");

		//$data4 = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY nama_toko");


		if (isset($_POST['carikabkota'])) {
			$kab = $_POST['kabkota'];

			if ($kab == '--Semua--') {
				$data4 = mysqli_query($koneksi, "SELECT * FROM toko");

				if (isset($_POST['caritoko'])) {
					$toko = $_POST['toko'];

					if ($toko == '--Semua--') {
						$data3 = mysqli_query($koneksi, "SELECT * FROM toko");
					}
					else {

						$data3 = mysqli_query($koneksi, "SELECT * FROM toko WHERE nama_toko='$toko'");
					}
				}
				else {
					$data3 = mysqli_query($koneksi, "SELECT * FROM toko");
				}

			}
			else {
				$data4 = mysqli_query($koneksi, "SELECT * FROM toko WHERE kab_kota='$kab'");

				if (isset($_POST['caritoko'])) {
					$toko = $_POST['toko'];

					if ($toko == '--Semua--') {
						$data3 = mysqli_query($koneksi, "SELECT * FROM toko");
					}
					else {

						$data3 = mysqli_query($koneksi, "SELECT * FROM toko WHERE nama_toko='$toko'");
					}
				}
				else {
					$data3 = mysqli_query($koneksi, "SELECT * FROM toko WHERE kab_kota='$kab'");
				}
			}

		}
		else {

			
			$data4 = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY nama_toko");

			if (isset($_POST['caritoko'])) {
				$toko = $_POST['toko'];

					if ($toko == '--Semua--') {
						$data3 = mysqli_query($koneksi, "SELECT * FROM toko");
					}
					else {

						$data3 = mysqli_query($koneksi, "SELECT * FROM toko WHERE nama_toko='$toko'");
					}
			}
			else {
				$data3 = mysqli_query($koneksi, "SELECT * FROM toko");
			}
		}

		while ($d3 = mysqli_fetch_array($data3)) {

	        $idtk = $d3['id_toko'];
	        $nama = $d3['nama_toko'];
	        $idkb = $d3['id_kab_kota'];
	        $kb = $d3['kab_kota'];
	        $alm = $d3['alamat'];
	        $lat = $d3['latitude'];
	        $lon = $d3['longitude'];
	        $gbr = $d3['gambar'];


		$arr[] = [ "id" => $idtk, "nama" => $nama, "gbr" => $gbr, "kab" => $kb, "alm" => $alm, "latitude" => $lat, "longitude" => $lon];
	}


 ?>

	<h3 class="text-center">Cari Toko Oleh-Oleh</h3>
	<hr>
	<div class="container mt-4">
		<div class="row justify-content-center">
			<div class="container">
	<table align="center">
		<tr>
		<td>
			<form class="form-inline" method="post" action="">
			  <label class="my-1 mr-2" for="kabkota">Pilih Kab/Kota</label>
		</td>
		<td>
			  <select class="custom-select my-1 mr-sm-2" id="kabkota" name="kabkota">
	  		      <option><?php echo $kab; ?></option>
	  		      
	  		     <?php
				    while ($d2 = mysqli_fetch_array($data2)) {

				       $idkabkota = $d2['id_kab_kota'];
						$namakabkota = $d2['nama_kab_kota'];

						echo '<option >'.$namakabkota.'</option>';
					}
				?>
			  </select>
		</td>
		<td>

			  <button type="submit" name="carikabkota" class="btn btn-primary my-1">Cari</button>
			</form>
		</td>

		</tr>

		<tr>
		<td>
			<form class="form-inline" method="post" action="">
			  <label class="my-1 mr-2" for="toko">Pilih Toko</label>
		</td>
		<td>
			  <select class="custom-select my-1 mr-sm-2" id="toko" name="toko">
	  		      <option><?php echo $toko; ?></option>
	  		      
	  		     <?php
				    while ($d4 = mysqli_fetch_array($data4)) {

				       $idtoko = $d4['id_toko'];
						$namatoko = $d4['nama_toko'];

						echo '<option>'.$namatoko.'</option>';
					}
				?>
			  </select>
		</td>
		<td>

			  <button type="submit" name="caritoko" class="btn btn-info my-1">Cari</button>
			</form>
		</td>
		</tr>
	</table>


		</div>
		<hr>
		</div></div>
		<hr>

<?php 

if ((isset($_POST['caritoko'])) and ($_POST['toko'] != '--Semua--')) {

			$arr_ol = '';

			$data6 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE id_toko='$idtk'");
			while  ($d6 = mysqli_fetch_array($data6)) {
	        	$dx = $d6['nama_oleh2'];

				$arr_ol .= $dx.", ";
			}

			
			$ol = substr($arr_ol, 0,-2);

 ?>

 			<div class="container-fluid">
			<div class="row">
        		<div class="col-md-8 ">
				<div class="table-responsive mx-auto col-lg-9 bg-light py-3 shadow bg-white rounded">
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
					</table>
				</div>
			</div>
		<div class="col">
			<div class="table-responsive mx-auto col-lg-9 bg-light py-3 shadow bg-white rounded">
				

<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
              <div class="panel-heading">
                <h5 class="panel-title"><span class="glyphicon glyphicon-user"></span> Kontak Chat </h5> 
              </div>
              <div class="panel-body">
<center>
<div class="komentar">
<?php

	$data5 = mysqli_query($koneksi, "SELECT * FROM chat WHERE id_toko='$idtk'");
	while  ($d5 = mysqli_fetch_array($data5)) {
	    $nm = $d5['nama'];
	    $email = $d5['email'];
	    $pesan = $d5['pesan'];
	    $waktu = $d5['waktu'];

		$bg = '';
		$hd = '';
		if ($nm == $nama) {
			$bg = 'text-white';
			$hd = 'bg-danger';

		}
		else {
			$bg = 'text-primary';
			$hd = 'bg-light';
		}

?>
<div  class="row <?php echo $hd; ?>">
	<div class="col">
		<p class="text-left ml-1 <?php echo $bg; ?>"><?php echo $nm ; ?></p>
	</div>
	<div class="col">
		<p class="text-right mr-1 "><small><?php echo $waktu; ?></small></p>
	</div>
</div>
<div  class="row">
	<div class="col">
		<p class="text-left ml-1"><?php echo $pesan; ?></p>
	</div>
</div>

<?php
	}

?>

</div>
</center><br/>
<center>
<form id="formku" method="post" action="config/proses.php" onsubmit="return formCheck(this);" >
<table style="font-style: oblique; font-weight: bold;">
<tr>
<td width="150">Nama</td>
<td width="30">:</td>
<td width="550"><input type="text" name="nama" size="30" class="form-control" minlength="3" placeholder="Nama Anda" required />
<input type="hidden" name="toko" value="<?php echo $idx; ?>" />
</td>
</tr>
<tr>
<td width="150">Email</td>
<td width="30">:</td>
<td width="550"><input type="email" name="email" size="30" class="form-control" minlength="3" placeholder="Alamat Email" required-email /></td>
</tr>
<tr>
<td width="150">Komentar</td>
<td width="30">:</td>
<td width="550"><input type="text" name="komentar" size="30" class="form-control" minlength="3" placeholder="Komentar Anda" required /></td>
</tr>
<tr>
<td width="150"></td>
<td width="30"></td>
<td width="550">
<button type="submit" class="btn btn-info btn-sm">Kirim <span class="glyphicon glyphicon-send"></span></button>
<button type="reset" class="btn btn-warning btn-sm">batal <span class="glyphicon glyphicon-refresh"></span></button>
</td>
</tr>
</table>
</form>
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

			    $data7 = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE id_toko='$idtk'");
			    while ($d7 = mysqli_fetch_array($data7)) {

			        $id = $d7['id_oleh2'];
			        $nmol = $d7['nama_oleh2'];
			        $idtoko = $d7['id_toko'];
			        $harga = $d7['harga'];
			        $stok = $d7['stok'];
			        $ket = $d7['ket'];
			        $gbr = $d7['gambar'];

			        $sql1 = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$idtoko'");
			        $q4 = mysqli_fetch_array($sql1);
			        $nmtoko = $q4['nama_toko'];

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
		<?php
				    }
				?>

		<br>
  <div class="text-center">

 <div id="map" style="width: 100%; height: 400px"></div>
 <script>
var toko = JSON.parse( '<?php echo json_encode($arr) ?>' );

var map = L.map('map').setView([-4.486538877135636, 122.49536615318394], 8);

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