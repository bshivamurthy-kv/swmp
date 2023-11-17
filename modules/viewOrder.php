<?php
$pagename="viewOrder";
include('classes/getOrder.php');
include('include/back.php');
?>

<div style="height: 100px"></div>
<div class="container backgroundcolors" >
  <h2>Order Details </h2>
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
        <th>Height2</th>
        <th>width1</th>
        <th>width2</th>
        
        <th>Quantity</th>
        <th>Fcolor</th>
        <th>Bcolor</th>
        <th>Tag</th>
          <th>Created</th>
          <th>Modified</th>
        <th>LR Number</th>
        <th>Status</th>
       
      </tr>
    
</thead>
    <?php for($i=0;$i<count($select_all);$i++) { 
    	$main_door = explode("|", $select_all[$i]['main_door']);
    	$sub_door = explode("|", $select_all[$i]['sub_door']); 
    	$d=strtotime($select_all[$i]['created_date']);
    	$created_date = date("d/m", $d);
    	$md=strtotime($select_all[$i]['modified_date']);
    	$modified_date = date("d/m", $md);
    	
    	?>
      <tr>
        <td><?=$select_all[$i]['root_name']?></td>
         <td><?=$select_all[$i]['shop_name']?></td>
         <td><?=$main_door[1]?></td>
         <td><?=$sub_door[1]?></td>
         <td><?=$select_all[$i]['size_h1']?></td>
         <td><?=$select_all[$i]['size_h2']?></td>
         <td><?=$select_all[$i]['size_w1']?></td>
         <td><?=$select_all[$i]['size_w2']?></td>
       
         <td><?=$select_all[$i]['quantity']?></td>
           <td><?=$select_all[$i]['fcolor']?></td>
           <td><?=$select_all[$i]['bcolor']?></td>
         <td><?=$select_all[$i]['tag']?></td>
         <td> <?=$created_date;?> </td>
           <td> <?php echo $modified_date;?> </td>
         <td><?=$select_all[$i]['LRcopy']?></td>
         <td><?=$select_all[$i]['status']?></td>
         
         
        
        
        
      </tr>
     <?php }} else { ?>
     <tbody>
     <tr>
        <td>NO Recordes Found</td>
        
        
        
      </tr>
      </tbody>
      <?php }?>
   
  </table>
</div>


