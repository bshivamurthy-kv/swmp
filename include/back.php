<?php $goback = 'javascript:goBack()';  if ((!isset($_REQUEST['delete']) && $_REQUEST['delete'] == '') ||        (!isset($_REQUEST['update']) && $_REQUEST['update'] == '')) {  	$goback = 'home';  }?>	<div class="container">     <div class="row">  <div class="col-sm-10 col-xs-10 col-lg-10"><a class="navbar-brand" href="<?=$goback?>" style="color: #fff;">&lt;&lt;back</a></div>   </div> </div>