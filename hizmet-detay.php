<?php

if(!empty($_GET["seflink"]))
{
	$seflink=$DB->Filter($_GET["seflink"]);
	$veri=$DB->VeriGetir("hizmetler","WHERE Seflink=? AND Durum=?",array($seflink,1),"ORDER BY ID ASC",1);
	
}
?>  


  <div class="bradcam_area bradcam_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3><?=stripslashes($veri[0]["Baslik"])?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ bradcam_area  -->
			      <div style="background-color:orange; width:100%; height:auto; padding-bottom:10px; border-color:blue; border-style:none  none dotted none;"><br>
			<?php
			
			$veriler=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array("misyonumuz",1),"ORDER BY ID ASC",1);
			if($veriler!=false)
			{  $metin=strip_tags(stripslashes($veriler[0]["Metin"]));
							  $Temizmetin=$DB->kucukten_buyuge($metin);
							  $Tertemizmetin=strtoupper($Temizmetin);
							  
                               ?>
			  	<h4 style="color:white;  text-align:center;"><?=$Tertemizmetin?></h4><div style="text-align:center; font-color:white;" class="container">
				<button class="btn btn-lg" style="background-color:#f5002d;color:white; border-style:none;"> <a style="color:white;" href="<?=SITE?>iletisim">BİZE ULAŞIN</a></button>
				   
					</div>		
                                  
                                     
										
                               
              <?php
			}
            else
			{?>
				<div class="alert alert-danger">Misyonumuz Alanı Veri tabanında bulunamamaktadır.Ya da işlemi daha sonra tekrar deneyın.</div>
				<?php
			}
			?>
			
     </div>
            
    <!-- about_mission  -->
    <div style="padding-top:10px; padding-bottom:100px; " class="about_mission">
        <div  style="padding-top:30px; padding-bottom:30px; " class="container">
            <div style="padding-left:0px; padding-right:0px; margin-left:0px; margin-right:0px;" class="row align-items-center">
			
			<?php
			if(!empty($veri[0]["Resim"]))
			{
				?>
				
                  <div style="text-align:center; padding-top:10px; background-color:#f5f5ff; border-style:solid none none solid; border-color:#deb887; border-width:3px; padding-bottom:10px;" class="col-12">

                        <img style="width:280px; height:auto;" src="<?=SITE?>images/hizmetler/<?=$veri[0]["Resim"]?>">

                       </div>

                        <div style="padding-bottom:20px; margin-bottom:20px; border-style:none solid solid none; border-color:#deb887; background-color:white; border-width:3px;" class="col-12">
                     <h2 style="text-align:center;"><?=$veri[0]["Baslik"]?></h2>
                       <h5 style="text-align:center;"><p><?=strip_tags(stripslashes($veri[0]["Metin"]))?>...</p></h5>
                        </div>
						
                
				<?php
			}
			else
			{
				?>
				
                        <div style="padding-bottom:20px; margin-bottom:20px; border-style:none solid solid none; border-color:#deb887; background-color:white; border-width:3px;" class="col-12">
                     <h2 style="text-align:center;"><?=$veri[0]["Baslik"]?></h2>
                       <h5 style="text-align:center;"><p><?=strip_tags(stripslashes($veri[0]["Metin"]))?>...</p></h5>
                        </div>
                </div>
				
				<?php
			}
			?>
			
                
            </div>
        </div>
    </div>
   
   

	