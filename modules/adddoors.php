<?php
$pagename="addDoors";
include('classes/functions.php');
include('include/back.php');

?>


<div class="container signup adduser">
  
  <div class="row">
    <div class="col-12-xs col-sm-10 col-lg-8 col-lg-offset-2 col-sm-offset-1">
      <div class="form-cont">
        <h3>Add Main Doors <span><a href="sub_doors?type=<?php echo $doortype; ?>">--Add Sub Doors--</a></span></h3>
        
         
       
        <form class="form-horizontal" method="post">
         <?php  if(is_array($responce['ErrorFildes'])&& !empty($responce['ErrorFildes']))
            {
                foreach($responce['ErrorFildes'] as $key => $posts)
                {
                    echo "<label class='error'>Please Enter ".$posts."</label>";
                } 
            }
            if($doortype=='old') {
         ?>

          <div class="form-group">
          <label for="inputEmail3" class="text-capitalize"><a href="adddoors?type=new">Add New Door Type</a></label>
          </div>
          <div class="form-group">
          <label for="inputEmail3" class="text-capitalize"><a href="adddoors?type=2023">Add New Door Type 2023</a></label>
          </div>
            <?php } ?> 
          <div class="form-group">
            <label for="inputEmail3" class="text-capitalize">Door Name</label>
            <input type="text" name="door_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}" value="<?=$findByID['door_name']?>"   placeholder="Door Name">
          </div>
          
           
           
         
         <div class="form-group">
            <div class="col-sm-12">
             <button type="submit" name="sub" value="sub" class="btn btn-warning pull-right">Add Door</button>
           
             
              
            </div>
          </div>
         
          <div class="form-group">
            <div class="col-sm-12">
            
              
              
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
 
</div>
<div class="container backgroundcolors" >
           <h2>View Users <?php if($_REQUEST['delete'] == 'success') echo "<label class='error'>Deleted successfully</label>";
           if($_REQUEST['update'] == 'success') echo "<label class='error'>Updated successfully</label>";
           ?></h2>
  <table id="example" class="table table-bordered">
   
    <?php 
    if($select_all!=0){?>
    <thead>
      <tr>
        <th>User Name</th>
        <th>EDit</th>
        <th>Delete</th>
       
      </tr>
    
</thead>
    <?php for($i=0;$i<count($select_all);$i++) {?>
     
      <tr>
        <td><?=$select_all[$i]['door_name']?></td>
         <td><a href="adddoors?update_id=<?= $select_all[$i]['door_id']?>&type=<?php echo $doortype; ?>">Edit</a></td>
         <td><a href="adddoors?delete_id=<?= $select_all[$i]['door_id']?>&type=<?php echo $doortype; ?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>
        
        
        
      </tr>
     
     <?php }} else { ?>
     
     <tr>
        <td>NO Recordes Found</td>
        
        
        
      </tr>
      <?php }?>
   
  </table>
</div>
</div>
