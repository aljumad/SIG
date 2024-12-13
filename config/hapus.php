<?php
	include_once "koneksi.php";
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_aduan='$id'");
	echo"<script>document.location.href='../admin/data-pengaduan.php';</script>";
?>