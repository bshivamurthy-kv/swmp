

<?php

include ('class.commonfunction.php');

unset($_SESSION['root_id']);

unset($_SESSION['shop_id']);

$common = new CommonFunction();



/************ Add User:start *************************************************************/

if (@$pagename == 'addOrder') {

    

    $selectconall = array(

        'deleted' => '0'

    );

    $roots = $common->commonselectconall($selectconall, 'tbl_root', $conection, 'root_id');

    $maindoors = $common->commonselectconall($selectconall, 'tbl_doors', $conection, 'door_id');

    $select_all = $common->commonselectconall($selectconall, ' tbl_orders', $conection, 'order_id');

    $statuscount = array(

    		'status' => 'Pending',

    		'deleted' => '0'

    );

    $getcount = $common->getcount($statuscount, 'tbl_orders', $conection);

    

       if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&

        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {

    	if (isset($_POST['sub'])) {

    	$update0rder = time();

    	$responce = postdeatiles($update0rder,'insert');

    	if(!is_array($responce['ErrorFildes'])&& empty($responce['ErrorFildes']))

    	{

	    	$setoperations = array($responce,'addOrder','tbl_orders','insert');

	    	$opteration = performopteration($setoperations,$common,$conection);

    	}

    	}

    } 

    if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')

    {

    	$findByID = array(

    			'order_id' => $_REQUEST['update_id']);

    	$findByID = $common->findByID($findByID ,'tbl_orders',$conection);

    	

    	if (isset($_POST['sub'])) {

    		$update0rder = $findByID['ranoder_id'];

    		$responce = postdeatiles($update0rder,'update');

    		//print_r($responce);

    		//exit;

    		if(!is_array($responce['ErrorFildes'])&& empty($responce['ErrorFildes']))

    		{

	    		$setoperations = array($responce,$_REQUEST['redirectpage'],'tbl_orders','update',$_REQUEST['update_id'],'order_id');

	    		$opteration = performopteration($setoperations,$common,$conection);	

    		}

    		

    	}

    }

    

    if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {

        $findByID = array(

            'order_id' => $_REQUEST['delete_id']

        );

        $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_orders', 'order_id', $conection);

        if ($responce != '0') {

            header('Location: addOrder?delete=success');

        }

    }

    

    

    

    

    

    

    // exit;

}

/************ Add User:END *************************************************************/



















/************ Add Stocks:start *************************************************************/

if (@$pagename == 'ALLStocks') {

    

    $selectconall = array(

        'deleted' => '0'

    );

   

    $maindoors = $common->commonselectconall($selectconall, 'tbl_doors', $conection, 'door_id');

    $select_all = $common->commonselectconall($selectconall, ' tbl_stocks', $conection, 'sub_door');

    $statuscount = array(

    		'status' => 'In Stock',

    		'deleted' => '0'

    );

	$getcount = $common->getcount($statuscount, 'tbl_stocks', $conection);

	

		

       if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&

        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {

    	if (isset($_POST['sub'])) {

		$update0rder = time();

		

    	$responce = poststockdeatiles($update0rder,'insert');

    	if(!is_array($responce['ErrorFildes'])&& empty($responce['ErrorFildes']))

    	{

	    	$setoperations = array($responce,'stocks','tbl_stocks','insert');

			$opteration = performopteration($setoperations,$common,$conection);

			echo "<pre>";

		print_r($responce);

		echo "</pre>";

    	}

    	}

	} 

	//exit;

    if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')

    {

    	$findByID = array(

    			'stock_id' => $_REQUEST['update_id']);

    	$findByID = $common->findByID($findByID ,'tbl_stocks',$conection);

    	

    	if (isset($_POST['sub'])) {

    		$responce = poststockdeatiles($update0rder,'update');

    		//print_r($responce);

    		//

    		if(!is_array($responce['ErrorFildes'])&& empty($responce['ErrorFildes']))

    		{

				$setoperations = array($responce,'stocks','tbl_stocks','update',$_REQUEST['update_id'],'stock_id');

				

				$opteration = performopteration($setoperations,$common,$conection);	

				

    		}

    		

    	}

    }

    

    if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {

        $findByID = array(

            'stock_id' => $_REQUEST['delete_id']

        );

        $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_stocks', 'stock_id', $conection);

        if ($responce != '0') {

            header('Location: stocks?delete=success');

        }

    }

    

    

    

    

    

    

    // exit;

}

/************ Add Stocks:END *************************************************************/











function poststockdeatiles($update0rder,$opreation)

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

		

		

		if($responce['postdeatis']['Status']!='' ) {$status=$responce['postdeatis']['Status'];}

		else { $status='In Stock'; }

		

		

		$addorder = array(

				

				'executive_id' => $_SESSION['user_deatils']['id'],

				'executive_name' => $_SESSION['user_deatils']['name'],

				'logged_type'  => $_SESSION['user_deatils']['usertype']);

		$commonpostdeatis = array(

		

				

				'main_door' => $responce['postdeatis']['door_name'],

				'sub_door' => $responce['postdeatis']['sub_door_name'],

				'color' => $responce['postdeatis']['color'],

				'size_h1' => $responce['postdeatis']['size_h1'],

				'size_h2' => $responce['postdeatis']['size_h2'],

				'size_w1' => $responce['postdeatis']['size_w1'],

				'size_w2' => $responce['postdeatis']['size_w2'],

				'quantity' => $responce['postdeatis']['quantity'],

				'tag' => $responce['postdeatis']['tag'],

				'status'=>$status);

		if($opreation=='insert')

		{

			$postdeatis = array_merge($addorder,$commonpostdeatis);

		}else 

		{

			$postdeatis = $commonpostdeatis;

		}

			

		}

		

		

	}

	return $postdeatis;

}





























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

		

		

		if($responce['postdeatis']['Status']!='' ) {$status=$responce['postdeatis']['Status'];}

		else { $status='Pending'; }

		

		

		$addorder = array(

				'ranoder_id' => $update0rder,

				'executive_id' => $_SESSION['user_deatils']['id'],

				'executive_name' => $_SESSION['user_deatils']['name'],

				'logged_type'  => $_SESSION['user_deatils']['usertype']);

		$commonpostdeatis = array(

		

				'root_name' => $roots[1],

				'root_id' => $roots[0],

				'shop_id' => $shop_names[0],

				'shop_name' => $shop_names[1],

				'main_door' => $responce['postdeatis']['door_name'],

				'sub_door' => $responce['postdeatis']['sub_door_name'],

				'color' => $responce['postdeatis']['color'],

				'size_h1' => $responce['postdeatis']['size_h1'],

				'size_h2' => $responce['postdeatis']['size_h2'],

				'size_w1' => $responce['postdeatis']['size_w1'],

				'size_w2' => $responce['postdeatis']['size_w2'],

				'quantity' => $responce['postdeatis']['quantity'],

				'tag' => $responce['postdeatis']['tag'],

				'status'=>$status,

				'LRcopy'=>$responce['postdeatis']['LRcopy'] );

		if($opreation=='insert')

		{

			$postdeatis = array_merge($addorder,$commonpostdeatis);

		}else 

		{

			$postdeatis = $commonpostdeatis;

		}

			

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





if (@$pagename == 'ALLOrder') {

	

	

	

	$selectconall = array(

			'Like' =>$selectmaindoors,

			'deleted' => '0'

	);


	
	$select_all = $common->commonselectconall($selectconall, ' tbl_orders', $conection, 'order_id');


}





if (@$pagename == 'viewOrder') {



	$selectconall = array(

			'executive_id' => $_SESSION['user_deatils']['id'],

			'deleted' => '0'

	);

	$select_all = $common->commonselectconall($selectconall, ' tbl_orders', $conection, 'order_id');

}



/*if (@$pagename == 'MainOrder') {



	$selectconall = array(

			'deleted' => '0'

	);

	$select_all = $common->commonselectconall($selectconall, ' tbl_orders', $conection, 'order_id');

}*/





















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



?>