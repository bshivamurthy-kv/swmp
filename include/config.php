<?php
define("USER", "akrutb2t_SMWP");
define("PASS", "admin@123");
define("DB", "akrutb2t_SMWP");
define("HOST", "192.185.129.60");

// SQL server connection information
$sql_details = array(
	'user' => USER,
	'pass' => PASS,
	'db'   => DB,
	'host' => HOST
);

class config
{
	function dbconnection() 
	{
		
	    $con=mysqli_connect(HOST,USER,PASS,DB);
		if(!$con)
		{
		    echo "Error: Unable to connect to MySQL." . PHP_EOL;
		    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
		else
		{
		   // echo "test=".$con;
		}
		return $con;
		
		//mysqli_close($con);
		
   }
}

$required = "This Filed is Required";

$onlyrequired = "Required";
$Emailvalidation = "Invalid Email Address";
$retypepass = "Password Must Match";
$remote = "Email is Already Exits";

$numbervalidate = "Countact Number Must be a Number";

$tag = array('NO','Thatu','Grue','T/G','SB','CC','BS','BSS','stock','Order');
$orderStatues = array('Pending', 'Delevired', 'Canceled');
$orderStock = array('In Stock','Out Stock'); 

$colors = array('A4','A14','A13','A3','NT', 'AT', 'CY','NR','WL','IT','MT','WG','WT',
		'CT','PR','TX','GL','LL');

$h = array('0','1/2', '1/4', '1/8','3/4','3/8','5/8','7/8');


if(@$_SESSION['user_deatils']['id'] == '1')
{
	$selectmaindoors = "( main_door LIKE '1|%' OR main_door LIKE '2|%' OR main_door LIKE '3|%' OR main_door LIKE '4|%' OR main_door LIKE '5|%' OR main_door LIKE '12|%' OR main_door LIKE '43|%'  OR main_door LIKE '39|%'  OR main_door LIKE '37|%'  OR main_door LIKE '38|%'  OR main_door LIKE '34|%'  OR main_door LIKE '33|%'  OR main_door LIKE '32|%' OR main_door LIKE '31|%' )";
}
if(@$_SESSION['user_deatils']['id'] == '8')
{
	$selectmaindoors = "( main_door LIKE '16|%' OR main_door LIKE '6|%' OR main_door LIKE '7|%' OR main_door LIKE '8|%' OR main_door LIKE '9|%' OR main_door LIKE '17|%' OR main_door LIKE '19|%' OR main_door LIKE '21|%' OR main_door LIKE '23|%' OR main_door LIKE '25|%' OR main_door LIKE '40|%' OR main_door LIKE '36|%' OR main_door LIKE '35|%' OR main_door LIKE '30|%' OR main_door LIKE '29|%' OR main_door LIKE '28|%' OR main_door LIKE '27|%' OR main_door LIKE '26|%' OR main_door LIKE '42|%')";
}

if(@$_SESSION['user_deatils']['id'] == '5')
{
	$selectmaindoors = "( main_door LIKE '10|%' OR main_door LIKE '11|%' OR main_door LIKE '13|%' OR main_door LIKE '14|%' OR main_door LIKE '15|%' OR main_door LIKE '41|%' OR main_door LIKE '44|%')";
}

if(@$_SESSION['user_deatils']['id'] == '15')
{
	$selectmaindoors = "( main_door LIKE '46|%' OR main_door LIKE '47|%' OR main_door LIKE '48|%' OR main_door LIKE '49|%' OR main_door LIKE '50|%' OR main_door LIKE '51|%' OR main_door LIKE '52|%' OR main_door LIKE '53|%' OR main_door LIKE '54|%' OR main_door LIKE '55|%' OR main_door LIKE '56|%' OR main_door LIKE '57|%' OR main_door LIKE '45|%')";
}
?>