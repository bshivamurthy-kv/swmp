<?php 
session_start();
ob_start();


error_reporting(0);
//ini_set('post_max_size', '500M');
//ini_set('upload_max_filesize', '500M');
include "include/config.php";
$dbconn=new config();
$conection = $dbconn->dbconnection();
//echo "test=".$conection;
include "sessions/session.php";
$session=new Session();
$setsession=$session->checksession(@$_SESSION['user_deatils']);
$roo_path="//".$_SERVER['SERVER_NAME']."/swmp/";

//$admin_email='support@constructplanet.com';
//$admin_ccemail='ksbakkesh@gmail.com';
//$welcomeemail = 'Thank you for Registering Construct Planet';


//echo "<pre>";
//print_r($$_REQUEST);
 if($setsession==1)
{ 

 
		  if(isset($_REQUEST['program']))
		  {	  	
		      //echo "ssss="."modules/".$_REQUEST['program'].".php";
				  include "include/header.php";
				  include "modules/".$_REQUEST['program'].".php";
				  include "include/footer.php";
		  
		  }
		  else 
		  {
				  
				  include "include/header.php";
				  include("modules/index.php");
				  include "include/footer.php";	
		  }
 }
 else 
		  { 
		      include "include/header.php";
		      include("modules/index.php");
		      include "include/footer.php";	
		  } 

?>
