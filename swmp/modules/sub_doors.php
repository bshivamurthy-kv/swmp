<?php
$pagename="sub_doors";
include('classes/functions.php');
include('include/back.php');
?>


<div class="container signup adduser">
  
  <div class="row">
    <div class="col-12-xs col-sm-10 col-lg-8 col-lg-offset-2 col-sm-offset-1">
      <div class="form-cont">
        <h3>Add Sub Doors</h3>
        
         
       
        <form class="form-horizontal" method="post">
         <?php  if(is_array($responce['ErrorFildes'])&& !empty($responce['ErrorFildes']))
            {
                foreach($responce['ErrorFildes'] as $key => $posts)
                {
                    echo "<label class='error'>Please Enter ".$posts."</label>";
                } 
            }
         ?>
         
         <div class="form-group">
          <label for="sel1">Select Main Doors:</label>
          <select class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}" name="main_doorid">
          <option value="">Select Main Doors</option>
          
           <?php 
           if($get_alldoors!=0){?>
    <?php for($i=0;$i<count($get_alldoors);$i++) { 
        if(isset($findByID['main_doorid'])) {
            if($get_alldoors[$i]['door_id'] == $findByID['main_doorid'])
                $selected = "selected";
                else $selected = "";
        }
        ?>
     <option value="<?= $get_alldoors[$i]['door_id'].'|'.$get_alldoors[$i]['door_name']?>" <?=$selected?>><?= $get_alldoors[$i]['door_name']?></option>
    
     <?php }} else { ?>
     <option>NO Recordes Found</option>
   
      <?php }?>
           
            
          </select>
        </div>
          <div class="form-group">
            <label for="inputEmail3" class="text-capitalize">Door Name</label>
            <input type="text" name="subdoor_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}" value="<?=$findByID['sub_door_name']?>"   placeholder="Door Sub Name">
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
      <th>Main Door Name</th>
        <th>Sub Door Name</th>
        <th>EDit</th>
        <th>Delete</th>
       
      </tr>
    
</thead>
    <?php for($i=0;$i<count($select_all);$i++) {?>
      <tr>
        <td><?=$select_all[$i]['main_doorname']?></td>
        <td><?=$select_all[$i]['sub_door_name']?></td>
         <td><a href="sub_doors?update_id=<?= $select_all[$i]['sub_door_id']?>&type=<?php echo $doortype; ?>">Edit</a></td>
         <td><a href="sub_doors?delete_id=<?= $select_all[$i]['sub_door_id']?>&type=<?php echo $doortype; ?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>
        
        
        
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
</div>
