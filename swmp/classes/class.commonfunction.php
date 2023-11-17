<?php

class CommonFunction
{
	
    function checkloin($recd ,$table,$conection)
    {
        $i=0;
        foreach($recd as $key => $value)
        {
            if($i==0)
                $comma2="";
                else
                    $comma2="AND";
                    $value=addslashes($value);
                    $fields2.="$comma2 $key='$value'";
                    $i++;
        }
          $sql = "SELECT * FROM $table WHERE $fields2 ";
        
        
        $query = mysqli_query($conection,$sql)  or die ('Error updating database: ' . mysql_error());;
        
        $numrows = mysqli_num_rows($query);
        if($numrows>0)
        {
            $rows = mysqli_fetch_array($query);
            
            return $rows;
        }
        else
        {
            return "0";
        }
    }
    
    
    
    
    function insert($recd ,$table,$con) 
		 {
		    $i=0;
		  foreach($recd as $key => $value) 
		  {
				  if($i==0)
					$comma2="";
				  else
					$comma2=",";
		   $value=addslashes($value);
				  @$fields2.="$comma2 $key ";
				  
				  @$fields3.="$comma2 '$value' ";
			$i++;
				}
		 
		     echo $sql="insert into $table ($fields2) values ($fields3)";
		   // exit();
		   
		   //echo "<br><br>";
		    $query = mysqli_query($con,$sql);
		  
		    $insert_id = mysqli_insert_id($con);
		  
		  return $insert_id;
		 }
		 
		 function update($recd ,$con,$table,$changeid,$conection) 
		 {
		    $i=0;
		  foreach($recd as $key => $value) 
		  {
				  if($i==0)
					$comma2="";
				  else
					$comma2=",";
		   $value=addslashes($value);
				  @$fields2.="$comma2 $key='$value' ";
			$i++;
				}
		 
				 $sql="UPDATE $table set $fields2 WHERE $changeid ='$con'";
		   
		   
		     $query = mysqli_query($conection,$sql);
		     $insert_id = mysqli_affected_rows($conection);
		  return $insert_id;
		 }
		 
		
		
		 function deleterow($id,$table,$delete,$conection) 
		  {
			    $sql = "UPDATE $table SET `deleted` = '1' WHERE `$table`.`$delete` = $id";
			   $query = mysqli_query($conection,$sql);
			  $insert_id = mysqli_insert_id();
		  	  return $insert_id;
		  }
		  
		  function commonselectconall($recd ,$table,$con,$orederby) 
		 {
			   $i=0;
			  foreach($recd as $key => $value) 
			  {
				  
			  	
			  	if($i==0)
					$comma2="";
				  else
					$comma2="AND";
		   
					   if($key != 'Like' )
					   {
					   	$value=addslashes($value);
					   	@$fields2.="$comma2 $key='$value'";
					   }else
					   {
					   	@$fields2.="$comma2 $value";
					   }
					   $i++;
				}
				        $sql = "SELECT * FROM $table WHERE $fields2 ORDER BY `$orederby` DESC";
				      
				    $query = mysqli_query($con,$sql);
				$numrows = mysqli_num_rows($query);
				if($numrows>0)
				{
					while($rows = mysqli_fetch_array($query))
					{
						 $responce_rowsuser[]=$rows;
						
					}
					return $responce_rowsuser;
				}
				else
				{
					return "0";
				}
		 }
		 
		 
		 function findByID($recd ,$table,$con)
		 {
		     $i=0;
		     foreach($recd as $key => $value)
		     {
		         if($i==0)
		             $comma2="";
		             else
		                 $comma2="AND";
		                 $value=addslashes($value);
		                 @$fields2.="$comma2 $key='$value'";
		                 $i++;
		     }
		     $sql = "SELECT * FROM $table WHERE $fields2";
		     $query = mysqli_query($con,$sql);
		     $numrows = mysqli_num_rows($query);
		     if($numrows>0)
		     {
		        
		         $responce_rowsuser=mysqli_fetch_array($query);
		         
		         return $responce_rowsuser;
		     }
		     else
		     {
		         return "0";
		     }
		 }
		 
		 function getcount($recd ,$table,$con)
		 {
		 	$i=0;
		 	foreach($recd as $key => $value)
		 	{
		 		if($i==0)
		 			$comma2="";
		 		else
		 			$comma2="AND";
		 		$value=addslashes($value);
		 		@$fields2.="$comma2 $key='$value'";
		 		$i++;
		 	}
		 	
		 	//SELECT COUNT(*) AS totalcount FROM  WHERE `status`='Pending' and `deleted` = '0'
		 	  $sql = "SELECT sum(quantity) AS totalcount FROM $table WHERE $fields2";
		 	$query = mysqli_query($con,$sql);
		 	$numrows = mysqli_num_rows($query);
		 	if($numrows>0)
		 	{
		 
		 		$responce_rowsuser=mysqli_fetch_array($query);
		 		 
		 		return $responce_rowsuser;
		 	}
		 	else
		 	{
		 		return "0";
		 	}
		 }
		 
		
		 
		 
		 function getcsvquery($ids ,$table,$con)
		 {
		 	
		 	  $sql = "SELECT * FROM $table WHERE `order_id` IN ($ids) AND `status` ='In-Process' AND `deleted` = '0'";
		 	$query = mysqli_query($con,$sql);
		 	$numrows = mysqli_num_rows($query);
		 	if($numrows>0)
		 	{
		 		while($rows = mysqli_fetch_array($query))
		 		{
		 			$responce_rowsuser[]=$rows;
		 
		 		}
		 		return $responce_rowsuser;
		 	}
		 	else
		 	{
		 		return "0";
		 	}
		 }
		 
		 
		 function gettemporders($ids ,$table,$con)
		 {
		 
		 	 $sql = "SELECT * FROM $table WHERE `order_id` IN ($ids) AND `status` ='Pending' AND `deleted` = '0'";
		 	$query = mysqli_query($con,$sql);
		 	$numrows = mysqli_num_rows($query);
		 	if($numrows>0)
		 	{
		 		while($rows = mysqli_fetch_array($query))
		 		{
		 			$responce_rowsuser[]=$rows;
		 				
		 		}
		 		return $responce_rowsuser;
		 	}
		 	else
		 	{
		 		return "0";
		 	}
		 }
		 
		 
		 
		 function getcommonselectconall($recd ,$table,$con,$orederby)
		 {
		 	$i=0;
		 	foreach($recd as $key => $value)
		 	{
		 		if($i==0)
		 			$comma2="";
		 		else
		 			$comma2="AND";
		 		$value=addslashes($value);
		 		@$fields2.="$comma2 $key='$value'";
		 		$i++;
		 	}
		 	 $sql = "SELECT * FROM $table WHERE $fields2 AND DATE(created_date) = CURDATE() ORDER BY `$orederby` DESC";
		 	
		 	$query = mysqli_query($con,$sql);
		 	$numrows = mysqli_num_rows($query);
		 	if($numrows>0)
		 	{
		 		while($rows = mysqli_fetch_array($query))
		 		{
		 			$responce_rowsuser[]=$rows;
		 
		 		}
		 		return $responce_rowsuser;
		 	}
		 	else
		 	{
		 		return "0";
		 	}
		 }
		 
		 function GetOrderPerDay($recd ,$table,$con,$orederby)
		 {
		 	$i=0;
		 	foreach($recd as $key => $value)
		 	{
		 		if($i==0)
		 			$comma2="";
		 		else
		 			$comma2="AND";
		 		$value=addslashes($value);
		 		@$fields2.="$comma2 $key='$value'";
		 		$i++;
		 	}
		 	$sql = "SELECT `quantity`, SUM(quantity) As Daycnt FROM $table WHERE $fields2 AND DATE(created_date) = CURDATE() ORDER BY `$orederby` DESC";
		 
		 	$query = mysqli_query($con,$sql);
		 	$numrows = mysqli_num_rows($query);
		 if($numrows>0)
		 	{
		 
		 		$responce_rowsuser=mysqli_fetch_array($query);
		 		 
		 		return $responce_rowsuser;
		 	}
		 	else
		 	{
		 		return "0";
		 	}
		 }


}















?>
