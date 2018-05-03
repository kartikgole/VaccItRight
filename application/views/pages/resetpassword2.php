
	<?php
 
//cnnect to the database
  $db = new mysqli("localhost","root","","vaccitright");
//echo $_SESSION['msg'];
$msg="";
	
//check if the user is present in the database

if ( isset( $_POST['resetpassword'] ) ) 
 {
$email=trim($_POST['email']);
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$query = "SELECT email FROM user WHERE email='$email'";
$result=$db->query($query);  
$row = $result->fetch_array();
$rowcount=mysqli_num_rows($result);
if($rowcount==0)
{
	$msg="user not registered";
}
else
{
	if($password==$cpassword)
	{
	
//update the database
$query = "UPDATE user SET password='$password' WHERE email='$email' ";
$result=$db->query($query);
redirect('/index.php/Pages/login','refresh');
//header("Location:login.php");
	
	}
	else
	{
		$msg="passwords dont match";
	}
}


$code=trim($_POST['cc']);
$query = "SELECT email,code FROM passwordcode WHERE email='$email'";
$result=$db->query($query);  
$row = $result->fetch_array();
$email=$row[0];
$password=$row[1];
if($code==$password)
{
	
}
else
{
	$msg="Your confirmation code is incorrect";

 }



	
 }
	
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
        <div class="panel with-nav-tabs panel-info">
			<div class="panel-body">
				<div class="tab-content">
                  <div id="login" class="tab-pane fade in active register">
                     <div class="container-fluid">
                        <div class="row">
                              <h2 class="text-center" style="color: #204d74;"> <strong> RESET PASSWORD  </strong></h2><hr />
							  
							    <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Pages/resetpassword2" method="post">
							  
							 <center> 
							 <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group">
                                          
                                         <p style="color:red;"><?php echo $msg;?></p>
                                       </div>
                                    </div>
                                 </div>
                              </div></center>

                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-user"></span>
                                          </div>
                                          <input type="text" placeholder="Enter registered email" name="email" class="form-control" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>
							  <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-user"></span>
                                          </div>
                                          <input type="password" placeholder="Enter password" name="password" class="form-control" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>
							   <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-user"></span>
                                          </div>
                                          <input type="password" placeholder="Confirm Password" name="cpassword" class="form-control" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                   

                             
                              <hr />
						
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                   <input type="submit" class="btn btn-primary btn-lg btn-block" name="resetpassword" value="Reset Password">
                                 </div>
                              </div>
                         </form>
                        </div>
                     </div> 
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 
	</body>
</html>
