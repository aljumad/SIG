<?php 
	include 'koneksi.php';

	$ip   = $_SERVER['REMOTE_ADDR'];
	$nama = $_POST['nama'];
	$asal = $_POST['asal'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$p3 = $_POST['p3'];
	$p4 = $_POST['p4'];
	$p5 = $_POST['p5'];

	$query = mysqli_query($koneksi, "SELECT * FROM kuisioner WHERE ip='$ip'");

	 if(mysqli_num_rows($query) == 0){
	    mysqli_query($koneksi, "INSERT INTO kuisioner VALUES ('', '$ip', '$nama', '$asal', '$p1', '$p2', '$p3', '$p4', '$p5' )");
		echo"<script>alert('Kuisioner Terkirim! Terimakasih..');document.location.href='../index.php';</script>";
	 }
	 // Jika sudah ada, update
	 else{
	    echo"<script>alert('Maaf.. Anda sudah mengirimkan kuisioner sebelumnya!');document.location.href='../index.php';</script>";
	 }

	
 ?>