<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan Membuat Chart</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.28.1/apexcharts.min.css" integrity="sha512-Tv+8HvG00Few62pkPxSs1WVfPf9Hft4U1nMD6WxLxJzlY/SLhfUPFPP6rovEmo4zBgwxMsArU6EkF11fLKT8IQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Penggunaan WiFi bulan Agustus tahun 2021</h1>
		<div class="wrapper">
			<?php
			include 'config.php';

			$data = mysqli_query($conn, "SELECT tanggal, jumlah_data FROM usage_data");
			$tanggal = array();
			$jml_data = array();
			while($row = mysqli_fetch_assoc($data)){
				$tanggal[] = date("d M", strtotime($row['tanggal']));
				$jml_data[] = $row['jumlah_data'];
				
			}
			?>
			<div id="chart">
				
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.28.1/apexcharts.min.js" integrity="sha512-yJyoHtyJ9yH4Z9cQ5cc33Y7Sd+ObZ8h+UBJxON2ZrdnypY5+G4/btkspHuTP6wAa8V3uomZhGyIet1Jdnm6COw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript">
		const jml_data = <?php echo json_encode($jml_data); ?>;
		const tanggal = <?php echo json_encode($tanggal); ?>;

		var options = {
			chart: {
				width: '100%',
				height: 300,
				type: "area"
			},
			title: {
				text: "Data dalam bentuk MB (Mega Byte)",
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				curve: "smooth",
				width: 3
			},
			series: [
			{
				name: "Data ",
				data: jml_data
			}
			],
			fill: {
				type: "gradient",
				gradient: {
					shadeIntensity: 1,
					opacityFrom: 0.7,
					opacityTo: 0.9,
					stops: [0, 90, 100]
				}
			},
			xaxis: {
				categories: tanggal,
			}
		};

		var chart = new ApexCharts(document.querySelector("#chart"), options);

		chart.render();

	</script>
</body>
</html>