<?php 
	include 'koneksi.php';

	date_default_timezone_set("Asia/Makassar");

	$nama = $_POST['nama'];
	$nik = $_POST['nik'];
	$noHp = $_POST['noHp'];
	$email = $_POST['email'];
	$tgl = date('Y-m-d H:i:s');
	$judul = $_POST['judul'];
	$kategori = $_POST['kategori'];
	$kecamatan = $_POST['kecamatan'];
	$kelurahan = $_POST['kelurahan'];
	$alamatKejadian = $_POST['alamatKejadian'];
	$waktuKejadian = $_POST['waktuKejadian'];
	$isi = $_POST['isi'];
	$berkas = $_FILES['berkas']['name'];
	$status = 'Menunggu Verifikasi';

	mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('', '', '$nama', '$nik', '$noHp', '$email', '$tgl', '$judul', '$kategori', '$kecamatan', '$kelurahan', '$alamatKejadian', '$waktuKejadian', '$isi', '$berkas', '$status' )");
	move_uploaded_file($_FILES['berkas']['tmp_name'],"../img/".$berkas);
	echo"<script>alert('Pengaduan Terkirim!');document.location.href='../riwayat.php';</script>";
 ?>