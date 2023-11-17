<?php
include ('../classes/class.commonfunction.php');
include "../include/config.php";
$dbconn=new config();
$conection = $dbconn->dbconnection();
$common = new CommonFunction();
if(@$_GET['pagename'] == 'Addstocks')
{
	
	$selectconall = array(
            'main_door' =>$_GET['main_door'],
            'sub_door' =>$_GET['sub_door'],
            'status' =>$_GET['changedval'],
			'deleted' => '0'
	);
    $roots = $common->getcount($selectconall ,'tbl_stocks',$conection);
    print_r($roots['totalcount']);

	
	
	

	
}



?>


