<?php
	include "../config/koneksi.php";
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM chat WHERE id_chat='$id'");
	echo"<script>document.location.href='kontak.php';</script>";
?>