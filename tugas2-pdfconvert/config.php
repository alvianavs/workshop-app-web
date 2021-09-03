<?php

$conn = mysqli_connect("localhost", "root", "", "tugas_dompdf");

if (!$conn)
	die("Koneksi ke database gagal!. " . mysqli_connect_error());
?>