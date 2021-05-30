   

  <?php

if(!empty($_GET["seflink"]))
{
	$seflink=$DB->Filter($_GET["seflink"]);
	$veri=$DB->VeriGetir("bloglar","WHERE Seflink=? AND Durum=?",array($seflink,1),"ORDER BY ID ASC",1);
	
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
             <div style="background-color:orange; width:100%; height:auto; padding-bottom:30px; border-color:blue; border-style:none  none dotted none;"><br>
			<?php
			
			$veriler=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array("misyonumuz",1),"ORDER BY ID ASC",1);
			if($veriler!=false)
			{  $metin=$veriler[0]["Metin"];
							  
                               ?>
			  	<h4 style="color:white; text-align:center;"><?=$veriler[0]["Metin"]?></h4>      <?php
			}
            else
			{?>
				<div class="alert alert-danger">Misyonumuz Alanı Veri tabanında bulunamamaktadır.Ya da işlemi daha sonra tekrar deneyın.</div>
				<?php
			}
			?>
			
     </div>
    <!-- about_mission  -->
    <div style="padding-top:20px; margin-bottom:50px;background-color:#f8f4ff">
        
			
			<?php
			if(!empty($veri[0]["Resim"]))
			{
				?>
			<div class="container">
				<div style="text-align:center; padding:0px; margin:0px; border-color:#DEB887; border-style=solid; border-width:3px;" class="col-12">

                        <img style="width:280px; height:auto;" src="<?=SITE?>images/bloglar/<?=$veri[0]["Resim"]?>">

                       </div>
					   <hr>

                        <div style="padding-bottom:20px; border-color:grey; border-style=solid; border-width:1px; background-color:white;" class="col-12">
                     <h3 style="text-align:center;"><a href="<?=SITE?>blog-detay/<?=$veri[0]["Seflink"]?>"><?=$veri[0]["Baslik"]?></a></h3>
			<h5 style="text-align:center;"><p><?=$veri[0]["Metin"]?></p></h5>

                      </div>
				
               </div>
			
				<?php
			}
			else
			{
				?>
				<div class="container">
							        						   
                        <div style="padding-bottom:20px;" class="col-12">
                     <h3 style="text-align:center;"><a href="<?=SITE?>blog-detay/<?=$veri[0]["Seflink"]?>"><?=$veri[0]["Baslik"]?></a></h3>
                       <h5 style="text-align:center;"><p><?=strip_tags(stripslashes($veri[0]["Metin"]))?>...</p></h5>

                      </div>
					  </div>
				<?php
			}
			
			?>
			
                
   
      
    </div>
   
   

	


    

    <!-- testimonial_area  -->
   