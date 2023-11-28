<?php
$pagename="assigndoors";
include('classes/assigndoors.php');
include('include/back.php');

?>


<div class="container signup adduser">
  
  <div class="row">
    <div class="col-12-xs col-sm-10 col-lg-8 col-lg-offset-2 col-sm-offset-1">
      <div class="form-cont">
        <h3>Assign Order to user</h3>
        
         
       
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label for="user_id" class="text-capitalize">Choose Users</label>
            <select  name="user_id" required>
            <option value="">Select Users...</option>
            <?php 
            if($users!=0){
        for($i=0;$i<count($users);$i++) {  
        if(isset($findByID['id'])) {
            echo $useridname = $users[$i]['admin_id']."|".$users[$i]['name'];
            if($useridname == $findByID['user_id'])
                $selected = "selected";
                else $selected = "";
                
        }?>
            <option value="<?=$users[$i]['admin_id']."|".$users[$i]['name'] ?>" <?=$selected?>><?=$users[$i]['name']?></option>
			 <?php }} ?>  
    </select >
          </div>

          <div class="form-group">
            <label for="Doors" class="text-capitalize">Choose Doors</label>
            <select  name="Doors[]" id="Doors" multiple="multiple">
            <?php 
            if($maindoors!=0){
                $arry = [];
                if(isset($findByID['id'])) {
                    
                    $setids=explode(",",$findByID['setids']);
                    //$spsetids=explode("|",$setids[$i]);
                    
                    for($j=0;$j<count($setids);$j++) {  
                        $spsetids=explode("|",$setids[$j]);
                        $arrykey[$spsetids[1]] = $spsetids[1];
                        $arryvlue[$spsetids[1]] = $spsetids[0];
                    }
                   // echo  $arryvlue[$i]."|".$arrykey[$i];
               }
        for($i=0;$i<count($maindoors);$i++) {  
            if($maindoors[$i]['door_id']."|".$i == $arryvlue[$i]."|".$arrykey[$i])
                         $selected = 'selected';
                         else $selected = "";
                         //echo "tet==".$arryvlue[$i]
        ?>
            <option value="<?=$maindoors[$i]['door_id']."|".$i ?>" <?=$selected?>><?=$maindoors[$i]['door_name']?></option>
			 <?php }} ?>    
             </select>
          </div>


         <div class="form-group">
            <div class="col-sm-12">
             <button type="submit" name="sub" value="sub" class="btn btn-warning pull-right">Assign To Users</button>
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
  <table id="example_new" class="table table-bordered">
   
    <?php 
    if($assigndoors!=0){?>
    <thead>
      <tr>
        <th>User Name</th>
        <th>User Name</th>
        <th>EDit</th>
        <th>Delete</th>
       
      </tr>
    
</thead>
    <?php for($i=0;$i<count($assigndoors);$i++) {
        $username=explode("|",$assigndoors[$i]['user_id'])[1];
                ?>
     
      <tr>
        <td><?=$username?></td>
        <td><?=$assigndoors[$i]['doorname']?></td>
         <td><a href="ordertouser?update_id=<?= $assigndoors[$i]['id']?>">Edit</a></td>
         <td><a href="ordertouser?delete_id=<?= $assigndoors[$i]['id']?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>
        
        
        
      </tr>
     
     <?php }} else { ?>
     
     <tr>
        <td>NO Recordes Found</td>
        
        
        
      </tr>
      <?php }?>
   
  </table>
</div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
   // In your Javascript (external .js resource or <script> tag)
   $(document).ready(function() {
      $('#Doors').select2();
   });
</script>