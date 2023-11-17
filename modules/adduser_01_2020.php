<?php
$pagename="adduser";
include('classes/functions.php');
include('include/back.php');
?>


<div class="container signup">
  
  <div class="row">
    <div class="col-12-xs col-sm-10 col-lg-8 col-lg-offset-2 col-sm-offset-1">
      <div class="form-cont">
        <h3>Add User</h3>
       
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
            <label for="inputEmail3" class="text-capitalize">User Name</label>
            <input type="text" name="name" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}"   placeholder="User Name">
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="text-capitalize">Password</label>
            <input type="password" name="password" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}" id="password" placeholder="Password">
          </div>
           <div class="form-group">
            <label for="inputPassword4" class="text-capitalize">Confirm Password</label>
            <input type="password" name="confirm_pass" class="form-control {validate:{required:true,equalTo:'#password',messages:{required:'<?=$required?>',equalTo:'Confirm Password is not same'}}}" id="confirmpassword" placeholder="Password">
          </div>
           <div class="form-group">
            <label for="inputPassword4" class="text-capitalize">User Type</label>
            <input type="radio" name="usertype" value="admin" >
            Admin
             <input type="radio" value="exe" name="usertype" >
             executive
          </div>
         
         <div class="form-group">
            <div class="col-sm-12">
             <button type="submit" name="sub" value="sub" class="btn btn-warning pull-right">Add User</button>
           
             
              
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
           <h2>View Users <?php if($_REQUEST['delete'] == 'success') echo "<label class='error'>Deleted successfully</label>" ?></h2>
  <table id="example" class="table table-bordered">
   
    <?php 
    if($select_all!=0){?>
    <thead>
      <tr>
        <th>User Name</th>
        <th>Delete</th>
       
      </tr>
    </thead>

    <?php for($i=0;$i<count($select_all);$i++) {?>
      <tr>
        <td><?=$select_all[$i]['name']?></td>
         <td><a href="adduser?delete_id=<?= $select_all[$i]['admin_id']?>" onclick="return ConfirmDialog('Are you sure You Want to delete!');">Delete</a></td>
        
        
        
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
