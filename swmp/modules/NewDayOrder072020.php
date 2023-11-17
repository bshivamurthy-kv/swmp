<?php
$pagename="addOrder";
$orderType="NewDayOrder";
include('classes/dayOrder.php');
include('include/back.php');
?>

<div class="container profile-view">
  <div class="col-12-xs col-sm-12 col-lg-12">
    <h2 class="title">Add Customer</h2>
    
    <div class="pull-left col-md-9">
      <div class="form-cont">
        
        <form method="post">
        <?php  if(is_array($responce['ErrorFildes'])&& !empty($responce['ErrorFildes']))
            {
                foreach($responce['ErrorFildes'] as $key => $posts)
                {
                    echo "<label class='error'>Please Select ".$posts."</label><br/>";
                } 
               
            }
            
         ?>
          <div class="form-group">
            <label class="text-capitalize">Root Name</label>
            
             <select  name="root_name" onchange="fetchAll('tbl_customer','route_id',this,'shop_name')"  id="rote_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}">
            <option value="">Select Root...</option>
            <?php 
            if($roots!=0){
        for($i=0;$i<count($roots);$i++) {  
        if(isset($findByID['order_id'])) {
            if($roots[$i]['root_id'] == $findByID['root_id'])
                $rootselected = "selected";
                 else $rootselected = "";
        }else if(isset($_SESSION['root_id'])) {
            if($roots[$i]['root_id'] == $_SESSION['root_id'])
                $rootselected = "selected";
                else $rootselected = "";
        }
        
        ?>
            <option value="<?=$roots[$i]['root_id'].'|'.$roots[$i]['root_name'] ?>" <?=$rootselected?>><?=$roots[$i]['root_name']?></option>
			 <?php }} ?>
		</select>
          </div>
          <div class="form-group">
            <label class="text-capitalize">Shop Name</label>
             <select  name="shop_name" id="shop_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}">
               <option value="">Select Shop...</option>
              <?php 
              if (isset($findByID['main_door']) && isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')
   				 {?>
            <option value="<?=$findByID['shop_id'].'|'.$findByID['shop_name'] ?>" selected="selected"><?=$findByID['shop_name']?></option>
			 <?php }else if(isset($_SESSION['root_id'])) {
			 	for($j=0;$j<count($getShops);$j++) {
			 		if($getShops[$j]['customer_id'] == $_SESSION['shop_id'])
			 			$shopselected = "selected";
			 		else $shopselected = "";
			 		
			 		
			 		echo '<option value="'.$getShops[$j]['customer_id'].'|'.$getShops[$j]['shop_name'].'" '.$shopselected.'>'.$getShops[$j]['shop_name'].'</option>';
			 	}
			 	
			 	
          
        } ?>
             
          
            </select>
          </div>
          
           <div class="form-group"  id="formsub_door">
            <label class="text-capitalize">Door</label>
           <select  name="door_name" onchange="fetchAll('tbl_sub_doors','main_doorid',this,'sub_door_name')"  id="door_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?> Main Door'}}}">
            <option value="">Select Main Door...</option>
            <?php 
            if($roots!=0){
        for($i=0;$i<count($maindoors);$i++) {  
        	
        if(isset($findByID['main_door'])) {
        	$umain_door = explode("|", $findByID['main_door']);
            if($umain_door[0] == $maindoors[$i]['door_id'])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$maindoors[$i]['door_id'].'|'.$maindoors[$i]['door_name'] ?>" <?=$selected?>><?=$maindoors[$i]['door_name']?></option>
			 <?php }} ?>
		</select>
          </div>
          <div class="form-group" >
          
             <select  name="sub_door_name" id="sub_door_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}">
            <option value="">Select Door...</option>
              <?php 
              if (isset($findByID['sub_door']) && isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '')
   				 { $smain_door = explode("|", $findByID['sub_door']);?>
            <option value="<?=$findByID['sub_door']?>" selected="selected"><?=$smain_door[1]?></option>
			 <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="text-capitalize">Select Size:</label>
            
            <div class="col-xs-12">
          
         
          <div class="col-xs-3">
           <input type="text" placeholder="H" name="size_h1" value="<?=$findByID['size_h1']?>" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
          </div>
          <div class="col-xs-3">
           <select  name="size_h2" id="size_h2" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
 
          
            <?php 
            if(isset($h))
            {
        for($t=0;$t<count($h);$t++) {  
        if(isset($findByID['size_h2'])) {
        	
            if($findByID['size_h2'] == $h[$t])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$h[$t]?>" <?=$selected?>><?=$h[$t]?></option>
			 <?php }} ?>
            
             
          </select>
           
          </div>
           <div class="col-xs-3">
           <input type="text" placeholder="W" name="size_w1" value="<?=$findByID['size_w1']?>" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
           
          </div>
          <div class="col-xs-3">
           <select  name="size_w2" id="size_w2" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
 
           
            <?php 
            if(isset($h))
            {
        for($t=0;$t<count($h);$t++) {  
        if(isset($findByID['size_w2'])) {
        	
            if($findByID['size_w2'] == $h[$t])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$h[$t]?>" <?=$selected?>><?=$h[$t]?></option>
			 <?php }} ?>
            
             
          </select>
           
          </div>
          </div>
          </div>
        <div class="form-group">
       <div class="row">
          <div class="col-xs-4">
           <label class="text-capitalize">Select Color:</label>
          <select  name="color" id="color" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
 
           <option value="">Colors</option>
            <?php 
            if(isset($colors))
            {
        for($t=0;$t<count($colors);$t++) {  
        if(isset($findByID['color'])) {
        	
            if($findByID['color'] == $colors[$t])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$colors[$t]?>" <?=$selected?>><?=$colors[$t]?></option>
			 <?php }} ?>
            
             
          </select>
         </div>
          <div class="col-xs-4">
         
          <label class="text-capitalize">Quantity:</label>
           <input type="number" placeholder="QTY" name="quantity" min="1" max="<?=$dayorderval ?>" value="<?=$findByID['quantity']?>" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
          </div>
           <div class="col-xs-4">
          <label class="text-capitalize">Add tag</label>
           <select  name="tag" id="tag" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
 
          
            <?php 
            if(isset($tag))
            {
        for($t=0;$t<count($tag);$t++) {  
        if(isset($findByID['tag'])) {
        	
            if($findByID['tag'] == $tag[$t])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$tag[$t]?>" <?=$selected?>><?=$tag[$t]?></option>
			 <?php }} ?>
            
             
          </select>
          </div>
           </div>
          </div>
          
          
          
          <?php if(($_SESSION['user_deatils']['usertype'] == 'admin1') && (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '') ) {?>
         <div class="form-group">
            <label class="text-capitalize">Order Status</label>
           <select  name="Status" id="Status" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
 
           <option value="">Select Status</option>
            <?php 
            if(isset($orderStatues))
            {
        for($t=0;$t<count($orderStatues);$t++) {  
        if(isset($findByID['status'])) {
        	
            if($findByID['status'] == $orderStatues[$t])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$orderStatues[$t]?>" <?=$selected?>><?=$orderStatues[$t]?></option>
			 <?php }} ?>
            
             
          </select>
          </div>
          
          <div class="form-group">
            <label class="text-capitalize">LR Number</label>
            <?php if(isset($findByID['LRcopy']) && $findByID['LRcopy']!=0) { $LRnumber=$findByID['LRcopy'];} else {$LRnumber='LR Number';} ?> 
           <input type="text"  name="LRcopy"  id="LRcopy"  value="<?=$LRnumber?>"  class="form-control">
          </div>
          <?php }?>
          <button type="submit" name="sub" value="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12 profile-details">
      <div class="col-sm-12">
          <div class="col-xs-11 ">
           <a href="addCustomer">
            <button type="button" class="btn btn-primary profile">Add Customer</button>
            </a>
          </div>
          <div class="col-xs-11">
          <a href="viewOrder">
            <button type="button" class="btn btn-primary profile">View Order</button>
            </a>
          </div>
         
          
          
        <div class="form-group">
          <div class="col-xs-12">
          
            Order Pendeing
          </div>
          <?php if($getcount != '0') { ?>
           <div class="col-xs-6">
            <?=$getcount['totalcount']?>
          </div>
          <?php } ?>
          
        </div>
        
        
        
        
        
        
      </div>
      
    </div>
  </div>
  
</div>
<div class="container backgroundcolors" >
  <h2>Order Details <?php 
  if($_REQUEST['insert'] == 'success') echo "<label class='error'>Inserted successfully</label>";
  if($_REQUEST['delete'] == 'success') echo "<label class='error'>Deleted successfully</label>";
           if($_REQUEST['update'] == 'success') echo "<label class='error'>Updated successfully</label>";
           ?></h2>
  <!-- <p>The .table-bordered class adds borders to a table:</p>    -->  
  
  <form method="post">       
  <table id="example1" class="table table-bordered">
   
    <?php 
    if($select_all!=0){?>
    <thead>
      <tr>
         <th>RN</th>
        <th>Shop Name</th>
        <th>MDR</th>
        <th>SDR</th>
        <th>H1</th>
        <th>H2</th>
        <th>w1</th>
        <th>W2</th>
        <th>QTY</th>
        <th>clr</th>
        <th>Tag</th>
       <th>Crated</th>
       <th>EDIT</th>
        <th>Delete</th>
       
      </tr>
    
</thead>
    <?php for($i=0;$i<count($select_all);$i++) { 
    	$main_door = explode("|", $select_all[$i]['main_door']);
    	$sub_door = explode("|", $select_all[$i]['sub_door']);
    	$d=strtotime($select_all[$i]['created_date']);
    	$created_date = date("d/m", $d);
    	/* $md=strtotime($select_all[$i]['modified_date']);
    	$modified_date = date("d/m", $md); */
    	?>
     
      <tr>
        <td><?=substr($select_all[$i]['root_name'], 0, 3)?></td>
         <td><?=$select_all[$i]['shop_name']?></td>
         <td><?=$main_door[1]?></td>
         <td><?=$sub_door[1]?></td>
         <td><?=$select_all[$i]['size_h1']?></td>
         <td><?=$select_all[$i]['size_h2']?></td>
         <td><?=$select_all[$i]['size_w1']?></td>
         <td><?=$select_all[$i]['size_w2']?></td>
       
         <td><?=$select_all[$i]['quantity']?></td>
           <td><?=$select_all[$i]['color']?></td>
         <td><?=$select_all[$i]['tag']?></td>
         <td> <?php echo $created_date;?> </td>
        <td><a href="<?=$orderType?>?update_id=<?= $select_all[$i]['order_id']?>">Edit</a></td>
         <td><a href="<?=$orderType?>?delete_id=<?= $select_all[$i]['order_id']?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>
        
        <input type="hidden" readonly="readonly" name="tempids[]" value="<?= $select_all[$i]['order_id']?>" />
        
      </tr>
      
      
     <?php }echo '<tr><td colspan="14" ><input type="submit" class="btn btn-primary" name="addorders" value="ADD" /></td></tr>';} else { ?>
     <tbody>
     <tr>
        <td>NO Recordes Found</td>
        
        
        
      </tr>
      </tbody>
      <?php }?>
   
  </table>
  </form>
</div>


