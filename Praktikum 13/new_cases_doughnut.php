<?php
include('koneksi.php');
$total = mysqli_query($koneksi,"select * from country");
while($row = mysqli_fetch_array($total)){
	$country[] = $row['country'];
	
	$query = mysqli_query($koneksi,"select sum(new_cases) as new_cases from cases where id_country='".$row['id_country']."'");
	$row = $query->fetch_array();
	$cases[] = $row['new_cases'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Doughnut Chart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		body {
			background-color: #CCED28;
		}
		.container {
			padding-top: 25px;
		}
	</style>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="halutama.php">COVID-19</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="halutama.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
	    		<a class="nav-link" href="cases_line.php">Line Chart</a>
	  		</li>
	  		<li class="nav-item">
	    		<a class="nav-link" href="cases_bar.php">Bar Chart</a>
	  		</li>
	  		<li class="nav-item">
	    		<a class="nav-link" href="cases_pie.php">Pie Chart</a>
	  		</li>
	  		<li class="nav-item active">
	    		<a class="nav-link" href="cases_doughnut.php">Doughnut Chart</a>
	  		</li>
		</ul>
		<span class="navbar-text">
	  		Grafik COVID-19 10 Negara
		</span>
	</div>
	</nav>
	<div class="container">
	<div class="card ">
				<div class="card-header bg-dark text-white" align="center">
					<p class="h4">GRAFIK NEW CASES COVID-19</p>
				</div>
			<div class="card-body">
				<div class="col-sm container">
					<div style="width:100%; height:100%">
						<canvas id="chart-area"></canvas>
					</div>
				</div>
			</div>
	</div></div>
	<script>
		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($cases); ?>,
					backgroundColor: [
					'rgba(107, 6, 2, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 153, 0.2)',
					'rgba(208, 255, 0, 0.2)',
					'rgba(115, 255, 0, 0.2)',
					'rgba(191, 0, 255, 0.2)',
					'rgba(255, 0, 179, 0.2)',
					'rgba(255, 0, 47, 0.2)'
					],
					borderColor: [
					'rgba(107, 6, 2, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 153, 1)',
					'rgba(208, 255, 0, 1)',
					'rgba(115, 255, 0, 1)',
					'rgba(191, 0, 255, 1)',
					'rgba(255, 0, 179, 1)',
					'rgba(255, 0, 47, 1)'

					],
					label: 'Presentase New Cases COVID-19 Setiap Negara'
				}],
				labels: <?php echo json_encode($country); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>