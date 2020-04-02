<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1">
	<title>Overseas | Login</title>

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
			    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
			     
			    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

		    	<div class="dropdown">
					<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="login.php">Login</a>
						<a class="dropdown-item" href="register.php">Register</a>
					</div>
				</div> 
		    </ul>
		</div>
	</nav> 

	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row justify-content-center">
			<h1 class="text-center">Login</h1>
		</div>

		<!-- row -->
		<div class="row justify-content-center">
			<div class="col-md-6 mt-2">
				<form action="user-system.php" method="post">
					<div class="form-group">
						<input class="form-control mr-sm-2" type="text" name="email" placeholder="Email">
					</div>

					<div class="form-group mb-2">
						<input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
					</div>

					<div class="form-group">
						<button class="btn btn-primary" type="submit" name="login-user">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="assets/js/main.js"></script>
</body>
</html>