<?php
ob_start();
session_start();
require('settings/core.php');
require('settings/authorize.php');
$user=$_SESSION['user'];

$userquery= "select * from sanjay_plus where u_user='$user'";
$userquery=$sp->query($userquery) or die($sp->error);
$info=$userquery->fetch_object();
?>  

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
    <title><?php echo ucfirst($user);?> | ADMIN+</title>
    <link rel="stylesheet" href="css/app.css" />
    <script src="bower_components/modernizr/modernizr.js"></script>
    
    
  </head>
  <body>
  <!--Navigation starts-->
   <?php include 'navigation.php';?>
  <!--Navigation ends -->

	<div class="large-1 columns">
	<!--sidebar-->
   <?php include 'sidebar.php';?>
   <!--sidebar ends -->
	</div>

	  
	<div class="large-11 columns">	  
	  <?php
	  $page=@$_REQUEST['page'];
	  
	  switch($page){
		
		case($page=='main'):
		include('apps/main.php');
		break; 
		
		case($page=='password'):
		include('apps/password.php');
		break;
		case($page=='logout'):
		include('apps/logout.php');
		break;
		
		case($page=='info'):
		include('apps/info.php');
		break;
		
		case($page=='profile'):
		include('apps/profile.php');
		break;
		
		default:
		include('apps/main.php');
		break;  
		  
		  
		}
	  
	  ?>
	</div>
<?php
$userquery->close();
?>
 
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/reveal.js"></script>
  </body>
</html>
