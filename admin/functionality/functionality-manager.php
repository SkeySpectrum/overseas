<?php require ('../../system/middleware.php'); ?>
<?php require ('functionality-system.php'); ?>
<?php require ('../../system/commom-functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1">
	<title>Dashboard | Functionality</title>

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
						<a class="dropdown-item" href="../content/content-manager.php">Manage Content (WIP)</a>
						<a class="dropdown-item" href="../user/user-manager.php">Manage User (WIP)</a>
						<a class="dropdown-item" href="functionality-manager.php">Functionalities (WIP)</a>
					</div>
				</div>

			    <div class="dropdown">
					<?php if (isset($_SESSION['user'])) { 
						echo '<a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">'.$_SESSION['user']['firstName'].'</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="../../pages/user/profile.php">Profile</a>
								<form class="form-inline" action="../../pages/user/user-system.php" method="post">
									<button class="dropdown-item" type="submit" name="logout-user">Logout</button>
								</form>
							</div>';
					} ?>
				</div> 
		    </ul>
		</div>
	</nav>

	<!-- container -->
	<div class="container-fluid">
		<!-- row -->
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h3 class="text-center text-dark mt-2">Advanced CRUD</h3>

				<hr>
					<div class="text-center">
						<button type="button" onclick="ToggleContainer('city-container');" class="btn btn-success">City</button>
						<button type="button" onclick="ToggleContainer('country-container');" class="btn btn-success">Country</button>
						<button type="button" onclick="ToggleContainer('continent-container');" class="btn btn-success">Continet</button>
						<button type="button" onclick="ToggleContainer('role-container');" class="btn btn-success">Role</button>
					</div>
				<hr>
			</div>
		</div>

		<!-- row -->
		<div class="row justify-content-center">
			<div id="city-container" class="col-md-5" style="display: none">
				<div align="center">
					<?php if($city_update == true){ ?>
                    	<button type="button" data-toggle="modal" data-target="#city_popup" class="btn btn-warning">Update City</button>
                    <?php } else { ?>
						<button type="button" data-toggle="modal" data-target="#city_popup" class="btn btn-warning">Add City</button>
                    <?php } ?>
                </div>
                <hr>

				<?php $result = getAllIndex("r_city"); ?>

				<table class="table table-hover" id="table-data">
				    <thead>
					    <tr class="text-center">
					        <th>#</th>
					        <th>Name</th>
					        <th>Slug</th>
					        <th>Country</th>
					        <th>Action</th>
					    </tr>
				    </thead>
				    <tbody>
					    <?php while($row = $result->fetch_assoc()){ ?>
					    <tr class="text-center">
					        <td><?= $row['cityId']; ?></td>
					        <td><?= $row['name']; ?></td>
					        <td><?= $row['slug']; ?></td>
					        <td><?= $row['countryId']; ?></td>
					        <td>
					        	<a href="functionality-system.php?city-delete=<?= $row['cityId']; ?>" class="badge badge-danger p-2" onClick="return confirm('Do you want to delete this record?');">Delete</a> |
					        	<a href="functionality-manager.php?city-edit=<?= $row['cityId']; ?>" class="badge badge-success p-2">Edit</a>
					        </td>
					    </tr>
				  		<?php } ?>
				    </tbody>
				  </table>
			</div>

			<div id="country-container" class="col-md-5" style="display: none">
				<div align="center">
					<?php if($country_update == true){ ?>
                    	<button type="button" data-toggle="modal" data-target="#country_popup" class="btn btn-warning">Update Country</button>
                    <?php } else { ?>
						<button type="button" data-toggle="modal" data-target="#country_popup" class="btn btn-warning">Add Country</button>
                    <?php } ?>
                </div>

                <hr>

                <?php $result = getAllIndex("r_country"); ?>

				<table class="table table-hover" id="table-data">
				    <thead>
					    <tr class="text-center">
					        <th>#</th>
					        <th>Name</th>
					        <th>Slug</th>
					        <th>Cont</th>
					        <th>Action</th>
					    </tr>
				    </thead>
				    <tbody>
				    	<?php while($row = $result->fetch_assoc()){ ?>
					    <tr class="text-center">
					        <td><?= $row['countryId']; ?></td>
					        <td><?= $row['name']; ?></td>
					        <td><?= $row['slug']; ?></td>
					        <td><?= $row['continentId']; ?></td>
					        <td>
					        	<a href="functionality-system.php?country-delete=<?= $row['countryId']; ?>" class="badge badge-danger p-2" onClick="return confirm('Do you want to delete this record?');">Delete</a> |
					        	<a href="functionality-manager.php?country-edit=<?= $row['countryId']; ?>" class="badge badge-success p-2">Edit</a>
					        </td>
					    </tr>
				  		<?php } ?>
				    </tbody>
				  </table>
			</div>
		</div>

		<!-- row -->
		<div class="row justify-content-center">
			<div id="continent-container" class="col-md-5" style="display: none">
				<div align="center">
					<?php if($continent_update == true){ ?>
                    	<button type="button" data-toggle="modal" data-target="#continent_popup" class="btn btn-warning">Update Continent</button>
                    <?php } else { ?>
						<button type="button" data-toggle="modal" data-target="#continent_popup" class="btn btn-warning">Add Continent</button>
                    <?php } ?>
                </div>

                <hr>

                <?php $result = getAllIndex("r_continent"); ?>

				<table class="table table-hover" id="table-data">
				    <thead>
					    <tr class="text-center">
					        <th>#</th>
					        <th>Name</th>
					        <th>Slug</th>
					        <th>Action</th>
					    </tr>
				    </thead>
				    <tbody>
				    	<?php while($row = $result->fetch_assoc()){ ?>
					    <tr class="text-center">
					        <td><?= $row['continentId']; ?></td>
					        <td><?= $row['name']; ?></td>
					        <td><?= $row['slug']; ?></td>
					        <td>
					        	<a href="functionality-system.php?continent-delete=<?= $row['continentId']; ?>" class="badge badge-danger p-2" onClick="return confirm('Do you want to delete this record?');">Delete</a> |
					        	<a href="functionality-manager.php?continent-edit=<?= $row['continentId']; ?>" class="badge badge-success p-2">Edit</a>
					        </td>
					    </tr>
				  		<?php } ?>
				    </tbody>
				  </table>
			</div>

			<div id="role-container" class="col-md-5" style="display: none">
				<div align="center">
					<?php if($role_update == true){ ?>
                    	<button type="button" data-toggle="modal" data-target="#role_popup" class="btn btn-warning">Update Role</button>
                    <?php } else { ?>
						<button type="button" data-toggle="modal" data-target="#role_popup" class="btn btn-warning">Add Role</button>
                    <?php } ?>
                </div>

                <hr>

                <?php $result = getAllIndex("r_role"); ?>

				<table class="table table-hover" id="table-data">
				    <thead>
					    <tr class="text-center">
					        <th>#</th>
					        <th>Name</th>
					        <th>Slug</th>
					        <th>Action</th>
					    </tr>
				    </thead>
				    <tbody>
				    	<?php while($row = $result->fetch_assoc()){ ?>
					    <tr class="text-center">
					        <td><?= $row['roleId']; ?></td>
					        <td><?= $row['name']; ?></td>
					        <td><?= $row['slug']; ?></td>
					        <td>
					        	<a href="functionality-system.php?role-delete=<?= $row['roleId']; ?>" class="badge badge-danger p-2" onClick="return confirm('Do you want to delete this record?');">Delete</a> |
					        	<a href="functionality-manager.php?role-edit=<?= $row['roleId']; ?>" class="badge badge-success p-2">Edit</a>
					        </td>
					    </tr>
				  		<?php } ?>
				    </tbody>
				  </table>
			</div>		
		</div>
	</div>


	<!-- Popup -->
	<div id="city_popup" class="modal fade">  
		<!-- Modal Dialog -->
	    <div class="modal-dialog">
	    	<!-- Modal Content -->
	        <div class="modal-content">
	        	<!-- Modal Header -->
	            <div class="modal-header">
	                <h4 class="modal-title">City</h4> 
	                <button type="button" class="close" data-dismiss="modal">&times;</button>  
	            </div>

				<!-- Modal Body -->
	            <div class="modal-body"> 
	            	<!-- Form -->
					<form action="functionality-system.php" method="post" enctype="multipart/form-data">
						<div class="input-group mb-2">
							<input type="hidden" name="id" value="<?= $cityId;?>">

							<input class="form-control mr-sm-2" type="text" name="name" value="<?= $cityName;?>" placeholder="City Name">

	                    	<select name="countryId" id="countryId" value="<?= $countryId;?>" class="form-control">

	                      		<?php 
	                      			$result = getAllIndex("r_country");
	                      			while($row = $result->fetch_assoc()){ ?>
	                           		<option value="<?= $row['countryId']; ?>"><?= $row['name']; ?></option>  
	                        	<?php } ?>
	                    	</select> 
						</div>

						<div class="form-group">
							<?php if($city_update == true){ ?>
		                    	<button class="btn btn-warning" type="submit" name="update-city">Update</button>
		                    <?php } else { ?>
								<button class="btn btn-primary" type="submit" name="add-city">Add</button>
		                    <?php } ?>
						</div>
					</form>
	            </div>   
	        </div>  
	    </div>  
	</div>

	<!-- Popup -->
	<div id="country_popup" class="modal fade">
		<!-- Modal Dialog -->
	    <div class="modal-dialog">
	    	<!-- Modal Content -->
	        <div class="modal-content">
	        	<!-- Modal Header -->
	            <div class="modal-header">
	                <h4 class="modal-title">Country</h4> 
	                <button type="button" class="close" data-dismiss="modal">&times;</button>  
	            </div>

				<!-- Modal Body -->
	            <div class="modal-body"> 
	            	<!-- Form -->
					<form action="functionality-system.php" method="post">
						<div class="input-group mb-2">
							<input type="hidden" name="id" value="<?= $countryId;?>">

							<input class="form-control mr-sm-2" type="text" name="name" value="<?= $countryName;?>" placeholder="Country Name">

	                    	<select name="continentId" id="continentId" value="<?= $continentId;?>" class="form-control">
	                      		<?php 
	                      			$result = getAllIndex("r_continent");

	                      			while($row = $result->fetch_assoc()){ ?>
	                           		<option value="<?= $row['continentId']; ?>"><?= $row['name']; ?></option>  
	                        	<?php } ?>
	                    	</select> 
	                    </div>

						<div class="form-group">
							<?php if($country_update == true){ ?>
		                    	<button class="btn btn-warning" type="submit" name="update-country">Update</button>
		                    <?php } else { ?>
								<button class="btn btn-primary" type="submit" name="add-country">Add</button>
		                    <?php } ?>
						</div>
					</form>
	            </div>   
	        </div>  
	    </div>  
	</div>

	<!-- Popup -->
	<div id="continent_popup" class="modal fade">
		<!-- Modal Dialog -->  
	    <div class="modal-dialog">
	    	<!-- Modal Content -->
	        <div class="modal-content">
	        	<!-- Modal Header -->
	            <div class="modal-header">
	                <h4 class="modal-title">Continent</h4> 
	                <button type="button" class="close" data-dismiss="modal">&times;</button>  
	            </div>

	            <!-- Modal Body -->
	            <div class="modal-body"> 
	            	<!-- Form -->
					<form action="functionality-system.php" method="post">
						<div class="form-group">
							<input type="hidden" name="id" value="<?= $continentId;?>">

							<input class="form-control mr-sm-2" type="text" name="name" value="<?= $continentName;?>" placeholder="Continent Name">
						</div>

						<div class="form-group">
							<?php if($continent_update == true){ ?>
		                    	<button class="btn btn-warning" type="submit" name="update-continent">Update</button>
		                    <?php } else { ?>
								<button class="btn btn-primary" type="submit" name="add-continent">Add</button>
		                    <?php } ?>
						</div>
					</form>
	            </div>   
	        </div>  
	    </div>  
	</div>

	<!-- Popup -->
	<div id="role_popup" class="modal fade"> 
		<!-- Modal Dialog -->   
	    <div class="modal-dialog">
	    	<!-- Modal Content -->  
	        <div class="modal-content">
	        	<!-- Modal Header -->  
	            <div class="modal-header">
	                <h4 class="modal-title">Role</h4> 
	                <button type="button" class="close" data-dismiss="modal">&times;</button>  
	            </div>

	            <!-- Modal Body -->  
	            <div class="modal-body">
	            	<!-- Form -->   
					<form action="functionality-system.php" method="post">
						<div class="input-group mb-2">
							<input type="hidden" name="id" value="<?= $roleId;?>">

							<input class="form-control mr-sm-2" type="text" name="name" value="<?= $roleName;?>" placeholder="Role Name">

							<input class="form-control mr-sm-2" type="text" name="description" value="<?= $roleDesc;?>" placeholder="Short description">
						</div>

						<div class="form-group">
							<?php if($role_update == true){ ?>
		                    	<button class="btn btn-warning" type="submit" name="update-role">Update</button>
		                    <?php } else { ?>
								<button class="btn btn-primary" type="submit" name="add-role">Add</button>
		                    <?php } ?>
						</div>
					</form>
	            </div>   
	        </div>  
	    </div>  
	</div>


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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