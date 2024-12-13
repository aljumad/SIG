<?php 
	include 'header.php';
	include "../config/koneksi.php";

	// TAMBAH DATA
	function tambah($koneksi) {
		if(isset($_POST['simpan'])) {
			$nama = $_POST['nama'];

			if(!empty($nama)) {
				$simpan = mysqli_query($koneksi, "INSERT INTO kab_kota VALUES ('', '$nama' )");
				if($simpan && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'tambah') {
						echo "<script>alert('Data Tersimpan!');document.location.href='kab-kota.php';</script>";
					}
				}
				else {
					echo 'error';
				}
			}
			else {
				$pesan = 'Tidak dapat menyimpan!';
			}
		}
	?>

		<h3 class="text-center">TAMBAH KABUPATEN / KOTA</h3>
		<hr>
		<div class="container">
				<form class="user pt-3" method="post" action="">
			      <div class="form-group row">
			        <label for="nama" class="col-sm-4 col-form-label">Nama Kab/Kota</label>
			        <div class="col-sm">
			          <input type="text" class="form-control" name="nama" required="" id="nama">
			        </div>
			      </div>
			      <button type="submit" id="simpan" name="simpan" class="btn btn-primary btn-user btn-block p-2 kirim">
			        S I M P A N
			      </button>
			    </form>
		</div><hr>

<?php
	}

	// TAMPIL DATA
	function tampil($koneksi) {
		$query = mysqli_query($koneksi, "SELECT * FROM kab_kota");
	?>

		<h3 class="text-center">DATA KABUPATEN / KOTA</h3>
		<hr>
		<div class="container">

			<div class="row mx-auto pl-2">
				<div class="table-responsive">
					<a href="kab-kota.php?aksi=tambah" class="btn btn-success mb-3">+ TAMBAH DATA</a>
					<table class="table w-100 table-striped table-sm table-hover">
						<thead>
						   	<tr>
						      	<th scope="col" class="text-center">NO</th>
						      	<th scope="col">KAB/KOTA</th>
						      	<th scope="col" class="text-center" colspan="2">AKSI</th>
						    </tr>
						</thead>
						<tbody>

				<?php
				    $no = 1;

				    while ($d = mysqli_fetch_array($query)) {

				        $id = $d['id_kab_kota'];
				        $nama = $d['nama_kab_kota'];

				?>
				           	<tr>
					            <td class="text-center"><?php echo $no++; ?></td>
					            <td><?php echo $nama; ?></td>
					            <td class="text-right">
					            	<a href="kab-kota.php?aksi=edit&id=<?php echo $id; ?>&nama=<?php echo $nama; ?>" class="btn btn-primary">EDIT</a>
					            </td>
					            <td class="text-left">
					            	<a href="kab-kota.php?aksi=hapus&id=<?php echo $id ?>" class="btn btn-danger" onclick="alert('Yakin Hapus??')">HAPUS</a>
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
			$nama = $_POST['nama'];

			if(!empty($nama)) {
				$sql = mysqli_query($koneksi, "UPDATE kab_kota SET nama_kab_kota='$nama' WHERE id_kab_kota='$id'");

				if($sql && isset($_GET['aksi'])) {
					if($_GET['aksi'] == 'edit') {
						echo "<script>alert('Data Diubah!');document.location.href='kab-kota.php';</script>";
					}
				}
			}
			else {
				$pesan = "Data tdak Lengkap!";
			}
		}

		if(isset($_GET['id'])) {

		?>

			<h3 class="text-center">EDIT KABUPATEN / KOTA</h3>
			<hr>
			<div class="container">
					<form class="user pt-3" method="post" action="">
				      <div class="form-group row">
				        <label for="nama" class="col-sm-4 col-form-label">Nama Kab/Kota</label>
				        <div class="col-sm">
				          <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
				          <input type="text" class="form-control" name="nama" required="" id="nama" value="<?php echo $_GET['nama']; ?>">
				        </div>
				      </div>
				      <button type="submit" id="edit" name="edit" class="btn btn-primary btn-user btn-block p-2 kirim">
				        E D I T
				      </button>
				      <h5 class="text-center text-success"><?php echo isset($pesan) ? $pesan : "" ?></h5>
				    </form>
			</div><hr>

	<?php	
	
		}
	} 

	// HAPUS DATA
	function hapus($koneksi) {
		if(isset($_GET['id']) && isset($_GET['aksi'])) {
			$id = $_GET['id'];
			$hapus = mysqli_query($koneksi, "DELETE FROM kab_kota WHERE id_kab_kota='$id'");

			if($hapus) {
				if($_GET['aksi'] == 'hapus') {
					echo "<script>document.location.href='kab-kota.php';</script>";
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