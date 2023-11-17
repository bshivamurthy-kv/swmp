<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SMWP</title>
<link href="<?php echo $roo_path ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $roo_path ?>css/fonts.css" rel="stylesheet">
<link href="<?php echo $roo_path ?>css/jquery-ui.css" rel="stylesheet">





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo $roo_path ?>js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $roo_path ?>js/bootstrap.min.js"></script>
<script src="<?php echo $roo_path ?>js/jquery-ui.js"></script>

<script src="<?php echo $roo_path ?>js/jquery.validate.js"></script>
  <script src="<?php echo $roo_path ?>js/meta.js"></script>
<script src="<?php echo $roo_path ?>js/account.js"></script>
<script src="<?php echo $roo_path ?>js/bootstrap-dialog.min.js"></script>
<script type="text/javascript" src="<?php echo $roo_path ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $roo_path ?>js/dataTables.bootstrap.min.js"></script>
 <?php
 
 $commonlink = 'index';
 if($setsession==1)
 {
 	$commonlink = 'home';
 }
 ?>  
 <script type="text/javascript">
<!--
var program = '<?php echo $_REQUEST['program'] ?>';

var bFilter = true;
$(document).ready(function() {
	if($('#listResults').length){bFilter = true;}
    $('#example').DataTable({
    	"bFilter": bFilter,
    	"bSort" : false
    	 
		});
		
		$('#listResults').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": {
            "url": "include/server_processing.php?odredrlist="+program,
            "data": function ( d ) {
                
            }
		},
		"order": [[0, 'ASC']],
		"columnDefs": [
           
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    	 
        });    


   
  
});
$(window).load(function() {
	// Animate loader off screen
	$(".se-pre-con").fadeOut("slow");;
});
function ConfirmDialog(message){
	var r=confirm(message);
	if (r==true)
	  {
		return true;
	  }
	else
	{
		return false;
	}
    }

function goBack() {
    window.history.back();
}

//-->
</script>
 
 <style>
/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
}
</style>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>

  <nav class="navbar navbar-inverse">
    <div class="container">
     <div class="row">
  <div class="col-sm-10 col-xs-10 col-lg-10"><a class="navbar-brand" href="<?=$commonlink?>">SMWP</a></div>
  <?php
  if($setsession==1)
  { 
  echo '<div align="right" class="col-sm-2 col-xs-2 col-lg-2 align-right" ><a class="navbar-brand text-xs-right" href="logout">Logout</a></div>';
  } 
  
  ?>
 </div>
 </div>
 
  </nav>
</header>
<div class="se-pre-con"></div>


