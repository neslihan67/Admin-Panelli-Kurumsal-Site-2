			
		
  <div class="bradcam_area bradcam_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h4 style="font-family:Montserrat, sans-serif">HİZMETLERİMİZ</h4>
								
				
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <div style="padding-top:50px; margin-bottom:50px;" class="explorer_europe" style="margin-top:30px;">
        <div class="container">
		<h1 style="text-align:center; padding-bottom:20px;" >HİZMETLERİMİZ</h1>
            <div class="row align-items-center">
			<?php
			
			$veri=$DB->VeriGetir("hizmetler","WHERE Durum=?",array(1),"ORDER BY Sirano ASC");
			if($veri!=false)
			{
		
				for($i=0; $i<count($veri);$i++)
				{
				
				if(!empty($veri[$i]["Resim"]))
				{
					$resim=$veri[$i]["Resim"];
					?>
					 <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single_explorer">
                                <div class="thumb">
                                    <img style="width:100%; height:200px;"src="<?=SITE?>images/hizmetler/<?=$resim?>" alt="<?=stripslashes($veri[$i]["Baslik"])?>">
                                </div>
                                <div class="explorer_bottom d-flex">
                                    <div class="explorer_info">
                                        <h3><a href="<?=SITE?>hizmet-detay/<?=$veri[$i]["Seflink"]?>"><?=$veri[$i]["Baslik"]?></a></h3>
                                            <p><?=mb_substr(strip_tags(stripslashes($veri[$i]["Metin"])),0,120,"UTF-8")?>...</p>
								    </div>
                                </div>
                            </div>
                        </div>
			<?php
				}
				else
				{
					$resim='varsayilan.png';
				}
			}
			}
			
			?>
			
			 </div>
           </div>
        </div>