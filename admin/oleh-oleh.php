<?php 
	require 'header.php';
	include "../config/koneksi.php";


	// TAMBAH DATA
	function tambah($koneksi) {
		if(isset($_POST['simpann'])) {
			$namaoleh2 = $_POST['namaoleh2'];
			$idtokoooo = $_POST['idtoko'];
			$ket = $_POST['ket'];
			$harga = $_POST['harga'];
			$stok = $_POST['stok'];
			$gambar = $_FILES['gambar']['name'];

			$simpan = mysqli_query($koneksi, "INSERT INTO oleh_oleh VALUES ('', '$namaoleh2', '$idtokoooo', '$ket', '$harga', '$stok', '$gambar' )");
			move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/oleh2/".$gambar);
			if($simpan && isset($_GET['aksi'])) {
				if($_GET['aksi'] == 'tambah') {
					echo "<script>alert('Data Tersimpan!');document.location.href='oleh-oleh.php';</script>";
				}
			}
			else {
				echo '<script>alert("Error")</script>';
			}
		}

		$dataa2 = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY nama_toko");
	?>

		<h3 class="text-center">TAMBAH OLEH-OLEH</h3>
		<hr>
		<div class="container">
				<form class="user pt-3" method="post" enctype="multipart/form-data" action="">
			      <div class="form-group row">
			        <label for="namaoleh2" class="col-sm-4 col-form-label">Nama Oleh-Oleh</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="namaoleh2" required="" id="namaoleh2">
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="idtoko" class="col-sm-4 col-form-label">Toko</label>
			        <div class="col-sm">
			          <select class="custom-select form-control" name="idtoko" id="idtoko">
			  		      <option>--Pilih Toko--</option>
			  		      
			  		     <?php
						    while ($dd2 = mysqli_fetch_array($dataa2)) {

						        $idtokoo = $dd2['id_toko'];
								$namatokoo = $dd2['nama_toko'];

								echo '<option value="'.$idtokoo.'">'.$namatokoo.'</option>';
							}
						?>

					  </select>
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
			        <div class="col-sm">
			          <textarea class="form-control" name="ket" required="" id="ket" rows="3"></textarea>
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
			        <div class="col-sm">
			          <input type="number" class="form-control" name="harga" required="" id="harga">
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
			        <div class="col-sm">
			          <input type="number" class="form-control" name="stok" required="" id="stok">
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
			        <div class="col-sm">
			          <input type="file" class="form-control-file" name="gambar" required="" id="gambar">
			        </div>
			      </div>
			      <button type="submit" id="simpann" name="simpann" class="btn btn-primary btn-user btn-block p-2 kirim">
			        S I M P A N
			      </button>
			    </form>
		</div>
		<hr>

<?php
	}

	// TAMPIL DATA
	function tampil($koneksi) {

	$idadmin = $_SESSION['user'];

    $adminn = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$idadmin'");

    $dadminn = mysqli_fetch_array($adminn);
    $nmadmin = $dadminn['hak_akses'];
	$dataaa = mysqli_query($koneksi, "SELECT * FROM toko WHERE nama_toko='$nmadmin'");
	$ddd = mysqli_fetch_array($dataaa);
	$idtokooo = $ddd['id_toko'];

	if($nmadmin == 'Administrator') {
		$query = mysqli_query($koneksi, "SELECT * FROM oleh_oleh order by id_toko");
	}
	else {
		$query = mysqli_query($koneksi, "SELECT * FROM oleh_oleh WHERE id_toko='$idtokooo' order by nama_oleh2");
	}

	?>

		<h3 class="text-center">DATA OLEH-OLEH</h3>
		<hr>

			<div class="row mx-auto pl-2">
				<div class="table-responsive">
					<a href="oleh-oleh.php?aksi=tambah" class="btn btn-success mb-3">+ TAMBAH DATA</a>
					<table class="table w-100 table-striped table-sm table-hover">
						<thead>
						   	<tr>
						      	<th scope="col" class="text-center">NO</th>
						      	<th scope="col" class="text-center" width="100">OLEH-OLEH</th>
						      	<th scope="col" class="text-center" width="100">TOKO</th>
						      	<th scope="col" class="text-center">KETERANGAN</th>
						      	<th scope="col" class="text-center">HARGA</th>
						      	<th scope="col" class="text-center">STOK</th>
						      	<th scope="col" class="text-center">GAMBAR</th>
						      	<th scope="col" class="text-center" colspan="2">AKSI</th>
						    </tr>
						</thead>
						<tbody>

				<?php
				    $no = 1;

				    while ($d = mysqli_fetch_array($query)) {

				        $id = $d['id_oleh2'];
				        $nama = $d['nama_oleh2'];
				        $idtoko = $d['id_toko'];
				        $ket = $d['ket'];
						$harga = $d['harga'];
						$stok = $d['stok'];
				        $gambar = $d['gambar'];

						$query2 = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$idtoko'");
						$d2 = mysqli_fetch_array($query2);
						$nmtoko = $d2['nama_toko'];

				?>
				           	<tr>
					            <td class="text-center"><?php echo $no++; ?></td>
					            <td><?php echo $nama; ?></td>
					            <td><?php echo $nmtoko; ?></td>
					            <td><?php echo $ket; ?></td>
					            <td><?php echo $harga; ?></td>
					            <td><?php echo $stok; ?></td>
					            <td>
					            	<a href="../img/oleh2/<?php echo $gambar; ?>"><img src="../img/oleh2/<?php echo $gambar; ?>" class="img-thumbnail"></a>
					            </td>
					            <td class="text-right">
					            	<a href="oleh-oleh.php?aksi=edit&id=<?php echo $id; ?>&nama=<?php echo $nama; ?>&idtoko=<?php echo $idtoko; ?>&nmtoko=<?php echo $nmtoko; ?>&ket=<?php echo $ket; ?>&hg=<?php echo $harga; ?>&st=<?php echo $stok; ?>&gambar=<?php echo $gambar; ?>" class="btn btn-info">EDIT</a>
					            </td>
					            <td class="text-left">
					            	<a href="oleh-oleh.php?aksi=hapus&id=<?php echo $id ?>" class="btn btn-danger" onclick="alert('Yakin Hapus??')">HAPUS</a>
					            </td>
					        </tr>
				<?php
				    }
				?>

				        </tbody>
					</table>
				</div>
			</div>
		
		<hr>
		
<?php
	}

	// EDIT DATA
	function edit($koneksi) {
		if(isset($_POST['edit'])) {
			$id = $_POST['id'];
			$namaoleh2 = $_POST['namaoleh2'];
			$idtoko = $_POST['idtoko'];
			$ket = $_POST['ket'];
			$harga = $_POST['harga'];
			$stok = $_POST['stok'];
			$gambar = $_FILES['gambar']['name'];

			if(!empty($gambar)) {
				$sql = mysqli_query($koneksi, "UPDATE oleh_oleh SET nama_oleh2='$namaoleh2', id_toko='$idtoko', ket='$ket', harga='$harga', stok='$stok', gambar='$gambar'  WHERE id_oleh2='$id'");
				move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/oleh2/".$gambar);
				if($sql && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'edit') {
						echo "<script>alert('Data Diubah!');document.location.href='oleh-oleh.php';</script>";
					}
				}
			}
			else {
				$sql = mysqli_query($koneksi, "UPDATE oleh_oleh SET nama_oleh2='$namaoleh2', id_toko='$idtoko', harga='$harga', stok='$stok', ket='$ket' WHERE id_oleh2='$id'");

				if($sql && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'edit') {
						echo "<script>alert('Data Diubah!');document.location.href='oleh-oleh.php';</script>";
					}
				}
			}
		}

		$data2 = mysqli_query($koneksi, "SELECT * FROM toko");

		?>

			<h3 class="text-center">EDIT OLEH-OLEH</h3>
			<hr>
			<div class="container">
				<form class="user pt-3" method="post" enctype="multipart/form-data" action="">
			      <div class="form-group row">
			        <label for="namaoleh2" class="col-sm-4 col-form-label">Nama Oleh-Oleh</label>
			        <div class="col-sm">
			        	<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
				    	<input type="text" class="form-control" name="namaoleh2" required="" id="namaoleh2" value="<?php echo $_GET['nama']; ?>">
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="idtoko" class="col-sm-4 col-form-label">Toko</label>
			        <div class="col-sm">
			          <select class="custom-select form-control" name="idtoko" id="idtoko">
			  		      <option selected="selected" hidden="hidden" value="<?php echo $_GET['idtoko']; ?>"><?php echo $_GET['nmtoko']; ?></option>
			  		      
			  		     <?php
						    while ($d2 = mysqli_fetch_array($data2)) {

						        $idtoko = $d2['id_toko'];
								$namatoko = $d2['nama_toko'];

								echo '<option value="'.$idtoko.'">'.$namatoko.'</option>';
							}
						?>

					  </select>
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
			        <div class="col-sm">
			          <textarea class="form-control" name="ket" required="" id="ket" rows="3"><?php echo $_GET['ket']; ?></textarea>
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
			        <div class="col-sm">
			          <input type="number" class="form-control" name="harga" value="<?php echo $_GET['hg']; ?>" required="" id="harga">
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
			        <div class="col-sm">
			          <input type="number" class="form-control" name="stok" value="<?php echo $_GET['st']; ?>" required="" id="stok">
			        </div>
			      </div>

			      <div class="form-group row">
			        <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
			        <div class="col-sm">
			          <input type="file" class="form-control-file" name="gambar" id="gambar"><img src="../img/oleh2/<?php echo $_GET['gambar']; ?>" class="img-thumbnail w-50">
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

	// HAPUS DATA
	function hapus($koneksi) {
		if(isset($_GET['id']) && isset($_GET['aksi'])) {
			$idx = $_GET['id'];

			$hapus = mysqli_query($koneksi, "DELETE FROM oleh_oleh WHERE id_oleh2='$idx'");

			if($hapus) {
				if($_GET['aksi'] == 'hapus') {
					echo "<script>document.location.href='oleh-oleh.php';</script>";
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


	include 'footer.php';
 ?>