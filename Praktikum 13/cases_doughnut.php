<!DOCTYPE html>
<html>
<head>
	<title>Doughnut Chart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		body {
			background-color: #CCED28;
		}
	</style>
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

<div class="container" align="center">
	<h1>Grafik Doughnut COVID-19</h1>
	<table>
	<tr>
		<td>Total Cases</td>
		<td> :</td>
		<td><a href="total_cases_dognut.php" class="btn btn-dark">Lihat Disini</a></td>
	</tr>
	<tr>
		<td>New Cases</td>
		<td> :</td>
		<td><a href="new_cases_doughnut.php" class="btn btn-dark">Lihat Disini</a></td>
	</tr>
	<tr>
		<td>Total Deaths</td>
		<td> :</td>
		<td><a href="total_death_doughnut.php" class="btn btn-dark">Lihat Disini</a></td>
	</tr>
	<tr>
		<td>New Deaths</td>
		<td> :</td>
		<td><a href="new_death_doughnut.php" class="btn btn-dark">Lihat Disini</a></td>
	</tr>
	<tr>
		<td>Total Recovered</td>
		<td> :</td>
		<td><a href="total_recovered_doughnut.php" class="btn btn-dark">Lihat Disini</a></td>
	</tr>
	<tr>
		<td>Active Cases</td>
		<td> :</td>
		<td><a href="active_cases_doughnut.php" class="btn btn-dark">Lihat Disini</a></td>
	</tr>
	</table>
</div>
</body>
</html>