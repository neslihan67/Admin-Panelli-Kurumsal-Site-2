
<?php

if(!empty($_GET["ID"]))
{
	
	
	$ID=$DB->Filter($_GET["ID"]);
	
	
		$veri=$DB->VeriGetir("siteresim","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
	      if($veri!=false)
		  {
			 $sil=$DB->SorguCalistir("DELETE FROM siteresim ","WHERE ID=?",array($ID),1); 
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>siteResim-liste">
	         <?php
		  }		
          else
          {
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>siteResim-liste">
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
