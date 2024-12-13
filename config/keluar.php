<?php 
	include 'koneksi.php';
	session_start();
	$_SESSION['ceklog'] = '';
	unset($_SESSION['ceklog']);

	session_destroy();
	header("location: ../admin/login.php")
?>