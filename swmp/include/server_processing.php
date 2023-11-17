<?php
session_start();
include "../include/config.php";
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'tbl_orders';
 
// Table's primary key
$primaryKey = 'order_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
if($_GET['odredrlist']=='addOrder')
{
    $columns = array(
      array( 'db' => 'order_id', 'dt' => 0 ),
      array( 'db' => 'root_name', 'dt' => 1,'formatter' => function( $d, $row ) {
        return substr($d, 0, 3); 
    } ),
      array( 'db' => 'shop_name',  'dt' => 2 ),
      array( 'db' => 'main_door',   'dt' => 3,
      'formatter' => function( $d, $row ) {
          $main_door = explode("|", $d);
          return $main_door[1];
      } ),
      array( 'db' => 'sub_door',     'dt' => 4,
      'formatter' => function( $d, $row ) {
          $main_door = explode("|", $d);
          return $main_door[1];
      } ),
      array( 'db' => 'size_h1',     'dt' => 5 ),
      array( 'db' => 'size_h2',     'dt' => 6 ),
      array( 'db' => 'size_w1',     'dt' => 7 ),
      array( 'db' => 'size_w2',     'dt' => 8 ),
      array( 'db' => 'quantity',     'dt' => 9 ),
      array( 'db' => 'color',     'dt' => 10 ),
      array( 'db' => 'bcolor',     'dt' => 11 ),
      array( 'db' => 'tag',     'dt' => 12),
       array(
      'db'        => 'created_date',
      'dt'        => 13,
      'formatter' => function( $d, $row ) {
        return date( 'd/m', strtotime($d));
      }
      ),
      
      
      array(
      'db'        => 'modified_date',
      'dt'        => 14,
      'formatter' => function( $d, $row ) {
                  return "<a href='addOrder?delete_id=".$row['order_id']."' onclick=\"return ConfirmDialog('Are you sure You Want to delete!');\">Delete</a>";
                  
              
      }
      )
      );
}
else 
{
  $columns = array(
    array( 'db' => 'order_id', 'dt' => 0 ),
    array( 'db' => 'root_name', 'dt' => 1 ),
    array( 'db' => 'shop_name',  'dt' => 2 ),
    array( 'db' => 'main_door',   'dt' => 3,
    'formatter' => function( $d, $row ) {
         $main_door = explode("|", $d);
         return $main_door[1];
    } ),
    array( 'db' => 'sub_door',     'dt' => 4,
    'formatter' => function( $d, $row ) {
         $main_door = explode("|", $d);
         return $main_door[1];
    } ),
    array( 'db' => 'size_h1',     'dt' => 5 ),
    array( 'db' => 'size_h2',     'dt' => 6 ),
    array( 'db' => 'size_w1',     'dt' => 7 ),
    array( 'db' => 'size_w2',     'dt' => 8 ),
    array( 'db' => 'quantity',     'dt' => 9 ),
    array( 'db' => 'color',     'dt' => 10 ),
    array( 'db' => 'bcolor',     'dt' => 11 ),
    array( 'db' => 'tag',     'dt' => 12),
    array( 'db' => 'LRcopy',     'dt' => 13,
    'formatter' => function( $d, $row ) {
        if($d>1) {
    		$LRnumber=$d;
        } else $LRnumber= ' <input  type="number" name="lrcopy['.$row['order_id'].']"  >';
        return $LRnumber;
    } ),
    array( 'db' => 'status',     'dt' => 14,
    'formatter' => function( $d, $row ) {
        $res=deliverystatus($d,$row);
      return '<div class="checkbox checkbox-circle '.@$res[0].' text-center">
        <input id="checkbox'.$row['order_id'].'" type="checkbox" name="status[]" '.@$res[2].' value='.$row['order_id'].' orderid='.$row['order_id'].' '.@$res[1].'
        onclick="updateLRnumber(this,\'status\')">
        <label for="checkbox'.$row['order_id'].'>"></label>
       </div>';
    } ),
    array(
		'db'        => 'created_date',
		'dt'        => 15,
		'formatter' => function( $d, $row ) {
			return date( 'd/m', strtotime($d));
		}
    ),
    array(
		'db'        => 'modified_date',
		'dt'        => 16,
		'formatter' => function( $d, $row ) {
			return date( 'd/m', strtotime($d));
		}
    ),
    array(
		'db'        => 'modified_date',
		'dt'        => 16,
		'formatter' => function( $d, $row ) {
			return date( 'd/m', strtotime($d));
		}
    ),
    array(
		'db'        => 'modified_date',
		'dt'        => 17,
		'formatter' => function( $d, $row ) {
            $res=deliverystatus($d,$row);
            return '<input id="checkbox'.$row['order_id'].'" type="checkbox" name="delivered[]" '.@$res[2].' value='.$row['order_id'].' orderid='.$row['order_id'].' '.@$res[1].'
            >';
		}
    ),
    array(
		'db'        => 'modified_date',
		'dt'        => 18,
		'formatter' => function( $d, $row ) {
            $res=deliverystatus($d,$row);
            if(@$res[3] == '') {
                return '<a href="addOrder?update_id='.$row['order_id'].'&redirectpage=Mainorder"">Edit</a>';
                 }
             
		}
    ),
    

    
    
    
);
}


function deliverystatus($d,$row )
{
    $res = array();
   
    if($d == 'Canceled')
    	{
            
    		$res[] = 'checkbox-red';
    		$res[] = 'checked';
    		$res[] = 'disabled="disabled"';
    		$res[] = 'checked';
    	}	
    	 if($d == 'In-Process')
    	{
    		$res[] = 'checkbox-green';
    		$res[] = 'checked';
    		$res[] = 'class="disabled"';
    	}  
    	
    	if($d == 'Delevired')
    	{
    		$res[] = 'checkbox-orange';
    		$res[] = 'checked';
    		$res[] = 'disabled="disabled"';
    		$res[] = 'checked';
    		
        }
        
        //$res1 = array_push($res,@$classname,@$checked,@$readonly,@$dchecked);
        //print_r($res);
        return $res;
        
       
}
 


 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */


//$whereAll ='deleted = 0 AND Like = '.$selectmaindoors;

require( 'ssp.class.php' );
if($_GET['odredrlist']=='Mainorder' || $_GET['odredrlist']=='addOrder')
{
  $whereAll = array(
    'deleted' => '0'
  );
  echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
  );
  
} else 
{
   
  $whereAll = array(
    'Like' =>$selectmaindoors
  );
  echo json_encode(
    SSP::complex( $_GET, $sql_details , $table, $primaryKey, $columns, $whereResult=null, $whereAll )
  );
}


