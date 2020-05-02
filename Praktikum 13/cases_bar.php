<?php
include('koneksi.php');
$total = mysqli_query($koneksi,"select * from country");
while($row = mysqli_fetch_array($total)){
$country[] = $row['country'];
	
	$query = mysqli_query($koneksi,"select * from cases where id_country='".$row['id_country']."'");
	$row = $query->fetch_array();
	$total_cases[] = $row['total_cases'];
	$new_cases[] = $row['new_cases'];
	$total_death[] = $row['total_death'];
	$new_death[] = $row['new_death'];
	$total_recovered[] = $row['total_recovered'];
	$active_cases[] = $row['active_cases'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bar Chart</title>
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
  		<li class="nav-item active">
    		<a class="nav-link" href="cases_bar.php">Bar Chart</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" href="cases_pie.php">Pie Chart</a>
  		</li>
  		<li class="nav-item">
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
					<p class="h4">GRAFIK BAR COVID-19</p>
				</div>
			<div class="card-body">
				<div class="col-sm container">
					<div style="width:100%; height:100%">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
	</div></div>
	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($country); ?>,
				datasets: [{ 
        			data: <?php echo json_encode($total_cases); ?>,
					label: 'Total Cases',
        			backgroundColor: 'rgba(255, 0, 0, 1)',
				},{
					data: <?php echo json_encode($new_cases); ?>,
					label: 'New Cases',
        			backgroundColor: 'rgba(16, 23, 230, 1)',
				},{
					data: <?php echo json_encode($total_death); ?>,
					label: 'Total Deaths',
        			backgroundColor: 'rgba(243, 255, 15, 1)',
				},{
					data: <?php echo json_encode($new_death); ?>,
					label: 'New Deaths',
        			backgroundColor: 'rgba(51, 255, 15, 1)',
				},{
					data: <?php echo json_encode($total_recovered); ?>,
					label: 'Total Recovered',
        			backgroundColor: 'rgba(40, 237, 191, 1)',
				},{
					data: <?php echo json_encode($active_cases); ?>,
					label: 'Active Cases',
        			backgroundColor: 'rgba(230, 16, 190, 1)',
				}
			]
			},
			options: {
		    title: {
		      	display: true,
		      	text: '10 COUNTRY OF COVID-19 CASES'
		    }
		  }
		});
	</script>
</body>
</html>