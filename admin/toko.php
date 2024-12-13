<?php 
	include 'header.php';
	include "../config/koneksi.php";

	if($ambil2 == 'Administrator') {

	// TAMBAH DATA
	function tambah($koneksi) {
		if(isset($_POST['simpan'])) {
			$toko = $_POST['toko'];
			$alamat = $_POST['alamat'];
			$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude'];
			$hp = $_POST['hp'];
			$gambar = $_FILES['gambar']['name'];

			$strkabkota = $_POST['kabkota'];

			$arr_kabkota = explode ("|",$strkabkota);

			$idkabkota = '';
			$kabkota = '';
			$idkabkota .= $arr_kabkota[0];
			$kabkota .= $arr_kabkota[1];

			$simpan = mysqli_query($koneksi, "INSERT INTO toko VALUES ('', '$idkabkota', '$toko', '$alamat', '$kabkota', '$latitude', '$longitude', '$gambar', '$hp' )");
			move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/toko/".$gambar);

			$user = 'admin';
			$pass = md5('123');

			mysqli_query($koneksi, "INSERT INTO admin VALUES ('', '$user','$pass', '$toko' )");

			if($simpan && isset($_GET['aksi'])) {
				if($_GET['aksi'] == 'tambah') {
					echo "<script>alert('Data Tersimpan!');document.location.href='toko.php';</script>";
				}
			}
		}

		$data2 = mysqli_query($koneksi, "SELECT * FROM kab_kota ORDER BY nama_kab_kota");

	?>

		<h3 class="text-center">TAMBAH TOKO</h3>
		<hr>
		<div class="container">
				<form class="user pt-3" method="post" enctype="multipart/form-data" action="">
			      <div class="form-group row">
			        <label for="toko" class="col-sm-4 col-form-label">Nama Toko</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="toko" required="" id="toko">
			        </div>
			      </div>
			      
			      <div class="form-group row">
			        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
			        <div class="col-sm">
			          <textarea class="form-control" name="alamat" required="" id="alamat" rows="3"></textarea>
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="kabkota" class="col-sm-4 col-form-label">Kab/Kota</label>
			        <div class="col-sm">
			          <select class="custom-select form-control" name="kabkota" id="kabkota">
			  		      <option>--Pilih Kab/Kota--</option>
			  		      
			  		     <?php
						    while ($d2 = mysqli_fetch_array($data2)) {

						        $idkabkota = $d2['id_kab_kota'];
								$namakabkota = $d2['nama_kab_kota'];

								echo '<option value="'.$idkabkota.'|'.$namakabkota.'">'.$namakabkota.'</option>';
							}
						?>

					  </select>
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="latitude" class="col-sm-4 col-form-label">Latitude</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="latitude" required="" id="latitude">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="longitude" class="col-sm-4 col-form-label">Longitude</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="longitude" required="" id="longitude">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="hp" class="col-sm-4 col-form-label">No. HP/WA</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="hp" required="" id="hp">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
			        <div class="col-sm">
			          <input type="file" class="form-control-file" name="gambar" required="" id="gambar">
			        </div>
			      </div>
			      <button type="submit" id="simpan" name="simpan" class="btn btn-primary btn-user btn-block p-2 kirim">
			        S I M P A N
			      </button>
			      <h5 class="text-center text-success"><?php echo isset($pesan) ? $pesan : "" ?></h5>
			    </form>
		</div>
		<hr>

<?php
	}

	// TAMPIL DATA
	function tampil($koneksi) {
		$query = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY kab_kota");
	?>

		<h3 class="text-center">DATA TOKO</h3>
		<hr>
		<div class="container">

			<div class="row mx-auto pl-2">
				<div class="table-responsive">
					<a href="toko.php?aksi=tambah" class="btn btn-success mb-3">+ TAMBAH DATA</a>
					<table class="table w-100 table-striped table-sm table-hover">
						<thead>
						   	<tr>
						      	<th scope="col" class="text-center">NO</th>
						      	<th scope="col" class="text-center">TOKO</th>
						      	<th scope="col" class="text-center">KAB/KOTA</th>
						      	<th scope="col" class="text-center">ALAMAT</th>
						      	<th scope="col" class="text-center" colspan="3">AKSI</th>
						    </tr>
						</thead>
						<tbody>

				<?php
				    $no = 1;

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
				           	<tr>
					            <td class="text-center"><?php echo $no++; ?></td>
					            <td><?php echo $nama; ?></td>
					            <td><?php echo $kb; ?></td>
					            <td><?php echo $alm; ?></td>
					            <td class="text-right">
					            	<a href="toko.php?aksi=detail&id=<?php echo $id ?>" class="btn btn-info">DETAIL</a>
					            </td>
					            <td class="text-center">
					            	<a href="toko.php?aksi=edit&id=<?php echo $id; ?>&nama=<?php echo $nama; ?>&idkb=<?php echo $idkb; ?>&kb=<?php echo $kb; ?>&alm=<?php echo $alm; ?>&lat=<?php echo $lat; ?>&lon=<?php echo $lon; ?>&gbr=<?php echo $gbr; ?>&hp=<?php echo $hp; ?>" class="btn btn-warning">EDIT</a>
					            </td>
					            <td class="text-left">
					            	<a href="toko.php?aksi=hapus&id=<?php echo $id ?>" class="btn btn-danger" onclick="alert('Yakin Hapus??')">HAPUS</a>
					            </td>
					        </tr>
				<?php
				    }
				?>

				        </tbody>
					</table>
				</div>
			</div>
		</div>
		<hr>
		
<?php
	}

	// EDIT DATA
	function edit($koneksi) {
		if(isset($_POST['edit'])) {
			$id = $_POST['id'];
			$nmtoko = $_POST['nmtoko'];
			$toko = $_POST['toko'];
			$alamat = $_POST['alamat'];
			$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude'];
			$hp = $_POST['hp'];
			$gambar = $_FILES['gambar']['name'];

			$strkabkota = $_POST['kabkota'];

			$arr_kabkota = explode ("|",$strkabkota);

			$idkabkota = '';
			$kabkota = '';
			$idkabkota .= $arr_kabkota[0];
			$kabkota .= $arr_kabkota[1];

			if(!empty($gambar)) {
				$sql = mysqli_query($koneksi, "UPDATE toko SET id_kab_kota='$idkabkota', nama_toko='$toko', alamat='$alamat', kab_kota='$kabkota', latitude='$latitude', longitude='$longitude', gambar='$gambar', hp='$hp' WHERE id_toko='$id'");
				move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/toko/".$gambar);

				mysqli_query($koneksi, "UPDATE admin SET hak_akses='$toko' WHERE hak_akses='$nmtoko'");

				if($sql && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'edit') {
						echo "<script>alert('Data Diubah!');document.location.href='toko.php';</script>";
					}
				}
			}
			else {
				$sql = mysqli_query($koneksi, "UPDATE toko SET id_kab_kota='$idkabkota', nama_toko='$toko', alamat='$alamat', kab_kota='$kabkota', latitude='$latitude', longitude='$longitude', hp='$hp' WHERE id_toko='$id'");

				mysqli_query($koneksi, "UPDATE admin SET hak_akses='$toko' WHERE hak_akses='$nmtoko'");

				if($sql && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'edit') {
						echo "<script>alert('Data Diubah!');document.location.href='toko.php';</script>";
					}
				}
			}
		}

		if(isset($_GET['id'])) {

			$data2 = mysqli_query($koneksi, "SELECT * FROM kab_kota ORDER BY nama_kab_kota");

		?>

			<h3 class="text-center">EDIT TOKO</h3>
			<hr>
			<div class="container">
				<form class="user pt-3" method="post" enctype="multipart/form-data" action="">
			      <div class="form-group row">
			        <label for="toko" class="col-sm-4 col-form-label">Nama Toko</label>
			        <div class="col-sm">
			        	<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
			        	<input type="hidden" name="nmtoko" id="nmtoko" value="<?php echo $_GET['nama']; ?>">
			          	<input type="text" class="form-control" name="toko" required="" id="toko" value="<?php echo $_GET['nama']; ?>">
			        </div>
			      </div>
			      
			      <div class="form-group row">
			        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
			        <div class="col-sm">
			          <textarea class="form-control" name="alamat" required="" id="alamat" rows="3"><?php echo $_GET['alm']; ?></textarea>
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="kabkota" class="col-sm-4 col-form-label">Kab/Kota</label>
			        <div class="col-sm">
			          <select class="custom-select form-control" name="kabkota" id="kabkota" >
			  		      <option selected="selected" hidden="hidden" value="<?php echo $_GET['idkb']; ?>|<?php echo $_GET['kb']; ?>"><?php echo $_GET['kb']; ?></option>
			  		      
			  		     <?php
						    while ($d2 = mysqli_fetch_array($data2)) {

						        $idkabkota = $d2['id_kab_kota'];
								$namakabkota = $d2['nama_kab_kota'];

								echo '<option value="'.$idkabkota.'|'.$namakabkota.'">'.$namakabkota.'</option>';
							}
						?>

					  </select>
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="latitude" class="col-sm-4 col-form-label">Latitude</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="latitude" required="" id="latitude" value="<?php echo $_GET['lat']; ?>">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="longitude" class="col-sm-4 col-form-label">Longitude</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="longitude" required="" id="longitude" value="<?php echo $_GET['lon']; ?>">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="hp" class="col-sm-4 col-form-label">No. HP/WA</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="hp" required="" id="hp" value="<?php echo $_GET['hp']; ?>">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
			        <div class="col-sm">
			          <input type="file" class="form-control-file" name="gambar" id="gambar"><img src="../img/toko/<?php echo $_GET['gbr']; ?>" class="img-thumbnail w-50">
			        </div>
			      </div>
			      <button type="submit" id="edit" name="edit" class="btn btn-primary btn-user btn-block p-2 kirim">
			        E D I T
			      </button>
			      <h5 class="text-center text-success"><?php echo isset($pesan) ? $pesan : "" ?></h5>
			    </form>
		</div>
		<hr>

	<?php	
	
		}
	} 


	// DETAIL DATA
	function detail($koneksi) {
		if(isset($_GET['id'])) {
			$idx = $_GET['id'];

			$data = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$idx'");
			$d = mysqli_fetch_array($data);

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
			<a href="toko.php" class="btn btn-primary mt-2">&laquo; Kembali</a>
			<h3 class="text-center">DETAIL TOKO</h3>
			<hr>
			<div class="container">

				<p class="text-center"><img src="../img/toko/<?php echo $gbr ?>" class="img-thumbnail w-50"></p>
				<div class="table-responsive mx-auto col-lg-9">
					<table class="table w-100 mx-auto table-striped table-sm table-hover">
						<tr>
							<td width="95">Nama Toko</td>
							<td>:</td>
							<td><?php echo $nama ?></td>
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
							<td>Latitude</td>
							<td>:</td>
							<td><?php echo $lat ?></td>
						</tr>
						<tr>
							<td>Longitude</td>
							<td>:</td>
							<td><?php echo $lon ?></td>
						</tr>
						<tr>
							<td>No. HP/WA</td>
							<td>:</td>
							<td><?php echo $hp ?></td>
						</tr>
					</table>
				</div>
		</div>
		<hr>

	<?php	
		}
	} 

	// HAPUS DATA
	function hapus($koneksi) {
		if(isset($_GET['id']) && isset($_GET['aksi'])) {
			$id = $_GET['id'];
			$data = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id'");
			$d = mysqli_fetch_array($data);
			$toko = $d['nama_toko'];
			mysqli_query($koneksi, "DELETE FROM admin WHERE hak_akses='$toko'");

			$hapus = mysqli_query($koneksi, "DELETE FROM toko WHERE id_toko='$id'");

			if($hapus) {
				if($_GET['aksi'] == 'hapus') {
					echo "<script>document.location.href='toko.php';</script>";
				}
			}
		}
	}

	// PROGRAM UTAMA
	if(isset($_GET['aksi'])) {
		switch($_GET['aksi']) {
			case 'tambah':
				tambah($koneksi);
				break;
			case 'tampil':
				tampil($koneksi);
				break;
			case 'edit':
				edit($koneksi);
				break;
			case 'detail':
				detail($koneksi);
				break;
			case 'hapus':
				hapus($koneksi);
				break;
			default:
				echo "<h3 class='text-center text-light bg-danger'>Aksi <i>".$_GET['aksi']."</i> tidak ada!</h3>";
				tampil($koneksi);
		}
	}
	else {
		tampil($koneksi);
	}

	}
	else {


	// TAMPIL TOKO
	function tampil($koneksi) {

	$idadmin = $_SESSION['user'];
    

    $adminn = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$idadmin'");

    $dadminn = mysqli_fetch_array($adminn);
    $nmadmin = $dadminn['hak_akses'];


			$data = mysqli_query($koneksi, "SELECT * FROM toko WHERE nama_toko='$nmadmin'");
			$d = mysqli_fetch_array($data);

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
			<a href="toko.php" class="btn btn-primary mt-2">&laquo; Kembali</a>
			<h3 class="text-center">DATA TOKO</h3>
			<hr>
			<div class="container">

				<p class="text-center"><img src="../img/toko/<?php echo $gbr ?>" class="img-thumbnail w-50"></p>
				<div class="table-responsive mx-auto col-lg-9">
					<table class="table w-100 mx-auto table-striped table-sm table-hover">
						<tr>
							<td width="95">Nama Toko</td>
							<td>:</td>
							<td><?php echo $nama ?></td>
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
							<td>Latitude</td>
							<td>:</td>
							<td><?php echo $lat ?></td>
						</tr>
						<tr>
							<td>Longitude</td>
							<td>:</td>
							<td><?php echo $lon ?></td>
						</tr>
						<tr>
							<td>No. HP/WA</td>
							<td>:</td>
							<td><?php echo $hp ?></td>
						</tr>
					</table>

					<a href="toko.php?aksi=edit&id=<?php echo $id; ?>&nama=<?php echo $nama; ?>&idkb=<?php echo $idkb; ?>&kb=<?php echo $kb; ?>&alm=<?php echo $alm; ?>&lat=<?php echo $lat; ?>&lon=<?php echo $lon; ?>&gbr=<?php echo $gbr; ?>&hp=<?php echo $hp; ?>" class="btn btn-info">EDIT</a>
				</div>
		</div>
		<hr>

	<?php
		} 

	// EDIT DATA
	function edit($koneksi) {
		if(isset($_POST['edit'])) {
			$id = $_POST['id'];
			$alamat = $_POST['alamat'];
			$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude'];
			$hp = $_POST['hp'];
			$gambar = $_FILES['gambar']['name'];

			$strkabkota = $_POST['kabkota'];

			$arr_kabkota = explode ("|",$strkabkota);

			$idkabkota = '';
			$kabkota = '';
			$idkabkota .= $arr_kabkota[0];
			$kabkota .= $arr_kabkota[1];

			if(!empty($gambar)) {
				$sql = mysqli_query($koneksi, "UPDATE toko SET id_kab_kota='$idkabkota', alamat='$alamat', kab_kota='$kabkota', latitude='$latitude', longitude='$longitude', gambar='$gambar', hp='$hp' WHERE id_toko='$id'");
				move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/toko/".$gambar);

				if($sql && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'edit') {
						echo "<script>alert('Data Diubah!');document.location.href='toko.php';</script>";
					}
				}
			}
			else {
				$sql = mysqli_query($koneksi, "UPDATE toko SET id_kab_kota='$idkabkota', alamat='$alamat', kab_kota='$kabkota', latitude='$latitude', longitude='$longitude', hp='$hp' WHERE id_toko='$id'");

				if($sql && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'edit') {
						echo "<script>alert('Data Diubah!');document.location.href='toko.php';</script>";
					}
				}
			}
		}

		if(isset($_GET['id'])) {

			$data2 = mysqli_query($koneksi, "SELECT * FROM kab_kota ORDER BY nama_kab_kota");

		?>

			<h3 class="text-center"><?php echo $_GET['nama']; ?></h3>
			<hr>
			<div class="container">
				<form class="user pt-3" method="post" enctype="multipart/form-data" action="">
			      
			      <div class="form-group row">
			        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
			        <div class="col-sm">
			        	<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
			          <textarea class="form-control" name="alamat" required="" id="alamat" rows="3"><?php echo $_GET['alm']; ?></textarea>
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="kabkota" class="col-sm-4 col-form-label">Kab/Kota</label>
			        <div class="col-sm">
			          <select class="custom-select form-control" name="kabkota" id="kabkota" >
			  		      <option selected="selected" hidden="hidden" value="<?php echo $_GET['idkb']; ?>|<?php echo $_GET['kb']; ?>"><?php echo $_GET['kb']; ?></option>
			  		      
			  		     <?php
						    while ($d2 = mysqli_fetch_array($data2)) {

						        $idkabkota = $d2['id_kab_kota'];
								$namakabkota = $d2['nama_kab_kota'];

								echo '<option value="'.$idkabkota.'|'.$namakabkota.'">'.$namakabkota.'</option>';
							}
						?>

					  </select>
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="latitude" class="col-sm-4 col-form-label">Latitude</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="latitude" required="" id="latitude" value="<?php echo $_GET['lat']; ?>">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="longitude" class="col-sm-4 col-form-label">Longitude</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="longitude" required="" id="longitude" value="<?php echo $_GET['lon']; ?>">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="hp" class="col-sm-4 col-form-label">No. HP/WA</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="hp" required="" id="hp" value="<?php echo $_GET['hp']; ?>">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
			        <div class="col-sm">
			          <input type="file" class="form-control-file" name="gambar" id="gambar"><img src="../img/toko/<?php echo $_GET['gbr']; ?>" class="img-thumbnail w-50">
			        </div>
			      </div>
			      <button type="submit" id="edit" name="edit" class="btn btn-primary btn-user btn-block p-2 kirim">
			        E D I T
			      </button>
			    </form>
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
			case 'edit':
				edit($koneksi);
				break;
			default:
				echo "<h3 class='text-center text-light bg-danger'>Aksi <i>".$_GET['aksi']."</i> tidak ada!</h3>";
				tampil($koneksi);
		}
	}
	else {
		tampil($koneksi);
	}

	}


	include 'footer.php';
 ?>