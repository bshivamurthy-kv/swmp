
<?php
include ('class.commonfunction.php');
$common = new CommonFunction();
unset($_SESSION['root_id']);
			unset($_SESSION['shop_id']);
/************ Add User:start *************************************************************/
if ($pagename == 'adduser') {
    
    $selectconall = array(
        'deleted' => '0'
    );
    $select_all = $common->commonselectconall($selectconall, 'tbl_admin', $conection, 'admin_id');
    
    if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&
        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {
        if (isset($_POST['sub'])) {
            $responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
            // print_r($responce['postdeatis']['name']);
            
            if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
                foreach ($responce['ErrorFildes'] as $key => $posts) {
                    $erros[$key] = $posts;
                }
            } else {
                /* echo "test"; */
              
                $postdeatis = array(
                    'name' => $responce['postdeatis']['name'],
                    'password' => md5($responce['postdeatis']['password']),
                    'usertype' => $responce['postdeatis']['usertype']
                );
                $responce = $common->insert($postdeatis, 'tbl_admin', $conection);
                if ($responce != '0') {
                    header('Location: adduser?msg=success');
                }
            }
        }
    } if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {
        $findByID = array(
            'admin_id' => $_REQUEST['delete_id']
        );
        $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_admin', 'admin_id', $conection);
        if ($responce != '0') {
            header('Location: adduser?delete=success');
        }
    }

    if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '') 
        {  
            
            $findByID = array(
                'admin_id' => $_REQUEST['update_id']);
            $findByID = $common->findByID($findByID ,'tbl_admin',$conection);
            $responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
            // print_r($responce['postdeatis']['name']);
            
            if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
                foreach ($responce['ErrorFildes'] as $key => $posts) {
                    $erros[$key] = $posts;
                }
            } else {
            
            if (isset($_POST['sub'])) {
               
                $postdeatis = array(
                    'name' => $responce['postdeatis']['name'],
                    'password' => md5($responce['postdeatis']['password']),
                    'usertype' => $responce['postdeatis']['usertype']
                );  
                
            $res= $common->update($postdeatis ,$_REQUEST['update_id'],'tbl_admin','admin_id',$conection);
           
            if ($res != '0') {
                header('Location: adduser?update=success');
            }
        }
         }
       }
            
        
          
    
    // exit;
}
/************ Add User:END *************************************************************/



/************ Add Inedx:Start *************************************************************/
if ($pagename == 'index') {
    
    if (isset($_POST['sub'])) {
        $logindeatiols = array(
            'name' => $_POST['name'],
            
            'password' => md5($_POST['password']),
            
            'deleted' => '0'
        
        );
        $response = $common->checkloin($logindeatiols, 'tbl_admin', $conection);
        if ($response != 0) {
            
            
                
                 $_SESSION['user_deatils'] = array(
                    'name' => $response['name'],
                    
                    'id' => $response['admin_id'],
                    
                    'usertype' => $response['usertype'],
                		'min_day_order' => $response['min_day_order']
                );
                
                header("Location: home");
           
        }
        else {
            $msg1 = 0;
        }
    }
}
/************ Add Inedx:END *************************************************************/


/************ Add Root:Start *************************************************************/

if ($pagename == 'addRoot') {
    
    $selectconall = array(
        'deleted' => '0'
    );
    $select_all = $common->commonselectconall($selectconall, 'tbl_root', $conection, 'root_id');
    
    if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&
        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {
           
        if (isset($_POST['sub'])) {
            
            $responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
            // print_r($responce['postdeatis']['name']);
            
            if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
                foreach ($responce['ErrorFildes'] as $key => $posts) {
                    $erros[$key] = $posts;
                }
            } else {
                /* echo "test"; */
               
                $postdeatis = array(
                    'root_name' => $responce['postdeatis']['root_name']
                );
                $responce = $common->insert($postdeatis, 'tbl_root', $conection);
                if ($responce != '0') {
                    header('Location: addroot?msg=success');
                }
            }
        }
        }  
        
        if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {
         
        $findByID = array(
            'root_id' => $_REQUEST['delete_id']
        );
        $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_root', 'root_id', $conection);
        if ($responce != '0') {
            header('Location: addroot?delete=success');
        }}
        
        if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '') 
        {  
            $findByID = array(
                'root_id' => $_REQUEST['update_id']);
            $findByID = $common->findByID($findByID ,'tbl_root',$conection);
            
            if (isset($_POST['sub'])) {
            
            $postdeatis = array(
                'root_name' => $_POST['root_name']
            );
            $res= $common->update($postdeatis ,$_REQUEST['update_id'],'tbl_root','root_id',$conection);
           
            if ($res != '0') {
                header('Location: addroot?update=success');
            }
         }
       }
    
    
    // exit;
}
/************ Add Root:END *************************************************************/





/************ Add Doors:Start *************************************************************/

if ($pagename == 'addDoors') {
    if(isset($_REQUEST['type']))  $doortype = $_REQUEST['type']; else   $doortype = 'old';
    
    $selectconall = array(
        'deleted' => '0',
        'door_type' => $doortype
    );
    $select_all = $common->commonselectconall($selectconall, 'tbl_doors', $conection, 'door_id');
    
    if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&
        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {
            
            if (isset($_POST['sub'])) {
                
                $responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
                // print_r($responce['postdeatis']['name']);
                
                if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
                    foreach ($responce['ErrorFildes'] as $key => $posts) {
                        $erros[$key] = $posts;
                    }
                } else {
                    /* echo "test"; */
                    
                    $postdeatis = array(
                        'door_name' => $responce['postdeatis']['door_name'],
                        'door_type' => $doortype
                    );
                    $responce = $common->insert($postdeatis, 'tbl_doors', $conection);
                    if ($responce != '0') {
                        header('Location: adddoors?msg=success&type='.$doortype);
                    }
                }
            }
        }
        
        if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {
            
            $findByID = array(
                'door_id' => $_REQUEST['delete_id']
            );
            $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_doors', 'door_id', $conection);
            if ($responce != '0') {
                header('Location: adddoors?delete=success&type='.$doortype);
            }}
            
            if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')
            {
                $findByID = array(
                    'door_id' => $_REQUEST['update_id']);
                $findByID = $common->findByID($findByID ,'tbl_doors',$conection);
                if (isset($_POST['sub'])) {
                    
                    $postdeatis = array(
                        'door_name' => $_POST['door_name']
                    );
                    $res= $common->update($postdeatis ,$_REQUEST['update_id'],'tbl_doors','door_id',$conection);
                    
                    if ($res != '0') {
                        header('Location: adddoors?update=success&type='.$doortype);
                    }
                }
            }
            
            
            // exit;
}
/************ Add Doors:END *************************************************************/


/************ Add Doors:Start *************************************************************/

if ($pagename == 'sub_doors') {
    if(isset($_REQUEST['type']))  $doortype = $_REQUEST['type']; else   $doortype = 'old';
    
    $selectconall = array(
        'deleted' => '0',
        'door_type' => $doortype
    );
    $get_alldoors = $common->commonselectconall($selectconall, 'tbl_doors', $conection, 'door_id');
    
    $select_all = $common->commonselectconall($selectconall, 'tbl_sub_doors', $conection, 'sub_door_id');
    
    if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&
        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {
            
            if (isset($_POST['sub'])) {
                
                $responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
                // print_r($responce['postdeatis']['name']);
                
                if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
                    foreach ($responce['ErrorFildes'] as $key => $posts) {
                        $erros[$key] = $posts;
                    }
                } else {
                    /* echo "test"; */
                    //print_r($responce['postdeatis']['main_door_id']);
                    $main_doorid = explode("|", $responce['postdeatis']['main_doorid']);
                    $postdeatis = array(
                        'main_doorid' => $main_doorid[0],
                        'main_doorname' => $main_doorid[1],
                    'sub_door_name' => $responce['postdeatis']['subdoor_name'],
                    'door_type' => $doortype
                    );
                    $responce = $common->insert($postdeatis, 'tbl_sub_doors', $conection);
                    if ($responce != '0') {
                        header('Location: sub_doors?msg=success&type='.$doortype);
                    }
                }
            }
        }
        
        if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {
           
            $findByID = array(
                'door_id' => $_REQUEST['delete_id']
            );
            $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_sub_doors', 'sub_door_id', $conection);
            if ($responce != '0') {
                header('Location: sub_doors?delete=success&type='.$doortype);
            }}
            
            if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')
            {
                $findByID = array(
                    'sub_door_id' => $_REQUEST['update_id']);
                $findByID = $common->findByID($findByID ,'tbl_sub_doors',$conection);
                if (isset($_POST['sub'])) {
                    
                    $main_doorid = explode("|", $_POST['main_doorid']);
                    $postdeatis = array(
                        'main_doorid' => $main_doorid[0],
                        'main_doorname' => $main_doorid[1],
                        'sub_door_name' => $_POST['subdoor_name']
                    );
                    $res= $common->update($postdeatis ,$_REQUEST['update_id'],'tbl_sub_doors','sub_door_id',$conection);
                    
                    if ($res != '0') {
                        header('Location: sub_doors?update=success&type='.$doortype);
                    }
                }
            }
            
            
            // exit;
}
/************ Add Doors:END *************************************************************/







/************ Add Root:Start *************************************************************/

if ($pagename == 'addCustomer') {
    
    $selectconall = array(
        'deleted' => '0'
    );
    $select_all = $common->commonselectconall($selectconall, 'tbl_customer', $conection, 'customer_id');
   
    
        
    
    $roots = $common->commonselectconall($selectconall, 'tbl_root', $conection, 'root_id');

    
    if($roots!=0){
        for($i=0;$i<count($roots);$i++) {
            $root[] =  array("root_id" => $roots[$i]['root_id'],"name"=>$roots[$i]['root_name'],);
            
        }}
        
    
    if ((!isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] == '') &&
        (!isset($_REQUEST['update_id']) && $_REQUEST['update_id'] == '')) {
            
            if (isset($_POST['sub'])) {
                
                $responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
               
                
                if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
                    foreach ($responce['ErrorFildes'] as $key => $posts) {
                        $erros[$key] = $posts;
                    }
                } else {
                    /* echo "test"; */
                    //print_r($responce['postdeatis']['main_door_id']);
                    $main_doorid = explode("|", $_POST['root_name']);
                    $postdeatis = array(
                        'route_id' =>$main_doorid[0],
                        'root_name' =>$main_doorid[1],
                        'shop_name' => $responce['postdeatis']['shop_name'],
                        'GST' => $responce['postdeatis']['gst'],
                        'customer_name' => $responce['postdeatis']['customer_name'],
                        'mobile_no' => $responce['postdeatis']['mobile_no'],
                        'address' => $responce['postdeatis']['address']
                        
                    );
                    $responce = $common->insert($postdeatis, 'tbl_customer', $conection);
                    if ($responce != '0') {
                        header('Location: addCustomer?msg=success');
                    }
                }
            }
        }
        
        
        if (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')
        {
        	$findByID = array(
        			'customer_id' => $_REQUEST['update_id']);
        	$findByID = $common->findByID($findByID ,'tbl_customer',$conection);
        	//print_r($findByID);
        	if (isset($_POST['sub'])) {
        
        		 $responce = validateFromvalidation($_SERVER["REQUEST_METHOD"], $_POST);
               
                
                if (is_array($responce['ErrorFildes']) && ! empty($responce['ErrorFildes'])) {
                    foreach ($responce['ErrorFildes'] as $key => $posts) {
                        $erros[$key] = $posts;
                    }
                } else {
                    /* echo "test"; */
                    //print_r($responce['postdeatis']['main_door_id']);
                    $main_doorid = explode("|", $_POST['root_name']);
                    $postdeatis = array(
                        'route_id' =>$main_doorid[0],
                        'root_name' =>$main_doorid[1],
                        'shop_name' => $responce['postdeatis']['shop_name'],
                        'GST' => $responce['postdeatis']['gst'],
                        'customer_name' => $responce['postdeatis']['customer_name'],
                        'mobile_no' => $responce['postdeatis']['mobile_no'],
                        'address' => $responce['postdeatis']['address']
                        
                    );
                    	$res= $common->update($postdeatis ,$_REQUEST['update_id'],'tbl_customer','customer_id',$conection);
        
        		if ($res != '0') {
        			header('Location: addCustomer?msg=success');
        		    }
                }
        	
        	}
        }
        
        if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {
        	 
        	$findByID = array(
        			'customer_id' => $_REQUEST['delete_id']
        	);
        	$findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_customer', 'customer_id', $conection);
        	if ($responce != '0') {
        		header('Location: addCustomer?delete=success');
        	}
        }
}
/************ Add Root:END *************************************************************/














// exit;
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