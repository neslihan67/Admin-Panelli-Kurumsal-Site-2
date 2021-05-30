<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
if(!empty($_GET["seflink"]))
{
	$seflink=$DB->Filter($_GET["seflink"]);
	$veri=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array($seflink,1),"ORDER BY ID ASC",1);
	
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
            
    <!-- about_mission  -->
	 <div style="background-color:orange; width:100%; height:auto; padding-bottom:30px; border-color:blue; border-style:none  none dotted none;"><br>
			<?php
			
			$veriler=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array("misyonumuz",1),"ORDER BY ID ASC",1);
			if($veriler!=false)
			{ $metin=strip_tags(stripslashes($veriler[0]["Metin"]));
							  $Temizmetin=$DB->kucukten_buyuge($metin);
							  $Tertemizmetin=strtoupper($Temizmetin);
							  
                               ?>
			  	<h4 style="color:white;  text-align:center;"><?=$Tertemizmetin?></h4>
              <?php
			}
            else
			{?>
				<div class="alert alert-danger">Misyonumuz Alanı Veri tabanında bulunamamaktadır.Ya da işlemi daha sonra tekrar deneyın.</div>
				<?php
			}
			?>
			
     </div>
	
    <div style="padding-top:50px; margin-bottom:30px;" class="about_mission">
        <div class="container">
            <div class="row">
			
			<?php
			if(!empty($veri[0]["Resim"]))
			{
				?>
				
				<div  style="padding:0px; margin:0px; border-style:solid none none solid; border-width:3px; border-color:#deb887;" class="col-xl-5 col-md-5">
                    <div class="about_thumb">
                        <img src="<?=SITE?>images/kurumsal/<?=$veri[0]["Resim"]?>" style="width:100%; height:auto;" alt="">
                       
                    </div>
                </div>
                <div  style="text-align:center; border-style:none solid solid none; border-width:3px; border-color:#deb887;" class="col-xl-7 col-md-7">
                    <div style="text-align:center;" class="about_text"><h2><?=$veri[0]["Baslik"]?></h2><hr>
                        <p  ><?=stripslashes($veri[0]["Metin"])?></p>
                    </div>
                </div>
				<?php
			}
			else
			{
				?>
				  <div  style="text-align:center;padding:0px; margin:0px; border-style:none solid solid none; border-width:3px; border-color:#deb887;" class="col-12">
                    <div class="about_text"><hr>
                        <p style="text-align:center;"><?=stripslashes($veri[0]["Metin"])?></p>
                    </div>
                </div>
				
				<?php
			}
			?>
			
                
            </div>
        </div>
    </div>
	