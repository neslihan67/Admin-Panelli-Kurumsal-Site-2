 <!--/ bradcam_area  -->
  <div class="bradcam_area bradcam_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>EKİBİMİZ</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <!--/finish bradcam_area  -->		







 
 <!--/start my contact band  -->
		
      <div style="background-color:orange; width:100%; height:auto; padding-bottom:10px; border-color:blue; border-style:none  none dotted none;"><br>
			<?php
			
			$veriler=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array("misyonumuz",1),"ORDER BY ID ASC",1);
			if($veriler!=false)
			{  $metin=strip_tags(stripslashes($veriler[0]["Metin"]));
							  $Temizmetin=$DB->kucukten_buyuge($metin);
							  $Tertemizmetin=strtoupper($Temizmetin);
							  
                               ?>
			  	<h4 style="color:white;  text-align:center;"><?=$Tertemizmetin?></h4>
				<div style="text-align:center; font-color:white;" class="container">
				<button class="btn btn-lg" style="background-color:#f5002d;color:white; border-style:none;">
				<a style="color:white;" href="<?=SITE?>iletisim">BİZE ULAŞIN</a></button>
				   
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
 <!--/finish my contact band  -->




 
 <!--/start my team show  -->	

<div style="padding-top:20px; margin-top:0px; background-color:#f0f8ff;" class="team_area"> 
  <div style="padding-top:50px; margin-bottom:50px;" class="explorer_europe" style="margin-top:30px;">
        <div class="container">
		<h1 style="text-align:center; padding-bottom:20px;" >EKİBİMİZ</h1>
            <div class="row align-items-center">
			
			<?php
						 
				$veri=$DB->VeriGetir("kullanicilar","","","ORDER BY ID ASC");
				if($veri!=false)
				{
				    for($i=0; $i<count($veri); $i++)
					{
						if(!empty($veri[$i]["Resim"]))
						{
							$resim=$veri[$i]["Resim"];
							?>
							<div class="col-xl-3 col-md-4 col-sm-12">
						     <div class="single_team">
                              <div class="team_thumb">
                                <img style="width:100%;height:230px;" src="<?=SITE?>images/Avukatlarimiz/<?=$resim?>" alt="">
                                  <div class="social_link">
                                    <ul>
                                    <li><a href="<?=$veri[$i]["Facebook"]?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="<?=$veri[$i]["Twitter"]?>"> <i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="<?=$veri[$i]["Instagram"]?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    </ul>
                                  </div>
                              </div>
						     </div>  
										  
                             <div class="team_info text-center">
                              <a href="<?=SITE?>avukat-detay/<?=$veri[$i]["KullaniciAdi"]?>"><h3><?=$veri[$i]["Adsoyad"]?></h3></a>
                              <button class="btn btn-warning"><a href="<?=SITE?>avukat-detay/<?=$veri[$i]["KullaniciAdi"]?>">Biyografi</a></button><hr>
                             </div>
									
                              
                            </div>
							<?php
										
						}
						else
						{
							?>
							<div class="col-xl-3 col-md-4 col-sm-12">
						     <div class="single_team">
                              <div class="team_thumb">
                                <img style="width:100%;height:230px;" src="<?=SITE?>images/Avukatlarimiz/<?=$resim?>" alt="">
                                  <div class="social_link">
                                    <ul>
                                    <li><a href="<?=$veri[$i]["Facebook"]?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="<?=$veri[$i]["Twitter"]?>"> <i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="<?=$veri[$i]["Instagram"]?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    </ul>
                                  </div>
                              </div>
						     </div>  
										  
                             <div class="team_info text-center">
                              <a href="<?=SITE?>avukat-detay/<?=$veri[$i]["KullaniciAdi"]?>"><h3><?=$veri[$i]["Adsoyad"]?></h3></a>
                              <button class="btn btn-warning"><a href="<?=SITE?>avukat-detay/<?=$veri[$i]["KullaniciAdi"]?>">Biyografi</a></button><hr>
                             </div>
									
                              
                            </div>
							<?php
						}
				    }
				}
				
			?>	
         </div>
     </div>
   </div>
</div>






















