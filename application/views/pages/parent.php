<!DOCTYPE html>
<html lang="en">

<head>
	<title>MyChildVaccine</title>
	<meta charset="utf-8">
	<link href="css/vaccine.css" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">
</head>

<body>
	<div class="container">
		<div class="row">

			<p></p>


			<div class="col-md-10 col-md-offset-1">

				<div class="panel panel-default panel-table">
					<div class="panel-heading">
						<div class="row">
							<div class="col col-xs-6">
								<h3 class="panel-title">Parent Details</h3>
							</div>
						</div>
					</div>

					<div class="panel-body">
						<form method="post" action="<?php echo base_url();?>index.php/Pages/adminHome">

				<label for="firstName">First Name:</label>
				<p><?php echo $fname?></p><br>
				
				<label for="Name">Last Name:</label>
				<p><?php echo $lname?></p><br>

				<label for="myPhone">email Id:</label>
				<p><?php echo $email?></p><br>

				<label for="myDate">Child Name:</label>
				<p><?php echo $cfname?></p><br>
				
				<label for="myDate">Age:</label>
				<p><?php echo $age?></p><br>

				<input type="submit" class="btn btn-info" name="submit" value="Accounts">
			</form>
					</div>

				</div>

			</div>
		</div>
	</div>
</body>

</html>