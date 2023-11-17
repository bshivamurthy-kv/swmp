<?php
$pagename="addCustomer";
include('classes/functions.php');
include('include/back.php');

?>


<div class="container project-detail">
  
  <div class="row">
    <div class="col-12-xs col-sm-10 col-lg-8 col-lg-offset-2 col-sm-offset-1">
      <div class="form-cont">
        <h3>ADD CUSTOMER</h3>
        <?php  if(is_array($responce['ErrorFildes'])&& !empty($responce['ErrorFildes']))
            {
                foreach($responce['ErrorFildes'] as $key => $posts)
                {
                    echo "<label class='error'>Please Enter ".$posts."</label>";
                } 
            }
         ?>
        <form method="post">
          <div class="form-group">
            <label class="text-capitalize">Rroute Name</label>
           
           <select  name="root_name" id="rote_name" class="form-control {validate:{required:false,messages:{required:'<?=$required?>'}}}">
            <option value="">Select one...</option>
            <?php 
            if($roots!=0){
        for($i=0;$i<count($roots);$i++) {  if(isset($findByID['customer_id'])) {
           if($roots[$i]['root_id'] == $findByID['route_id'])
                $selected = "selected";
                else $selected = "";
        }?>
            <option value="<?=$roots[$i]['root_id'].'|'.$roots[$i]['root_name'] ?>" <?=$selected?>><?=$roots[$i]['root_name']?></option>
			 <?php }} ?>
		</select>
          </div>
          <div class="form-group">
            <label class="text-capitalize">Shop Name</label>
            <input type="text"  placeholder="Shop Name" name="shop_name" id="shop_name" value="<?=$findByID['shop_name']?>" class="form-control {validate:{required:false,messages:{required:'<?=$required?>'}}}">
          </div>
           <div class="form-group">
            <label class="text-capitalize">GST</label>
            <input type="text" placeholder="Title of the Project" name="gst" id="gst" value="<?=$findByID['GST']?>" class="form-control {validate:{required:false,messages:{required:'<?=$required?>'}}}">
          </div>
          <div class="form-group">
            <label class="text-capitalize">Customer Name</label>
            <input type="text" placeholder="Customer Name"  name="customer_name" id="customer_name" value="<?=$findByID['customer_name']?>" class="form-control {validate:{required:false,messages:{required:'<?=$required?>'}}}">
          </div>
          <div class="form-group">
            <label class="text-capitalize">Mobile No</label>
            <input type="number" maxlength="10"  placeholder="Mobile No" name="mobile_no" id="mobile_no" value="<?=$findByID['mobile_no']?>" class="form-control {validate:{required:false,maxlength:true,messages:{required:'<?=$required?>',maxlength:'Mobile must be 10 Number'}}}">
          </div>
          
          
          
          <div class="form-group">
            <label class="text-capitalize">Address</label>
            <textarea placeholder="Address" name="address" id="address" class="form-control"><?=$findByID['address']?></textarea>
          </div>
          <button type="submit" name="sub" value="submit" class="btn btn-primary">Add customer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container backgroundcolors" >
           <h2>View Customer</h2>
  <table id="example" class="table table-bordered">
   
    <?php 
    if($select_all!=0){?>
    <thead>
      <tr>
        <th>Root Name</th>
        <th>Shop Name</th>
        <th>GST</th>
        <th>Customer Name</th>
        <th>Mobile Number</th>
        <th>EDit</th>
        <th>Delete</th>
       
      </tr>
    
</thead>
    <?php for($i=0;$i<count($select_all);$i++) {?>
    
      <tr>
        <td><?=$select_all[$i]['root_name']?></td>
         <td><?=$select_all[$i]['shop_name']?></td>
          <td><?=$select_all[$i]['GST']?></td>
           <td><?=$select_all[$i]['customer_name']?></td>
            <td><?=$select_all[$i]['mobile_no']?></td>
         <td><a href="addCustomer?update_id=<?= $select_all[$i]['customer_id']?>">Edit</a></td>
         <td><a href="addCustomer?delete_id=<?= $select_all[$i]['customer_id']?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>
        
        
        
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