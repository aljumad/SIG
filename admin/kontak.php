<?php 

	include 'header.php';
	include "../config/koneksi.php";
 ?>
<h3 class="text-center">DATA TOKO</h3>
<hr>
<div class="container">

<div class="row mx-auto pl-2">

<div class="col-md-12">
<div class="panel panel-success">
              <div class="panel-heading">
                <h5 class="panel-title"><span class="glyphicon glyphicon-user"></span> Kontak Chat </h5> 
              </div>
              <div class="panel-body">
<center>
<div class="komentar">
<?php

	$data4 = mysqli_query($koneksi, "SELECT * FROM toko WHERE nama_toko='$ambil2'");
	$d4 = mysqli_fetch_array($data4);
	$idtk = $d4['id_toko'];
	$nmtk = $d4['nama_toko'];

	$data5 = mysqli_query($koneksi, "SELECT * FROM chat WHERE id_toko='$idtk'");
	while  ($d5 = mysqli_fetch_array($data5)) {
	    $idc = $d5['id_chat'];
	    $nm = $d5['nama'];
	    $email = $d5['email'];
	    $pesan = $d5['pesan'];
	    $waktu = $d5['waktu'];

		$bg = '';
		$hd = '';
		if ($nm == $nmtk) {
			$bg = 'text-white';
			$hd = 'bg-danger';

		}
		else {
			$bg = 'text-primary';
			$hd = 'bg-light';
		}

		

?>
<div  class="row ">
	<div class="col">
		<p class="text-left ml-1 <?php echo $hd; ?> <?php echo $bg; ?>"><?php echo $nm ; ?></p>
	</div>
	<div class="col">
		<p class="text-right mr-1 "><small><?php echo $waktu; ?></small></p>
	</div>
</div>
<div  class="row">
	<div class="col">
		<p class="text-left ml-1"><?php echo $pesan; ?></p>
	</div>
	<div class="col" align="right">
		<a href="hapus.php?id=<?php echo $idc ?>" class="btn btn-warning mt-1" onclick="alert('Yakin Hapus??')">HAPUS</a>
	</div>	
</div>

<?php
	}

?>

</div>
</center><br/>
<center>
<form id="formku" method="post" action="proses.php" onsubmit="return formCheck(this);" >
<table style="font-style: oblique; font-weight: bold;">
<input type="hidden" name="nama" value="<?php echo $ambil2; ?>" />
<input type="hidden" name="toko" value="<?php echo $idtk; ?>" />
<input type="hidden" name="email" value="admin@gmail.com" />
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
</div><hr>

<?php 
	include 'footer.php';
 ?>