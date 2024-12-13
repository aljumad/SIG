<?php 
  include 'header.php';

  include_once '../config/koneksi.php';

  $data = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$ambil'");
  $d = mysqli_fetch_array($data);
  $akses = $d['hak_akses'];
  $user = $d['username'];

  $data1 = mysqli_query($koneksi,"SELECT * FROM kab_kota");
  $data2 = mysqli_query($koneksi,"SELECT * FROM toko");
  $data3 = mysqli_query($koneksi,"SELECT * FROM oleh_oleh");
  $data4 = mysqli_query($koneksi,"SELECT * FROM admin");

  $d4 = mysqli_num_rows($data4);
  $d1 = mysqli_num_rows($data1);
  $d2 = mysqli_num_rows($data2);
  $d3 = mysqli_num_rows($data3);

?>

    <h5 class="text-center text-capitalize">Selamat Datang!</h5>
    <h3 class="text-center text-uppercase"><?php echo $akses; ?></h3>
    <hr>

    <div class="container-fluid mt-4">
			<div class="row justify-content-center">
				<div class="card-deck col-auto-mb-3 m-2 ">
					<div class="card  my-3 shadow p-1 bg-warning text-light rounded" style="width: 12rem;">
					    <div class="card-body">
					      <h3 class="card-title text-center text-uppercase"><?php echo $d1 ?></h3>
					    </div>
					    <div class="card-footer text-center p-1">
						   <p class="text-center m-0">KAB/KOTA</p>
						</div>
					    </a>
				    </div>
				</div>
				<div class="card-deck col-auto-mb-3 m-2 ">
					<div class="card  my-3 shadow p-1 bg-success text-light rounded" style="width: 12rem;">
					    <div class="card-body">
					      <h3 class="card-title text-center text-uppercase"><?php echo $d2 ?></h3>
					    </div>
					    <div class="card-footer text-center p-1">
						   <p class="text-center m-0">TOKO</p>
						</div>
					    </a>
				    </div>
				</div>
				<div class="card-deck col-auto-mb-3 m-2 ">
					<div class="card  my-3 shadow p-1 bg-danger text-light rounded" style="width: 12rem;">
					    <div class="card-body">
					      <h3 class="card-title text-center text-uppercase"><?php echo $d3 ?></h3>
					    </div>
					    <div class="card-footer text-center p-1">
						   <p class="text-center m-0">OLEH-OLEH</p>
						</div>
					    </a>
				    </div>
				</div>
				<div class="card-deck col-auto-mb-3 m-2 ">
					<div class="card  my-3 shadow p-1 bg-info text-light rounded" style="width: 12rem;">
					    <div class="card-body">
					      <h3 class="card-title text-center text-uppercase"><?php echo $d4 ?></h3>
					    </div>
					    <div class="card-footer text-center p-1">
						   <p class="text-center m-0">ADMIN</p>
						</div>
					    </a>
				    </div>
				</div>
			</div>

			<hr>
		</div>



<?php 
  include 'footer.php';
?>