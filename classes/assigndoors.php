<?php
include('class.commonfunction.php');
$common = new CommonFunction();
if ($pagename == 'assigndoors') {

    $selectconall = array(
        'deleted' => '0'
    );
    $users = $common->commonselectconall($selectconall, 'tbl_admin', $conection, 'admin_id');
    $maindoors = $common->commonselectconall($selectconall, 'tbl_doors', $conection, 'door_id');
    $assigndoors = $common->commonselectconall($selectconall, 'tbl_assigndoors', $conection, 'id');
    if($_REQUEST['update_id'])
    {
        $findByID = array(
            'id' => $_REQUEST['update_id']);
        $findByID = $common->findByID($findByID ,'tbl_assigndoors',$conection);
       // print_r($findByID);
    }
    
    


    if (isset($_POST['sub'])) {
        $values = $_POST['Doors'];
        $typedoors = [];
        $ids = [];
        $idsup = [];
        $doornames = [];
        $typetest;
        foreach ($values as $a) {
            $idss = explode("|",$a);
            array_push($ids, $idss[0]);
            array_push($idsup, $a);
            array_push($typedoors, "main_door LIKE '$idss[0]|%'");

        }
        $typetest = join(" OR ", $typedoors);



        $getdoornames = $common->getmutilerecordsbyids(join(",", $ids), 'tbl_doors', $conection, 'door_id');
        //print_r($getdoornames);
        foreach ($getdoornames as $aa) {
            array_push($doornames, $aa['door_name']);
        }

        $postdeatis = array(
            'user_id' => $_POST['user_id'],
            'setids' => join(",", $idsup),
            'doorlikename' => $typetest,
            'doorname' => join(" , ", $doornames),

        );
        print_r($postdeatis);
        if(!isset($_REQUEST['update_id']))
        {
            $responce = $common->insert($postdeatis, 'tbl_assigndoors', $conection);
        } else {
            $res= $common->update($postdeatis ,$_REQUEST['update_id'],'tbl_assigndoors','id',$conection);
        }
        if ($responce != '0') {
            header('Location: ordertouser?msg=success');
        }



        
    }
    if (isset($_REQUEST['delete_id']) && $_REQUEST['delete_id'] != '') {
           
        $findByID = array(
            'id' => $_REQUEST['delete_id']
        );
        $findByID = $common->deleterow($_REQUEST['delete_id'], 'tbl_assigndoors', 'id', $conection);
       
            header('Location:ordertouser?delete=success');
    }

}

?>

