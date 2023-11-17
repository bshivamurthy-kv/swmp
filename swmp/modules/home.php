





<div class="col-lg-12 cont-bg marketing">
        
        <div class="col-lg-12">
        <?php if(isset($_REQUEST['oder']) && ($_REQUEST['oder']=='over')) {?> 
	 <div class="alert alert-warning">
    <strong>Sorry Your Dilay Order Over <?=$_SESSION['user_deatils']['min_day_order']?></strong> 
  </div>
	  <?php } ?>
         
     
   <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="addCustomer">
              <button  class="btn btn-info">Add Customer</button>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
           <div class="projects">
              <a href="DayOrder">
              <button  class="btn btn-info">Add Old Order</button>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
           <div class="projects">
              <a href="NewDayOrder">
              <button  class="btn btn-info">Add New Order</button>
              </a>
            </div>
          </div>
          <?php if(($_SESSION['user_deatils']['usertype'] == 'exe')) {?>
          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="viewOrder">
               <button  class="btn btn-info">View Order</button>
              </a>
           </div>
          </div>
         
         <?php } if(($_SESSION['user_deatils']['usertype'] == 'admin')) {?>
          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="Allorder">
               <button  class="btn btn-info">Admin Type Orders</button>
              </a>
             
              
              
            </div>
          </div>
           <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="Mainorder">
               <button  class="btn btn-info">ALL Orders List</button>
              </a>
             
              
              
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="adddoors">
               <button  class="btn btn-info">Add Main Doors</button>
              </a>
             
              
              
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="addroot">
               <button  class="btn btn-info">Add Route</button>
              </a>
             
              
              
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="adduser">
               <button  class="btn btn-info">Add Users</button>
              </a>
             
              
              
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-mb-6 col-lg-4">
            <div class="projects">
              <a href="stocks">
               <button  class="btn btn-info">Manage Stocks</button>
              </a>
             
              
              
            </div>
          </div>
          
          <?php }?>
          
          
          
          
         
       
         
     
    </div>
      </div>



