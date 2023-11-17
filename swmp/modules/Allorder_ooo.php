

<?php
$pagename="ALLOrder";
include('classes/getOrder.php');
include('include/back.php');

?>

<div style="height: 100px"></div>
<div class="backgroundcolors" >
  <h2>Admin PANEL</h2>
  <!-- <p>The .table-bordered class adds borders to a table:</p>    -->         
  <table id="example" class="table table-bordered">
   
    <?php 
    if($select_all!=0){?>
    <thead>
      <tr>
        <th>Root Name</th>
        <th>Shop Name</th>
        <th>Main Doors</th>
        <th>Sub Doors</th>
        <th>Height1</th>
        <th>width1</th>
        
        <th>Quantity</th>
        <th>color</th>
        <th>Tag</th>
        <th>LR Number</th>
        <th>Status</th>
        <th>EDIT</th>
       
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
        <td><?=$select_all[$i]['root_name']?></td>
         <td><?=$select_all[$i]['shop_name']?></td>
         <td><?=$main_door[1]?></td>
         <td><?=$sub_door[1]?></td>
         <td><?=$select_all[$i]['size_h1']?></td>
         <td><?=$select_all[$i]['size_w1']?></td>
       
         <td><?=$select_all[$i]['quantity']?></td>
           <td><?=$select_all[$i]['color']?></td>
         <td><?=$select_all[$i]['tag']?></td>
        <td><input type="text" placeholder="LR copy" id="<?=$select_all[$i]['order_id']?>" onchange="updateLRnumber(this,'LRcopy')" class="form-control"></td>
        
        <td><div class="checkbox checkbox-circle checkbox-orange text-center">
        <input id="checkbox<?=$i?>" type="checkbox" orderid="<?=$select_all[$i]['order_id']?>"  onchange="updateLRnumber(this,'status')">
        <label for="checkbox<?=$i?>"></label>
      </div></td>
      <td><a href="addOrder?update_id=<?=$select_all[$i]['order_id']?>">Edit</a></td>
         
         
        
        
        
      </tr>
     
     <?php }} else { ?>
     <tr>
        <td>NO Recordes Found</td>
        
        
        
      </tr>
      <?php }?>
    </tbody>
  </table>
  
  <div class=" backgroundcolors" >
    <table class="table"  >
    <tr><td > <div class="redstatus"></div><div >Canceled</div></td>
        <td > <div class="whitestatus"></div><div >Pending</div></td>
        <td > <div class="orangeredstatus"></div><div >Deliverd</div></td>
        <td><span class="download"></span> <label class="download">Download</label></td>
        </tr>
        </table>
   
   </div>
</div>


