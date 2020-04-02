<?php session_start(); ?>
<?php require('system/commom-functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1">
	<title>Portuguese Overseas</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">

		<!-- Brand -->
	  	<a class="navbar-brand" href="index.php"><img src="assets/image/logo.png" alt="logo" width="40"></a>

	  	<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		    	<?php if (isset($_SESSION['user'])) {
					echo '<div class="dropdown">
						<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
					
						<div class="dropdown-menu">
							<a class="dropdown-item" href="admin/dashboard.php">Dashboard (WIP)</a>
							<div class="dropdown-divider"></div> 
							<a class="dropdown-item" href="admin/content/content-manager.php">Manage Content (WIP)</a>
							<a class="dropdown-item" href="admin/user/user-manager.php">Manage User (WIP)</a>
							<a class="dropdown-item" href="admin/functionality/functionality-manager.php">Functionalities (WIP)</a>
						</div>
					</div>';
				} ?>

			    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
			     
			    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

		    	<div class="dropdown">
					<?php if (isset($_SESSION['user'])) { 
						echo '<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">'.$_SESSION['user']['firstName'].'</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="pages/user/profile.php">Profile</a>
								<form class="form-inline" action="pages/user/user-system.php" method="post">
									<button class="dropdown-item" type="submit" name="logout-user">Logout</button>
								</form>
							</div>';
					} else {
						echo '<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="pages/user/login.php">Login</a>
								<a class="dropdown-item" href="pages/user/register.php">Register (WIP)</a>
							</div>';
					} ?>
				</div> 
		    </ul>
		</div>
	</nav> 

	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div id="regions_div" style="width: 100%; height: 90vh;">
				<?php $result = getAllIndex("r_country"); ?>
			</div>
		</div>
	</div>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="assets/js/main.js"></script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'YOUR GOOGLE API KEY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
        	['Country'],
        	<?php while($row = $result->fetch_assoc()){ ?>
           		['<?= $row['name']; ?>'],  
        	<?php } ?>
          
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
</body>
</html>