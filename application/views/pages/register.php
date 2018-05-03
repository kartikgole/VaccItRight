<?php if ( isset( $_POST['register'] ) ) 
 {
  $msg=$message;
 }

 else{
   $msg='';
 }
 ?>
	<div class="container">
		<div class="row">
			<div>
                <div class="container-fluid">
                    <div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
              <div style="color:blue"><?php if(isset($msg)){echo validation_errors();}?></div>
                        <h2 class="text-center" style="color: #204d74;"> <Strong> Register </Strong></h2> <hr />
						 <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Pages/registration" method="post">
						<center> <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                       
                                       <p style="color:red;"><?php echo $msg; ?></p>
                                    </div>
                                </div>
							</div>
						</div>
						</center>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga1">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" value="<?php echo set_value('fname'); ?>">
                                    </div>
                                </div>
							</div>
						</div>
						
						<div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga1">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" value="<?php echo set_value('lname'); ?>">
                                    </div>
                                </div>
							</div>
						</div>
						<div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga1">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                      <div style="margin-bottom: 25px" >
                                      
                                   <select name="sex" class="form-control">
                                        <option value="Male" selected>Male</option>
										<option value="Female">Female</option>
                                        
             
                                   </select>                                        
                                 
							</div>
									  
									  
                                    </div>
                                </div>
							</div>
						</div>
						<div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga1">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter age" name="age" value="<?php echo set_value('age'); ?>">
                                    </div>
                                </div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                             </div>
                                             <input type="email" class="form-control" placeholder="Enter E-Mail" name="email" value="<?php echo set_value('email'); ?>">
                                          </div>
                                </div>
                            </div>
                        </div>

                                 <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span class="glyphicon glyphicon-lock"></span>
                                             </div>
                                             <input type="password" class="form-control" placeholder="Enter Password" name="pass">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
								 <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span class="glyphicon glyphicon-lock"></span>
                                             </div>
                                             <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <hr>
								 <div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">already a user?
                                       <a href="<?php echo base_url();?>index.php/Pages/login" >Click here to login</a>
                                    </div>
							  </div>
                                 <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                             <input type="submit" class="btn btn-danger btn-lg btn-block" name="register" value="Register">
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
</body>
</html>
