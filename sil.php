
<?php

if(!empty($_GET["tablo"]) && !empty($_GET["ID"]))
{
	
	$tablo=$DB->Filter($_GET["tablo"]);
	$ID=$DB->Filter($_GET["ID"]);
	
	$kontrol=$DB->VeriGetir("moduller","WHERE Tablo=? AND Durum=?",array($tablo,1),"ORDER BY ID ASC",1);

	if($kontrol!=false)
	{
		$veri=$DB->VeriGetir($kontrol[0]["Tablo"],"WHERE ID=?",array($ID),"ORDER BY ID ASC");
	      if($veri!=false)
		  {
			 $sil=$DB->SorguCalistir("DELETE FROM ".$tablo,"WHERE ID=?",array($ID),1); 
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>liste/<?=$kontrol[0]["Tablo"]?>">
	         <?php
		  }		
          else
          {
			 ?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>liste/<?=$kontrol[0]["Tablo"]?>">
	         <?php
		  }			  
	  
	
		}

		
		else
		{
			?>
			<meta http-equiv="refresh" content="0;url=<?=SITE?>">
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

  
	