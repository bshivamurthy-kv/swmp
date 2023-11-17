<?php
$pagename="index";
include('classes/functions.php');


?>






<div class="container signup">
  
  <div class="row">
    <div class="col-12-xs col-sm-10 col-lg-8 col-lg-offset-2 col-sm-offset-1">
      <div class="form-cont">
      <?php if(isset($msg1) && ($msg1==0)) {?> 
	 <div class="alert alert-warning">
    <strong>Warning!</strong> Invalid Login
  </div>
	  <?php } ?>
        <h3>Login</h3>
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label for="inputEmail3" class="text-capitalize">User Name</label>
            <input type="text" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}" id="name"  name="name" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="text-capitalize">Password</label>
            <input type="password" class="form-control {validate:{required:true,messages:{required:'<?=$required?>'}}}" id="inputPassword3" name="password" placeholder="Password">
          </div>
         
         <div class="form-group">
            <div class="col-sm-12">
             <button type="submit" name="sub" value="sub" class="btn btn-warning pull-right">Login</button>
           
             
              
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



