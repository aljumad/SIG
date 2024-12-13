<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$akses = $_POST['akses'];

$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' && password='$password' && hak_akses='$akses'");

$cari = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);
 
if($cari){
	session_start();
	$_SESSION['user'] = $data['id_admin'];
	$_SESSION['akses'] = $data['hak_akses'];
	if($akses == 'Administrator') {
		echo "<script>alert('Login Berhasil!');document.location.href='../admin/administrator.php';</script>";
	}
	else {
   		echo "<script>alert('Login Berhasil!');document.location.href='../admin';</script>";
   	}
}else{
	echo "<script>alert('Login Gagal!');document.location.href='../admin/login.php';</script>";
}
?>