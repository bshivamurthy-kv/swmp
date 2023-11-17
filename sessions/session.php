<?php 
/*echo "<pre>";
print_r(@$_SESSION[adminlogindeatils]['id']);*/

class Session
{
	function checksession($session) 
	{
		
	   if(isset($session))
	  {
		  return '1';
	  }
	  else
	  {
		  return '0';
	  }
		
   }
}




//exit;
?>