<?php require ('../../system/middleware.php'); ?>
<?php require ('user-system.php'); ?>
<?php require('../../system/commom-functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1">
	<title>Profile</title>

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
		    	<?php if (isset($_SESSION['user'])) {
					echo '<div class="dropdown">
						<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
					
						<div class="dropdown-menu">
							<a class="dropdown-item" href="../../admin/dashboard.php">Dashboard (WIP)</a>
							<div class="dropdown-divider"></div> 
							<a class="dropdown-item" href="../../admin/content/content-manager.php">Manage Content (WIP)</a>
							<a class="dropdown-item" href="../../admin/user/user-manager.php">Manage User (WIP)</a>
						</div>
					</div>';
				} ?>

			    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
			     
			    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

		    	<div class="dropdown">
					<?php if (isset($_SESSION['user'])) { 
						echo '<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">'.$_SESSION['user']['firstName'].'</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="profile.php">Profile</a>
								<form class="form-inline" action="user-system.php" method="post">
									<button class="dropdown-item" type="submit" name="logout-user">Logout</button>
								</form>
							</div>';
					}?>
				</div> 
		    </ul>
		</div>
	</nav> 

	<!-- container -->
	<div class="container-fluid">
		<!-- row -->
		<div class="row mt-5">
			<div class="col-md-3 ml-5">
				<div class="m-md-2">
					<?php if (!isset($_SESSION['user']['profileImageId']) == "") { 
						echo '<img src="../../upload/'.$_SESSION['user']['userId'].'/image/'.$_SESSION['user']['profileImageId'].'" alt="" style="width: 100%; height: 100%;">';
					} else {
						echo '<img src="../../assets/image/default_profile.svg" alt="" style="width: 100%; height: 100%;">';
					}?>
					
				</div>

				<div class="ml-5">
					<h3>Account <button type="button" onclick="ToggleContainer('form-container');" class="btn btn-success ml-5">Edit</button></h3>
					<div>
						<?php
							$countryResult = getIndexById("r_country", "countryId", $_SESSION['user']['countryId']);
							while($row = $countryResult->fetch_assoc()){ $country = $row['name']; }

							$cityResult = getIndexById("r_city", "cityId", $_SESSION['user']['cityId']);
							while($row = $cityResult->fetch_assoc()){ $city = $row['name']; }

							$roleResult = getIndexById("r_role", "roleId", $_SESSION['user']['roleId']);
							while($row = $roleResult->fetch_assoc()){ $role = $row['name']; }
						?>
						<?php echo '<p>'.$_SESSION['user']['firstName'].' '.$_SESSION['user']['lastName'].'</p>' ?>
						<?php echo '<p>'.$_SESSION['user']['email'].'</p>' ?>
						<?php echo '<p>'.$city.' / '.$country.'</p>' ?>
						<?php echo '<p>'.$role.'</p>' ?>
					</div>
				</div>
			</div>
			<div class="col-md-6 ml-5 mt-5">
				<h1 class="mt-3"><?php echo $_SESSION['user']['firstName'].' '.$_SESSION['user']['lastName']; ?></h1>
				<h3><?php echo $_SESSION['user']['email'].' - '.$role; ?></h3>

				<div id="form-container" class="mt-5" style="display: none;">
					<form action="user-system.php" method="post">
						<div class="input-group mb-2">
							<input class="form-control mr-sm-2" type="text" name="fName" placeholder="First Name">
							<input class="form-control mr-sm-2" type="text" name="lName" placeholder="Last Name">
						</div>

						<div class="input-group mb-2">
							<input class="form-control mr-sm-2" type="text" name="email" placeholder="Email">
						</div>

						<div class="input-group mb-2">
							<input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password">
							<input class="form-control mr-sm-2" type="password" name="pwd-repeat" placeholder="Repeat password">
						</div>

						<div class="input-group mb-2">
	                    	<select name="city" id="city" class="form-control">
	                      		<?php
								    $result = getAllIndex ("r_city");
	                      			while($row = $result->fetch_assoc()){ ?>
	                           		<option value="<?= $row['cityId']; ?>"><?= $row['name']; ?></option>  
	                        	<?php } ?>
	                    	</select> 

	                    	<select name="country" id="country" class="form-control">
	                      		<?php 
									$result = getAllIndex ("r_country");
	                      			while($row = $result->fetch_assoc()){ ?>
	                           		<option value="<?= $row['countryId']; ?>"><?= $row['name']; ?></option>  
	                        	<?php } ?>
	                    	</select> 
	                    </div>

						<div class="input-group mb-2">
	                    	<select name="role" id="role" class="form-control">
	                      		<?php 
									$result = getAllIndex ("r_role");
	                      			while($row = $result->fetch_assoc()){ ?>
	                           		<option value="<?= $row['roleId']; ?>"><?= $row['name']; ?></option>  
	                        	<?php } ?>
	                    	</select> 
	                    </div>

						<div class="input-group justify-content-center">
							<button class="btn btn-primary" type="submit" name="register-user">Signup</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="assets/js/main.js"></script>

	<script type="text/javascript">
		function ToggleContainer (id) {
			var targetContainer = document.getElementById(id);

			if (targetContainer.style.display == 'none')
				targetContainer.style.display = 'block';
			else
				targetContainer.style.display = 'none';
		}
	</script>

</body>
</html>