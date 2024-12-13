
<?php 

include '../config/koneksi.php';

date_default_timezone_set("Asia/Makassar");

$tgl = date('Y-m-d H:i:s');

$toko = $_POST["toko"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$komentar = $_POST["komentar"];

	mysqli_query($koneksi, "INSERT INTO chat VALUES ('', '$toko', '$nama', '$email', '$komentar', '$tgl' )");
	echo"<script>document.location.href='kontak.php';</script>";

?>