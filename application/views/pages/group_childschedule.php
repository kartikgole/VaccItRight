<?php

$db = new mysqli("localhost","root","","vaccitright");
$userid=$this->session->userdata('userid');
if ( isset( $_POST['deleteaccount'] ) ) 
 {
$query = "SELECT childid from child where userid='$userid'";
       if($result = mysqli_query($db, $query)){
        if(mysqli_num_rows($result) > 0){
      
          while($row = mysqli_fetch_array($result))
          {
			  $childid=$row['childid'];
			 $query3 = "DELETE FROM vacc_child WHERE childid='$childid'";
             $sql = $db->query($query3); 
			 $query3 = "DELETE FROM evacc_child WHERE childid='$childid'";
             $sql = $db->query($query3); 
			 $query3 = "DELETE FROM child WHERE childid='$childid'";
             $sql = $db->query($query3); 
			 
			  
	   } }}
		  $query3 = "DELETE FROM user WHERE userid='$userid'";
             $sql = $db->query($query3); 
header("Location:home.html");	 
	 
	 
	 
	 
	 
 }
if ( isset( $_POST['sendcc'] ) ) 
 {
$email=trim($_POST['email']);
$query = "SELECT email,password FROM user WHERE email='$email'";
$result=$db->query($query);  
$row = $result->fetch_array();
$email=$row[0];
$password=$row[1];
$alphaLength = strlen($password) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $password[$n];
    }
$code=implode($pass);
//store this detail in password code
$query3 = "INSERT INTO passwordcode (email, password, code) VALUES('$email','$password','$code')";
$sql = $db->query($query3);
//send an email




require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$email=$_POST['email'];
// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sakshyaraghavan@gmail.com';
$mail->Password = 'incorrect@0';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('no-reply-email@vaccitright.com', 'VaccitRight');
$mail->addReplyTo('no-reply-email@vaccitright.com', 'Vaccitright');

// Add a recipient
$mail->addAddress($email);

// Add cc or bcc 

// Email subject
$mail->Subject = 'Password Reset Code';

// Set email format to HTML
$mail->isHTML(true);

// Email body content
$mailContent = "<h1>Reset Code</h1>
    <p>Your password reset code is :</p>
	<p><b>".$code."</b></p>
	<p>Thanks,</p>
	<p>Vaccitright team</p>
	";
	
$mail->Body = $mailContent;

// Send email
if(!$mail->send()){
  //  echo 'Message could not be sent.';
   // echo 'Mailer Error: ' . $mail->ErrorInfo;
   // $feedbackmsg="Enter valid email address";
}else{
  //  $feedbackmsg="Feedback sent successfully";
}


redirect('/index.php/Pages/resetPassword1','refresh');
//header("Location:resetpassword1.php");



	 
	 
	 
	 
	 
 }
?>

<div class="modal fade" id="forgot" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Change Password?</b></h4>
        </div>
        <div class="modal-body">
          <p>Type your registered email to change your password</p>
          
		  <form class="form-horizontal" role="form" action="group_childschedule.php" method="post">
		   <center><div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group">
                                          
                                          <input type="text" placeholder="Enter registered email" name="email" class="form-control">
                                       </div>
                                    </div>
                                 </div>
                              </div>
			<div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group"> 
                                         <input type="submit" class="btn btn-success btn-block" name="sendcc" value="Send>">
                                       </div>
                                    </div>
                                 </div>
                              </div>

		  </center>
		  </form>
		  
		 
        </div>
      </div>
      
    </div>
  </div> 



  
  
  






<div id="wrapper">
<div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
					<center><p style="color:white;padding-top:10px;">KNOW YOUR VACCINES</p></center>
                    <li>
                        <a data-toggle="modal" href="#myModal"data-scroll>
                            <span class="fa fa-anchor solo">DTaP</span>
                        </a>
												
                    </li>
                    <li>
                        <a data-toggle="modal" href="#hepaModal"data-scroll>
                            <span class="fa fa-anchor solo">HepA</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" href="#hepbModal" data-scroll>
                            <span class="fa fa-anchor solo">HepB</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" href="#hibModal" data-scroll>
                            <span class="fa fa-anchor solo">Hib</span>
                        </a>
                    </li>
					 <li>
                        <a data-toggle="modal" href="#ipvModal" data-scroll>
                            <span class="fa fa-anchor solo">IPV</span>
                        </a>
                    </li>
					 <li>
                        <a data-toggle="modal" href="#mmrModal" data-scroll>
                            <span class="fa fa-anchor solo">MMR</span>
                        </a>
                    </li>
					 <li>
                        <a data-toggle="modal" href="#pcvModal" data-scroll>
                            <span class="fa fa-anchor solo">PCV</span>
                        </a>
                    </li>
					 <li>
                        <a data-toggle="modal" href="#rotaModal" data-scroll>
                            <span class="fa fa-anchor solo">Rota</span>
                        </a>
                    </li>
					 <li>
                        <a data-toggle="modal" href="#varModal" data-scroll>
                            <span class="fa fa-anchor solo">VAR</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
		
		
<div class="page-content inset" data-spy="scroll" data-target="#spy">
    <div class="container">    
        <div id="loginbox"  style="margin-top:-25px;"class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Create a New Schedule</div>
                        
                    </div>     
					
                    <div style="padding-top:30px" class="panel-body" >
						
						<div style="color:red"><?php if(isset($msg)){echo validation_errors();}?></div>
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Pages/addnewschedule" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group-center">
                                      
                                    <input id="childname" type="text" class="form-control" name="cfname" value=""  placeholder="Child First Name"  required>                                        
                                 
							</div>
							<div style="margin-bottom: 25px" class="input-group-center">
                                      
                                    <input id="childname" type="text" class="form-control" name="clname" value=""  placeholder="Child Last Name" >                                        
                                 
							</div>
							<div style="margin-bottom: 25px" >
                                      
                                   <select name="sex" class="form-control">
                                        <option value="Male" selected>Male</option>
										<option value="Female">Female</option>
                                   </select>                                        
                                 
							</div>
                                
                            <div style="margin-bottom: 25px" class="input-group-center">
							 
                                        <input id="birthdate" type="date"  required="true" class="form-control" name="birthdate" placeholder="Birth Date" >
                                  
									</div>
                                    

                                
                         


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                  <center>
                                    <div class="col-sm-12 controls">
                                      <input type="submit" class="btn btn-danger btn-md btn-block" name="addchildandmakescedule" value="Create Schedule">
                                     
                                    </div>
									</center>
                                </div>
                           </form>
						   <form action="<?php echo base_url();?>index.php/Pages/viewSchedules" id="loginform" class="form-horizontal" role="form" method="post" >

                                <div class="form-group">
                                    <div class="col-md-12 control">
									
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                         <center>   
                                        <input type="submit" class="btn btn-warning btn-md btn-block" name="oeschedule" value="Open Existing Schedule">
										</center>
                                        </div>
                                    </div>
                                </div>    
                            </form>     
                            <form action="<?php echo base_url();?>index.php/Pages/comparepageopen" id="loginform" class="form-horizontal" role="form" method="post" >

                                <div class="form-group">
                                    <div class="col-md-12 control">
									
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                         <center>   
                                        <input type="submit" class="btn btn-success btn-md btn-block" name="oeschedule" value="Compare Symptoms">
										</center>
                                        </div>
                                    </div>
                                </div>    
                            </form> 


                        </div>                     
                    </div>  
        </div>
        
                    </div>
					</div>
					</div>
		 <!-- Modal Dtap starts here-->			
		<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Diphtheria, tetanus, and acellular pertussis (DTaP) vaccine</b></h4>
        </div>
        <div class="modal-body">
          <p>4-dose series at 2, 4, 6, and 15 to 18 months</p>
<p><b>Prospectively:</b> A 4th dose may be given as early as age 12 months if at least 6 months have elapsed since the 3rd dose.</p>
<p><b>Retrospectively:</b> A 4th dose that was inadvertently given as early as 12 months may be counted if at least 4 months have elapsed since the 3rd dose.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  
  
  <div class="modal fade" id="hepbModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Hepatitis B (HepB) vaccine</b></h4>
        </div>
        <div class="modal-body">
          <p>A complete series is 3 doses at 0, 1 to 2, and 6 to 18 months</p>
<p>Infants who did not receive a birth dose should begin the series as soon as feasible </p>
<p>Administration of 4 doses is permitted when a combination vaccine containing HepB is used after the birth dose</p>
<p><b>Minimum age for the final dose: </b>24 weeks</p>
<p><b>Minimum intervals: </b>Dose 1 to Dose 2: 4 weeks / Dose 2 to Dose 3: 8 weeks / Dose 1 to Dose 3: 16 weeks</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
   <div class="modal fade" id="hibModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Haemophilus influenzae type b (Hib) conjugate vaccines</b></h4>
        </div>
        <div class="modal-body">
          <p><b>ActHIB, Hiberix, or Pentacel:</b> 4 to dose series at 2, 4, 6, and 12 to 15 months.</p>
<p><b>PedvaxHIB: </b>3-dose series at 2, 4, and 12 to 15 months.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>




 <!-- Modal Dtap starts here-->			
		<div class="modal fade" id="hepaModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Hepatitis A (HepA) vaccine</b></h4>
        </div>
        <div class="modal-body">
          <p>2 doses, separated by 6 to 18 months, between the 1st and 2nd birthdays</p>
          <p><b>Previously unvaccinated persons who should be vaccinated:</b></p>
		  <p>Persons traveling to or working in countries with high or intermediate HepA endemicity</p>
		  <p>Users of injection and non-injection drugs</p>
		  <p>Persons who work with hepatitis A virus in a research laboratory or with non-human primates</p>
		  <p>Persons with clotting-factor disorders</p>
		  <p>Persons with chronic liver disease</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>  
  
  
  
  <div class="modal fade" id="ipvModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Inactivated poliovirus vaccine</b></h4>
        </div>
        <div class="modal-body">
          <p>3-dose series at ages 2, 4, 6 to 18 months</p>
          
		  <p>In the first 6 months of life, use minimum ages and intervals only for travel to a polio-endemic region or during an outbreak</p>
		  <p>Users of injection and non-injection drugs</p>
		  <p>IPV is not routinely recommended for U.S. residents 18 years of age and older</p>
		 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 




<div class="modal fade" id="mmrModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Measles, mumps, and rubella (MMR) vaccine</b></h4>
        </div>
        <div class="modal-body">
          <p>2 dose series at 12 to 15 months. The 2nd dose may be given as early as 4 weeks after the 1st dose</p>
          
		  <p>Unvaccinated children and adolescents: 2 doses at least 4 weeks apart</p>
		  
		 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>   

  
  <div class="modal fade" id="pcvModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Pneumococcal vaccines</b></h4>
        </div>
        <div class="modal-body">
          <p>4-dose series at 2, 4, 6, and 12 to 15 months</p>
          
		  <p>Administer PCV13 doses before PPSV23 if possible</p>
		  
		 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  
  
  <div class="modal fade" id="rotaModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Rotavirus vaccines</b></h4>
        </div>
        <div class="modal-body">
          <p><b>Rotarix:</b> 2 dose series at 2 and 4 months</p>
<p><b>RotaTeq: </b>3 dose series at 2, 4, and 6 months</p>
<p>If any dose in the series is either RotaTeq or unknown, default to 3-dose series</p>
          
		  
		 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  
  <div class="modal fade" id="varModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Varicella (VAR) vaccine</b></h4>
        </div>
        <div class="modal-body">
          <p>2 dose series: 12 to 15 months</p>
<p>The 2nd dose may be given as early as 3 months after the 1st dose </p>
          
		  
		 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  
  
  
  
  




  

</body>
</html>