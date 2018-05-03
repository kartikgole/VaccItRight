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


			<div class="col-md-5 col-md-offset-1">

				<div class="panel panel-default panel-table">
					<div class="panel-heading">
						<div class="row">
							<div class="col col-xs-6">
								<h3 class="panel-title">Parent Accounts</h3>
							</div>

						</div>
					</div>

					<div class="panel-body">
						<p>
							 <form action="<?php echo base_url();?>index.php/Pages/getParentDetails" id="loginform" class="form-horizontal" role="form" method="post" >
<?php
 foreach($parent as $row):
 ?>
 							<input type="submit" class="btn btn-success btn-lg btn-block" name="pname"  value="<?php echo $row['fname'];?>"> <br> <br>
<?php 
				endforeach;?>   
				</form>						
						</p>


					</div>

				</div>

			</div>
		</div>
	</div>
</body>

</html>