<?php
include('koneksi.php');
$total = mysqli_query($koneksi,"select * from country");
while($row = mysqli_fetch_array($total)){
	$country[] = $row['country'];
	
	$query = mysqli_query($koneksi,"select sum(total_cases) as total_cases from cases where id_country='".$row['id_country']."'");
	$row = $query->fetch_array();
	$total_cases[] = $row['total_cases'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($country); ?>,
				datasets: [{
					label: 'Grafik Total Cases COVID-19 Setiap Negara',
					data: <?php echo json_encode($total_cases); ?>,
					backgroundColor: 'rgba(40, 237, 191)',
					borderColor: 'rgba(0, 0, 0)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>