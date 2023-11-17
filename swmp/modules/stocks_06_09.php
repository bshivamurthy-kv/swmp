

<?php
$pagename="ALLStocks";
include('classes/getOrder.php');
include('include/back.php');

?>


<div class="backgroundcolors" >
  <h2>Admin PANEL</h2>
  <p><a href="add_stocks" >Add Stocks</a></p>        
  <table id="listResults" class="table table-bordered">
   
    <?php 
    if($select_all!=0){?>
    <thead>
      <tr>
        
        <th>Main Doors</th>
        <th>Sub Doors</th>
        <th>Height1</th>
        <th>width1</th>
        
        <th>Quantity</th>
        <th>color</th>
        <th>Tag</th>
        
        <th>Status</th>
        <th>EDIT</th>
        <!--<th>Delete</th>-->
       
      </tr>
    
</thead>
  <tbody>
    <?php for($i=0;$i<count($select_all);$i++) { 
    	$main_door = explode("|", $select_all[$i]['main_door']);
    	$sub_door = explode("|", $select_all[$i]['sub_door']); 
    	/* if($select_all[$i]['status'] == 'Pending')
    	{
    		$classname = 'checkbox-red';
    	}	else $classname = 'checkbox-orange'; */
    	?>
   
      <tr>
        
         <td><?=$main_door[1]?></td>
         <td><?=$sub_door[1]?></td>
         <td><?=$select_all[$i]['size_h1']?></td>
         <td><?=$select_all[$i]['size_w1']?></td>
       
         <td><?=$select_all[$i]['quantity']?></td>
           <td><?=$select_all[$i]['color']?></td>
         <td><?=$select_all[$i]['tag']?></td>
        
        
        <td><div class="checkbox checkbox-circle checkbox-orange text-center">
        <input id="checkbox<?=$i?>" type="checkbox" stock_id="<?=$select_all[$i]['stock_id']?>"  onchange="updateLRnumber(this,'status')">
        <label for="checkbox<?=$i?>"></label>
      </div></td>
      <td><a href="add_stocks?update_id=<?=$select_all[$i]['stock_id']?>">Edit</a></td>
      <!--<td><a href="stocks?delete_id=< ?= $select_all[$i]['stock_id']?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>-->
         
         
        
        
        
      </tr>
     
     <?php }} else { ?>
     <tr>
        <td>NO Recordes Found</td>
        
        
        
      </tr>
      <?php }?>
    </tbody>
  </table>
  
  

