<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dokumen Transaksi</title>
</head>
<style type="text/css">
* {
	padding: 0;
	margin: 0;
}
body {
	font-family: 'Roboto', sans-serif;	
}
.header {
	width: 100%;
	height: 240px;
	background-color: #E6E6E6;
}
.row:after {
	content: "";
	display: table;
	clear: both;
}
.row:first-child .col {
	padding-bottom: 4rem;
}
.col {
	float: left;
	width: 50%;
	padding-top: 1rem;
}
.col img {
	padding-left: 3rem;
}
.invoice {
	padding-top: 1rem;
	text-align: center;
	font-size: 55px;
	font-weight: bolder;
}
.row .no {
	background-color: #2C7BFE;
	color: white;
	height: 40px;
}
.row .tanggal {
	background-color: #E6E6E6;
	height: 40px;
}
.row:last-child .col p {
	font-size: 14px;
}
.col p {
	font-size: 18px;
	padding-left: 3rem;
}
.content {
	padding: 2rem 4rem;
}
.content .customer p {
	float: left;
	width: 20%;
}
.content .customer p:last-child {
	width: 50%;
}
.table {
	padding-top: 8rem;
}
table {
	border-collapse: collapse;
	width: 100%;
	font-size: 14px;
}
table td, table th {
	padding: 10px;
}
table th:nth-child(1), th:nth-child(2){background-color: #2C7BFE; color: white;}
table th:nth-child(odd) {
	text-align: center;
}
table th:nth-child(4), th:nth-child(6) {
	text-align: right;
}
table tr:nth-child(2)>td {
	padding-top: 20px;
}
table tr td {
	border-bottom: 2px solid #E6E6E6;
}
table tr:last-child td {
	border-bottom: none;
}
table td:nth-child(odd) {
	text-align: center;
}
table td:nth-child(4), td:nth-child(6) {
	text-align: right;
}
table tr:last-child>td {
	text-align: right;
}
table th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: #E6E6E6;
	color: black;
}
</style>
<body>
	<div class="header">
		<div class="row">
			<div class="col">
				<img style="width: 280px" src="sebuah_logo.png">
			</div>
			<div class="col invoice">INVOICE</div>
		</div>
		<div class="row">
			<div class="col no">
				<p>Invoice INV/001200</p>
			</div>
			<div class="col tanggal">
				<p>Tanggal 03 September 2021</p>
			</div>
		</div>
		<div class="content">
			<div class="customer">
				<p><b>Tagihan kepada:</b></p>
				<p><b>Avis Alvian</b><br>Ds. Blembem, Kec. Jambon, Kab. Ponorogo Kode Pos (63456)<br>Telp: 08970586458<br>Email: avisalvian44@gmail.com</p>
			</div>
			<div class="table">
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
						<td colspan="3"></td>
						<td colspan="2"><br>Subtotal<br><br>
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
				<div class="row" style="padding-top: 1rem;">
					<div class="col">
						<p><b>Pesan</b><br>Silahkan transfer ke rekening: <br>XXXXXXXX BCA a/n PT. ABC</p>
					</div>
					<div class="col" style="text-align: center;">
						<p style="padding-bottom: 4rem;">Dengan Hormat</p>
						<p>Finance dept.</p>
					</div>
				</div>
			</div>
		</div>
		<div></div>
	</body>
	</html>