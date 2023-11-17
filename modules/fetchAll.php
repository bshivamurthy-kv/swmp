<?php

include ('../classes/class.commonfunction.php');
$common = new CommonFunction();
if($_GET['pagename'] == 'getshops')
{
	
	$selectconall = array(
			'route_id' =>$_GET['selectedid'],
			'deleted' => '0'
	);
	$roots = $common->commonselectconall($selectconall, $_GET['table'], $conection, $_GET['customer_id']);	
	print_r($roots);
}

?>


