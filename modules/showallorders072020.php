<form method="post" action="include/fetchAll.php" id="myfrm">    
<div class="container backgroundcolors" >
  <h2>Admin PANEL</h2>
  
  <!-- <p>The .table-bordered class adds borders to a table:</p>    -->     
  
  <table id="listResults" class="table table-bordered">
   
    
    <thead>
      <tr>
      <th></th>
        <th>RN</th>
        <th>Shop Name</th>
        <th>MDR</th>
        <th>SDR</th>
        <th>H1</th>
        <th>H2</th>
        <th>w1</th>
        <th>w2</th>
        
        <th>QTY</th>
        <th>clr</th>
        <th>Tag</th>
        <th>LR Number</th>
        <th>Sts</th>
        
        <th>Crated</th>
        <th>Modified</th>
        <th>DELVRD</th>
        <th>EDIT</th>
       
      </tr>
      
      
  
    
</thead>
  
  </table>
  
  
  <div class="otheroptions" >
    <table class="table"  >
    <tr><td > <div class="redstatus"></div><div >Canceled</div></td>
        <td > <div class="whitestatus"></div><div >Pending</div></td>
      
        <td > <div class="orangeredstatus"></div><div >Deliverd</div></td>
        <td><span class="download"></span> <a class="download"  href="javascript:submitForm('downloadorder');">Download</a></td>
        <td><span class="download"></span> <a class="download"  href="javascript:submitForm('Delevired');">Change Status</a></td>
        </tr>
        </table>
    <input type="hidden" id="pagename" name="pagename" value="downloadorder">
    <input type="hidden" id="redirectpage" name="redirectpage" value="<?=$_REQUEST['program']?>">
   </div>
   
</div>
</form>
