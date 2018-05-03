<html>
<head>
<title>MyChildVaccine</title>
	<meta charset="utf-8">
	<link href="<?php echo base_url();?>css/vaccine.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/styles.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" type="text/css">
	<script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">
<style>

@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
  font-family: 'Open Sans', 'sans-serif';
}


.carousel-control {
  width: 30px;
  height: 30px;
  top: -35px;

}
.left.carousel-control {
  right: 30px;
  left: inherit;
}
.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right {
  font-size: 12px;
  background-color: #fff;
  line-height: 30px;
  text-shadow: none;
  color: #333;
  border: 1px solid #ddd;
}

.navbar{
    border-radius: 0px !important
	width:100% !important;
}

.panel-info {
    border-color: #696768 !important;
	}

.panel-info>.panel-heading {
    color: #e7eef1 !important;
    background-color: #4a4d4e !important;
    border-color: #696768 !important;
	 

}
#wrapper {
  padding-left: 250px;
  transition: all 0.4s ease 0s;
}

#sidebar-wrapper {
  margin-left: -250px;
  left: 250px;
  width: 250px;
  background: #222;
  position: fixed;
  height: 100%;
  overflow-y: auto;
  z-index: 1000;
  transition: all 0.4s ease 0s;
  margin-top: -20px;
}

#wrapper.active {
  padding-left: 0;
}

#wrapper.active #sidebar-wrapper {
  left: 0;
}

#page-content-wrapper {
  width: 100%;
}



.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  list-style: none;
  margin: 0;
  padding: 0;
  
}

.sidebar-nav li {
  text-indent: 20px;
}

.sidebar-nav li a {
  color: #999999;
  display: block;
  text-decoration: none;
  padding-left: 60px;
}

.sidebar-nav li a span:before {
  position: absolute;
  left: 0;
  color: #41484c;
  text-align: center;
  width: 20px;
  line-height: 18px;
}

.sidebar-nav li a:hover,
.sidebar-nav li.active {
  color: #fff;
  background: rgba(255,255,255,0.2);
  text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  height: 65px;
  line-height: 60px;
  font-size: 18px;
}

.sidebar-nav > .sidebar-brand a {
  color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}



.content-header {
  height: 65px;
  line-height: 65px;
}

.content-header h1 {
  margin: 0;
  margin-left: 20px;
  line-height: 65px;
  display: inline-block;
}

#menu-toggle {
    text-decoration: none;
}

.btn-menu {
  color: #000;
} 

.inset {
  padding: 20px;
}

@media (max-width:767px) {

#wrapper {
  padding-left: 0;
}

#sidebar-wrapper {
  left: 0;
}

#wrapper.active {
  position: relative;
  left: 250px;
}

#wrapper.active #sidebar-wrapper {
  left: 250px;
  width: 250px;
  transition: all 0.4s ease 0s;
}

#menu-toggle {
  display: inline-block;
}

.inset {
  padding: 15px;
}

#sidebar-wrapper{

    top: 50px !important;
}

#spy a{
padding-top:5px !important;
padding-bottom: 5px !important;
}
</style>
<script>
	function myFunction() {
    window.print();
}
	/*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});

    /*Smooth link animation*/
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

</script>

</head>
<body>
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
          
      <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Pages/loginHome" method="post">
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
<div class="modal fade" id="deleteacc" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Delete Account?</b></h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete your account?</p>
          <p>Remember you will lose all your information</p>
		  <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Pages/deleteaccount" method="post">
		   <center>
			<div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group"> 
                                         <input type="submit" class="btn btn-success btn-block" name="deleteaccount" value="Delete Account">
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
<?php 

//cnnect to the database
$db = new mysqli("localhost","root","","vaccitright");

$userid = $this->session->userdata('userid');
?>
<div class="container-fullwidth">
  <nav class="navbar navbar-inverse" >
    <div class="navbar-header">
		<a class="navbar-brand" href="#" style="color:orange">VaccItRight</a>
	</div>
	
	<div class="collapse navbar-collapse js-navbar-collapse">
		
        <ul class="nav navbar-nav fright">
    
		<li class="dropdown">
          <a href="<?php echo base_url();?>index.php/Pages/loginHome">Home</span></a>
        </li>
        <li class="dropdown">
          <a href="<?php echo base_url();?>index.php/Pages/viewInfo">General Information</span></a>
        </li>
		  <li class="dropdown ">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
							<span class="caret"></span></a>
							<ul class="dropdown-menu ">
							  <li><a data-toggle="modal" href="#forgot" data-scroll>Change Password</a></li>
							  <li><a data-toggle="modal" href="#deleteacc" data-scroll>Delete Account</a></li>
							</ul>
						  </li>
        <li><a href="<?php echo base_url();?>index.php/Pages/logout">Logout</a></li>
     
	  
						
						</ul>
	</div><!-- /.nav-collapse -->
  </nav>
</div>