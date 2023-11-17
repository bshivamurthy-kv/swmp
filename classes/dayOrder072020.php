
<?php
include ('class.commonfunction.php');

$common = new CommonFunction();

/************ Add User:start *************************************************************/
if (@$pagename == 'addOrder') {
	
	if(isset($orderType) && $orderType === 'NewDayOrder')  $doortype = 'new'; else   $doortype = 'old';
	$selectconall = array(
        'deleted' => '0'
    );
    $selectcondoor = array(
        'deleted' => '0',
        'door_type' => $doortype
    );
    
    
    $getselectconall = array(
    		'executive_id' => $_SESSION['user_deatils']['id'],
    		'deleted' => '0'
    );
    
    $dayorder = $common->GetOrderPerDay($getselectconall, 'tbl_orders', $conection, 'order_id');
    if($dayorder['Daycnt'] >=$_SESSION['user_deatils']['min_day_order'] && $_SESSION['user_deatils']['min_day_order'] !=0)
    {
    	header('Location: home?oder=over');
    }
    if(!isset($dayorder['Daycnt']) && $_SESSION['user_deatils']['min_day_order']!=0)
    {
    	$dayorderval = $_SESSION['user_deatils']['min_day_order'];
    } else if($_SESSION['user_deatils']['min_day_order']!=0)
    {
    	$dayorderval = $_SESSION['user_deatils']['min_day_order'] - $dayorder['Daycnt'];
    }
   
    $roots = $common->commonselectconall($selectconall, 'tbl_root', $conection, 'root_id');
    $maindoors = $common->commonselectconall($selectcondoor, 'tbl_doors', $conection, 'door_id');
    $select_all = $common->getcommonselectconall($getselectconall, 'tbl_temp_orders', $conection, 'order_id');
    $statuscount = array(
    		'status' => 'Pending',
    		'deleted' => '0'
    );
    
    if(isset($_SESSION['root_id'])) {
    	$findByID = array(
    			'route_id' => $_SESSION['root_id']);
    	$getShops =  $common->commonselectconall($findByID, 'tbl_customer', $conection, 'route_id');
    	
    	
    		
    }
    $getcount = $common->getcount($statuscount, 'tbl_orders', $conection);
    
       if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&
        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {
    	if (isset($_POST['sub'])) {
    	$update0rder = time();
    	$responce = postdeatiles($update0rder,'insert');
    	if(!is_array($responce['ErrorFildes'])&& empty($responce['ErrorFildes']))
    	{
	    	$setoperations = array($responce,$orderType,'tbl_temp_orders','insert');
	    	
	    	$opteration = performopteration($setoperations,$common,$conection);
    	}
    	}
    } 
    if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')
    {
    	$findByID = array(
    			'order_id' => $_REQUEST['update_id']);
    	$findByID = $common->findByID($findByID ,'tbl_temp_orders',$conection);
    	
    	if (isset($_POST['sub'])) {
    		$update0rder = $findByID['ranoder_id'];
    		$responce = postdeatiles($update0rder,'update');
    		//print_r($responce);
    		//exit;
    		if(!is_array($responce['ErrorFildes'])&& empty($responce['ErrorFildes']))
    		{
	    		$setoperations = array($responce,$orderType,'tbl_temp_orders','update',$_REQUEST['update_id'],'order_id');
	    		$opteration = performopteration($setoperations,$common,$conection);	
    		}
    		
    	}
    }
    
    if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {
        $findByID = array(
            'order_id' => $_REQUEST['delete_id']
        );
        $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_temp_orders', 'order_id', $conection);
        if ($responce != '0') {
            header('Location: '.$orderType.'?delete=success');
        }
    }
    
    
    
    
    
    
    // exit;
}
/************ Add User:END *************************************************************/
function postdeatiles($update0rder,$opreation)
{
	if (isset($_POST['sub'])) {
		//print_r($_POST);
		$responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
		if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
			foreach ($responce['ErrorFildes'] as $key => $posts) {
				$erros[$key] = $posts;
			}
			return $responce;
		} else {
		$roots = explode("|", $responce['postdeatis']['root_name']);
		$shop_names = explode("|", $responce['postdeatis']['shop_name']);
		//$sub_doors = explode("|", $responce['postdeatis']['sub_door_name']);
		
		if($opreation == 'insert')
		{
			unset($_SESSION['root_id']);
			unset($_SESSION['shop_id']);
			$_SESSION['root_id'] = $roots['0'];
			$_SESSION['shop_id']=  $shop_names['0'];
			
			
		}
		
		
		if($responce['postdeatis']['Status']!='' ) {$status=$responce['postdeatis']['Status'];}
		else { $status='Pending'; }
		
		$postdeatis = array(
				'ranoder_id' => $update0rder,
				'executive_id' => $_SESSION['user_deatils']['id'],
				'executive_name' => $_SESSION['user_deatils']['name'],
				'logged_type'  => $_SESSION['user_deatils']['usertype'],
				'root_name' => $roots[1],
				'root_id' => $roots[0],
				'shop_id' => $shop_names[0],
				'shop_name' => $shop_names[1],
				'main_door' => $responce['postdeatis']['door_name'],
				'sub_door' => $responce['postdeatis']['sub_door_name'],
				'door_type' => $doortype,
				'color' => $responce['postdeatis']['color'],
				'size_h1' => $responce['postdeatis']['size_h1'],
				'size_h2' => $responce['postdeatis']['size_h2'],
				'size_w1' => $responce['postdeatis']['size_w1'],
				'size_w2' => $responce['postdeatis']['size_w2'],
				'quantity' => $responce['postdeatis']['quantity'],
				'tag' => $responce['postdeatis']['tag'],
				'status'=>$status,
				'LRcopy'=>$responce['postdeatis']['LRcopy'] );
		}
	}
	return $postdeatis;
}

function performopteration($setoperations,$common,$conection)
{
	if($setoperations[3] == 'insert')
$responce = $common->$setoperations[3]($setoperations[0],$setoperations[2], $conection);
else $responce =$common->update($setoperations[0] ,$setoperations[4],$setoperations[2],$setoperations[5],$conection);

			if ($responce !='0' || $setoperations[3] == 'update'){
				header('Location:'.$setoperations[1].'?'.$setoperations[3].'=success');
			}
		}


if($_GET['pagename'] == 'getshops')
{
	
	$selectconall = array(
			'route_id' =>$_GET['selectedid'],
			'deleted' => '0'
	);
	$roots = $common->commonselectconall($selectconall, $_GET['table'], $conection, $_GET['customer_id']);	
	//print_r($roots);
}


if (@$pagename == 'viewOrder') {

	$selectconall = array(
			'deleted' => '0'
	);
	$select_all = $common->commonselectconall($selectconall, 'tbl_temp_orders', $conection, 'order_id');
}










// exit;
function validateFromvalidation($FormRequest, $fields)
{
    if ($FormRequest == "POST") {
        foreach ($fields as $key => $posts) {
            if (empty($posts) && $posts == "") {
                $keyErr[] = $key;
            } else {
                $Inputsname[$key] = test_input($posts);
            }
        }
        $responce = array(
            "ErrorFildes" => $keyErr,
            "postdeatis" => $Inputsname
        );
        return $responce;
        
        // $Inputsname[]
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['addorders'])) {
	$ids = implode(', ', $_POST['tempids']);
 $resque= $common->gettemporders($ids,'tbl_temp_orders',$conection);
 $update0rder = time();
 
 if($resque != '0') {
 	for($i=0;$i<count($resque);$i++)
 	{
 	$postdeatis = array(
 			'ranoder_id' => $resque[$i]['ranoder_id'],
 			'executive_id' => $resque[$i]['executive_id'],
 			'executive_name' => $resque[$i]['executive_name'],
 			'logged_type'  => $resque[$i]['logged_type'],
 			'root_name' => $resque[$i]['root_name'],
 			'root_id' => $resque[$i]['root_id'],
 			'shop_id' => $resque[$i]['shop_id'],
 			'shop_name' => $resque[$i]['shop_name'],
 			'main_door' => $resque[$i]['main_door'],
			 'sub_door' => $resque[$i]['sub_door'],
			 'door_type' => $resque[$i]['door_type'],
 			'color' => $resque[$i]['color'],
 			'size_h1' => $resque[$i]['size_h1'],
 			'size_h2' => $resque[$i]['size_h2'],
 			'size_w1' => $resque[$i]['size_w1'],
 			'size_w2' => $resque[$i]['size_w2'],
 			'quantity' => $resque[$i]['quantity'],
 			'tag' => $resque[$i]['tag'],
 			'status'=>$resque[$i]['status'],
 			'Tempkgid'=>$update0rder);
 		 $responce[] = $common->insert($postdeatis, 'tbl_orders', $conection);
	 	if($responce!=0)
	 	{
	 		$findByID[] = $common->deleterow($resque[$i]['order_id'], 'tbl_temp_orders', 'order_id', $conection);
	 	}
 	
 	}
 	if($responce!=0)
 	{
 		header('Location: viewOrder');
 	}
 	
 
 }
 else 
 {
 	echo "Error";
 }
 
 
 
 
	
}


?>