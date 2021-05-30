
<?php

if(!empty($_GET["ID"]))
{
	
	
	$ID=$DB->Filter($_GET["ID"]);
	
	
		$veri=$DB->VeriGetir("logo","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
	      if($veri!=false)
		  {
			 $sil=$DB->SorguCalistir("DELETE FROM logo ","WHERE ID=?",array($ID),1); 
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>logo-liste">
	         <?php
		  }		
          else
          {
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>logo-liste">
	         <?php
		  }			  
	  
	
		}

	
					
      else
      {
     	?>
	     <meta http-equiv="refresh" content="0;url=<?=SITE?>">
	   <?php
       }	
					
     
					
	?>
