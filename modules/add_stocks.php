<?php
$pagename="ALLStocks";
include('classes/getOrder.php');
include('include/back.php');
?>

<div class="container profile-view">
  <div class="col-12-xs col-sm-12 col-lg-12">
    <h2 class="title">Add Stocks</h2>
    
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
         
         
          
           <div class="form-group"  id="formsub_door">
            <label class="text-capitalize">Door</label>
           <select  name="door_name" onchange="fetchAll('tbl_sub_doors','main_doorid',this,'sub_door_name')"  id="door_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?> Main Door'}}}">
            <option value="">Select Main Door...</option>
            <?php 
            if($maindoors!=0){
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
           <input type="number" placeholder="QTY" name="quantity" value="<?=$findByID['quantity']?>" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
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
          
          
          
          <?php if(($_SESSION['user_deatils']['usertype'] == 'admin') && (isset($_REQUEST['update_id']) && $_REQUEST['update_id'] != '') ) {?>
         <div class="form-group">
            <label class="text-capitalize">Order Status</label>
           <select  name="Status" id="Status" class="form-control {validate:{required:true,messages:{required:'<?=$onlyrequired?>'}}}">
 
           <option value="">Select Status</option>
            <?php 
            if(isset($orderStock))
            {
        for($t=0;$t<count($orderStock);$t++) {  
        if(isset($findByID['status'])) {
        	
            if($findByID['status'] == $orderStock[$t])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$orderStock[$t]?>" <?=$selected?>><?=$orderStock[$t]?></option>
			 <?php }} ?>
            
             
          </select>
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
         
          
          
        <!--<div class="form-group">
          <div class="col-xs-12">
          
            Order Pendeing
          </div>
          < ?php if($getcount != '0') { ?>
           <div class="col-xs-6">
            < ?=$getcount['totalcount']?>
          </div>
          < ?php } ?>-->
          
        </div>
        
        
        
        
        
        
      </div>
      
    </div>
  </div>
  
</div>

