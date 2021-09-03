<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laporan Transaksi</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<div class="logo">
				<img src="sebuah_logo.png" style="width: 300px">
				<p>Tabel Tagihan Transaksi</p>
			</div>
		</div>
		<div class="content">
			<div class="button">
				<a href="cetak.php">Cetak PDF</a>
			</div>
			<table>
				<tr>
					<th>No</th>
					<th>Deskripsi</th>
					<th>Kuantitas</th>
					<th>Harga</th>
					<th>Diskon</th>
					<th>Jumlah</th>
				</tr>
				<?php
				include 'config.php';

				$data = mysqli_query($conn, "SELECT * FROM transaksi");
				$no = 1;
				while ($row = mysqli_fetch_assoc($data)) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $row['deskripsi'] ?></td>
						<td><?= $row['kuantitas'] ?></td>
						<td><?= number_format($row['harga'], 2, ',', '.') ?></td>
						<td><?= $row['diskon'] ?>%</td>
						<td><?= number_format($row['jumlah'], 2, ',', '.') ?></td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="4"></td>
					<td><br>Subtotal<br><br>
						Total Diskon<br><br>
						Pembayaran diterima<br><br>
						Total<br><br>
						Sisa tagihan<br></td>
						<td><br>Rp. 1.269.090,00<br><br>
							Rp. 99.772,00<br><br>
							Rp. 500.000,00<br><br>
							Rp. 1.169.318,00<br><br>
							Rp. 669.318,00<br>
						</td>
					</tr>
				</table>
			</div>
		</body>
		</html>