<?php

$conn = mysqli_connect("localhost", "root", "", "latihan_chart");

if (!$conn)
	die("Koneksi ke database gagal!. " . mysqli_connect_error());
?>