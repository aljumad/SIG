
<?php 

include 'koneksi.php';

date_default_timezone_set("Asia/Makassar");

$tgl = date('Y-m-d H:i:s');

$toko = $_POST["toko"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$komentar = $_POST["komentar"];

if (($nama == 'ADMIN') or ($nama == 'Admin') or  ($nama == 'admin')) {
	echo"<script>alert('Nama Sudah Digunakan!');document.location.href='../toko.php?aksi=detail&id=".$toko."';</script>";
}
else {

	mysqli_query($koneksi, "INSERT INTO chat VALUES ('', '$toko', '$nama', '$email', '$komentar', '$tgl' )");
	echo"<script>document.location.href='../toko.php?aksi=detail&id=".$toko."';</script>";
}
?>