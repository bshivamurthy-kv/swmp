<?php
$pagename="MainOrder";
include('classes/getOrder.php');
include('include/back.php');

?>

<div style="height: 100px"></div>
<form method="post" action="include/fetchAll.php" id="myfrm">    
<div class="container backgroundcolors" >
  <h2>Admin PANEL</h2>
  
  <!-- <p>The .table-bordered class adds borders to a table:</p>    -->     
  
  <table id="listResults" class="table table-bordered">
   
    <?php 
    if($select_all!=0){?>
    <thead>
      <tr>
        <th>RN</th>
        <th>Shop Name</th>
        <th>MDR</th>
        <th>SDR</th>
        <th>H1</th>
        <th>w1</th>
        
        <th>QTY</th>
        <th>clr</th>
        <th>Tag</th>
        <th>LR Number</th>
        <th>Sts</th>
        <th>Crated</th>
        <th>Modified</th>
        <th>EDIT</th>
       
      </tr>
      
      
  <?php  if($_REQUEST['msg'] == 'error') echo "<label class='error'>**Select Check Box***</label>";?>
    
</thead>
  <tbody>
    <?php for($i=0;$i<count($select_all);$i++) { 
    	$main_door = explode("|", $select_all[$i]['main_door']);
    	$sub_door = explode("|", $select_all[$i]['sub_door']); 
    	$classname = '';
    	$checked = '';
    	$readonly = '';
    	if($select_all[$i]['LRcopy']!='0') {
    		$LRnumber=$select_all[$i]['LRcopy'];
    	} else $LRnumber= '';
    	if($select_all[$i]['status'] == 'Canceled')
    	{
    		$classname = 'checkbox-red';
    		$checked = 'checked';
    	}	
    	 if($select_all[$i]['status'] == 'In-Process')
    	{
    		$classname = 'checkbox-green';
    		$checked = 'checked';
    		$readonly = 'class="disabled"';
    	}  
    	
    	if($select_all[$i]['status'] == 'Delevired')
    	{
    		$classname = 'checkbox-orange';
    		$checked = 'checked';
    		$readonly = 'disabled="disabled"';
    		
    	}
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
         <td><?=$select_all[$i]['size_w1']?></td>
       
         <td><?=$select_all[$i]['quantity']?></td>
           <td><?=$select_all[$i]['color']?></td>
         <td><?=$select_all[$i]['tag']?></td>
        <td> <?php echo $LRnumber;?> </td>
        
        <td><div class="checkbox checkbox-circle <?=$classname?> text-center">
        <input id="checkbox<?=$i?>" type="checkbox" name="status[]" <?=$readonly?> value="<?=$select_all[$i]['order_id']?>" orderid="<?=$select_all[$i]['order_id']?>" <?=$checked?> 
        onclick="updateLRnumber(this,'status')">
        <label for="checkbox<?=$i?>"></label>
       
      </div></td>
      <td> <?php echo $created_date;?> </td>
      <td> <?php echo $modified_date;?> </td>
      <td><a href="addOrder?update_id=<?=$select_all[$i]['order_id']?>">Edit</a></td>
         
         
        
        
        
      </tr>
     
     <?php }} else { ?>
     <tr>
        <td>NO Recordes Found</td>
        
        
        
      </tr>
      <?php }?>
    </tbody>
  </table>
  
  
  <div class="otheroptions" >
    <table class="table"  >
    <tr><td > <div class="redstatus"></div><div >Canceled</div></td>
        <td > <div class="whitestatus"></div><div >Pending</div></td>
      
        <td > <div class="orangeredstatus"></div><div >Deliverd</div></td>
        <td><span class="download"></span> <a class="download"  href="javascript:submitForm();">Download</a></td>
        </tr>
        </table>
    <input type="hidden" name="pagename" value="allorder">
   </div>
   
</div>
</form>


