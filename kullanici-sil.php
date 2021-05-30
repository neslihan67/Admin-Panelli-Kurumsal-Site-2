
<?php

if(!empty($_GET["ID"]))
{
	
	
	$ID=$DB->Filter($_GET["ID"]);
	
	
		$veri=$DB->VeriGetir("kullanicilar","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
	      if($veri!=false)
		  {
			 $sil=$DB->SorguCalistir("DELETE FROM kullanicilar ","WHERE ID=?",array($ID),1); 
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>kullanici-liste">
	         <?php
		  }		
          else
          {
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>kullanici-liste">
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

  
	