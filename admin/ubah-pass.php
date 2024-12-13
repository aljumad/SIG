<?php 
    include 'header.php';
    include '../config/koneksi.php';
?>

	<h3 class="text-center">UBAH PASSWORD ADMIN</h3>
	<hr>
	<div class="row mx-auto w-auto justify-content-center bg-light">

 	<form class="user bg-white rounded shadow m-3 p-3" method="post" enctype="multipart/form-data" action="ubahpass.php">
      <div class="form-group row">
        <label for="plama" class="col-sm-4 col-form-label">Password Lama</label>
        <div class="col-sm">
          <input type="password" class="form-control" name="plama" required="" id="plama">
          <input type="hidden" name="id" value="<?php echo $ambil; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="pbaru" class="col-sm-4 col-form-label">Password Baru</label>
        <div class="col-sm">
          <input type="password" class="form-control" name="pbaru" required="" id="pbaru">
        </div>
      </div>
      <div class="form-group row">
        <label for="konfirmasi" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
        <div class="col-sm">
          <input type="password" class="form-control" name="konfirmasi" required="" id="konfirmasi">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-info btn-user btn-block p-2 kirim">
        U B A H
      </button>
    </form>
	</div>
 <?php 
	include 'footer.php';
 ?>