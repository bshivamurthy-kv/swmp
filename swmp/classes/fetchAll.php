<?php
ob_start();
include ('../classes/class.commonfunction.php');
include "../include/config.php";
$dbconn=new config();
$conection = $dbconn->dbconnection();
$common = new CommonFunction();
if(@$_GET['pagename'] == 'getshops')
{
	
	$selectconall = array(
			$_GET['selected_col'] =>$_GET['selectedid'],
			'deleted' => '0'
	);

	$orderby = ($_GET['table'] == 'tbl_sub_doors')?'sub_door_id':$_GET['selected_col'];
	$roots = $common->commonselectconall($selectconall, $_GET['table'], $conection, $orderby);

	
	
	if($roots!=0){
		if($_GET['table'] == 'tbl_root')
		echo '<option value="">Select Doors...</option>';
		else if($_GET['table'] == 'tbl_sub_doors')
		echo '<option value="">Select Sub Doors...</option>';
		else echo '<option value="">Select Root...</option>';
		for($i=0;$i<count($roots);$i++) {
			
	           
	            echo "<option value='".$roots[$i][0].'|'.$roots[$i][3]."'>".$roots[$i][3]."</option>";
				 
			}}
			else{
				echo '<option value="0">No Data Found</option>';
			}
			
	//print_r($roots);
}



if(@$_GET['pagename'] == 'LRNumber')
{
	$selectconall = array(
			$_GET['changedval'] =>$_GET['lrvalue']
			
	);
	$res= $common->update($selectconall ,$_REQUEST['id'],'tbl_orders','order_id',$conection);




		
	//print_r($roots);
}
if(@$_GET['pagename'] == 'Stockupdate')
{
	$selectconall = array(
			$_GET['changedval'] =>$_GET['lrvalue']
			
	);
	$res= $common->update($selectconall ,$_REQUEST['id'],'tbl_stocks','stock_id',$conection);




		
	//print_r($roots);
}
if(@$_GET['pagename'] == 'updateqty')
{
	$selectconall = array(
			$_GET['changedval'] =>$_GET['lrvalue']
			
	);
	$res= $common->update($selectconall ,$_REQUEST['id'],'tbl_stocks','stock_id',$conection);
	$findByID = array(
		'stock_id' => $_REQUEST['id']);
$findByID = $common->findByID($findByID ,'tbl_stocks',$conection);
echo $findByID['quantity'];
//print_r($findByID['quantity']);



		
	//print_r($roots);
}

if(@$_POST['pagename'] == 'downloadorder')
{
	if(isset($_POST['status']) && (!empty($_POST['status'])))
	{
		$selectconall = array(
				'status' =>'In-Process'
		
		);
		$ids = implode(', ', $_POST['status']);
		for($i=0;$i<count($_POST['status']);$i++)
		{
		
		$res= $common->update($selectconall ,$_POST['status'][$i],'tbl_orders','order_id',$conection);
		
		
		
		}
		
		
		/* header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename); */
		//fputcsv($fp, $header);
		
		
		
		
		$resque= $common->getcsvquery($ids,'tbl_orders',$conection);
		if($resque != '0') {
		
		
		
		
		
		$delimiter = ",";
			$filename = "Orders_" . date('Y-m-d H:i:s') . ".csv";
		
			//create a file pointer
			$f = fopen('php://memory', 'w');
		
			//set column headers
			$fields = array('Root Name','Shop Name','Main Door','Sub Door','H1','H2','W1','W2','Quentity','FColor','BColor','Tag','Created','Modified');
			fputcsv($f, $fields, $delimiter);
		
			//output each row of the data, format line as csv and write to file pointer
			for($i=0;$i<count($resque);$i++)
			{
			$main_door = explode("|", $resque[$i]['main_door']);
			$sub_door = explode("|", $resque[$i]['sub_door']);
			$d=strtotime($resque[$i]['created_date']);
			$created_date = date("d/m/y", $d);
			$md=strtotime($resque[$i]['modified_date']);
			$modified_date = date("d/m/y", $md);
			$lineData = array(
					$resque[$i]['root_name'],
					$resque[$i]['shop_name'],
					$main_door[1],
					$sub_door[1],
					$resque[$i]['size_h1'],
					str_replace("/",".",$resque[$i]['size_h2']),
					$resque[$i]['size_w1'],
					str_replace("/",".",$resque[$i]['size_w2']),
					$resque[$i]['quantity'],
					$resque[$i]['color'],
					$resque[$i]['bcolor'],
					$resque[$i]['tag'],
					$created_date,
					$modified_date);
					fputcsv($f, $lineData, $delimiter);
						
			}
		
		
		
		
			//move back to beginning of file
			fseek($f, 0);
		
			//set headers to download file rather than displayed
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename="' . $filename . '";');
		
			//output all remaining data on a file pointer
			fpassthru($f);
			exit;
			
	}
	
} else {
	header('Location: ../'.$_REQUEST['redirectpage'].'?msg=error');
}
	
	
	
	
}
	
if(@$_POST['pagename'] == 'Delevired')
{
	
	
foreach ($_POST['lrcopy'] as $key => $value) {
	
	if($value!='')
    {
    	
    	$LRcopy = array(
    			'LRcopy' =>$value
    	);
    	echo "{$key} => {$value} ";
    	echo "<br/>";
    	
    	$res= $common->update($LRcopy ,$key,'tbl_orders','order_id',$conection);
    }
}

if(isset($_POST['delivered']) && (!empty($_POST['delivered'])))
{
	$selectconall = array(
			'status' =>'Delevired'

	);
		echo count($_POST['delivered']);
		echo "<br/>";
	for($j=0;$j<count($_POST['delivered']);$j++)
	{
		echo $_POST['delivered'][$j];
	$res1= $common->update($selectconall ,$_POST['delivered'][$j],'tbl_orders','order_id',$conection);
	



	}
	
}
header('Location: ../'.$_REQUEST['redirectpage']);

	
}



?>


