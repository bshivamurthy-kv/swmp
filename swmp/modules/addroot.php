<?php
$pagename="addRoot";
include('classes/functions.php');
include('include/back.php');
?>


<div class="container signup adduser">
  
  <div class="row">
    <div class="col-12-xs col-sm-10 col-lg-8 col-lg-offset-2 col-sm-offset-1">
      <div class="form-cont">
        <h3>Add Roots</h3>
       
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
            <label for="root_name" class="text-capitalize">Root Name</label>
            <input type="text" name="root_name" id="root_name" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}" value="<?=$findByID['root_name'] ?>"   placeholder="User Name">
          </div>
          
           
           
         
         <div class="form-group">
            <div class="col-sm-12">
             <button type="submit" name="sub" value="sub" class="btn btn-warning pull-right">Add Root</button>
           
             
              
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
        <td><?=$select_all[$i]['root_name']?></td>
         <td><a href="addroot?update_id=<?= $select_all[$i]['root_id']?>">Edit</a></td>
         <td><a href="addroot?delete_id=<?= $select_all[$i]['root_id']?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>
        
        
        
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
