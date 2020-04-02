<?php require ('../../system/middleware.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1">
	<title>Dashboard | Content</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">

		<!-- Brand -->
	  	<a class="navbar-brand" href="../../index.php"><img src="../../assets/image/logo.png" alt="logo" width="40"></a>

	  	<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
				<div class="dropdown">
					<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>

					<div class="dropdown-menu">
						<a class="dropdown-item" href="../dashboard.php">Dashboard (WIP)</a>
						<div class="dropdown-divider"></div> 
						<a class="dropdown-item" href="content-manager.php">Manage Content (WIP)</a>
						<a class="dropdown-item" href="../user/user-manager.php">Manage User (WIP)</a>
					</div>
				</div>

			    <div class="dropdown">
					<?php if (isset($_SESSION['user'])) { 
						echo '<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">'.$_SESSION['user']['firstName'].'</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="../pages/user/profile.php">Profile</a>
								<form class="form-inline" action="../pages/user/user-system.php" method="post">
									<button class="dropdown-item" type="submit" name="logout-user">Logout</button>
								</form>
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

		</div>
	</div>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="assets/js/main.js"></script>    
</body>
</html>