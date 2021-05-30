 <?php

if(!empty($_GET["KullaniciAdi"]))
{
	$kullaniciAdi=$DB->Filter($_GET["KullaniciAdi"]);
	$veri=$DB->VeriGetir("kullanicilar","WHERE KullaniciAdi=?",array($kullaniciAdi),"ORDER BY ID ASC",1);
	
}
?>  
 

  <div class="bradcam_area bradcam_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>Av. <?=stripslashes($veri[0]["Adsoyad"])?></h3>
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
			  	<h4 style="color:white;  text-align:center;"><?=$Tertemizmetin?></h4>	<div style="text-align:center; font-color:white;" class="container">
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
	
 <div class="explorer_europe" style="margin-top:50px;"> 
       <div class="container"><hr><hr>
            <div class="row">
			
			<div class="col-md-3">
			
			<div class="single_team">
               <div style="padding-top:9px;" class="team_thumb">
					<img style="width:100%;height:290px;" src="<?=SITE?>images/Avukatlarimiz/<?=$veri[0]["Resim"]?>" alt="">
                   </div>
				</div>  
				
			      <h4>Av.<?=$veri[0]["Adsoyad"]?><h4>
				  <h4><?=$veri[0]["TelCep"]?></h4>
				  
				  <table>
				  <tr><td>
				    <a href="<?=$veri[0]["Twitter"]?>"><button type="btn btn-primary btn-lg"><i class="fa fa-twitter"></i> </button></a></td><td>
		               <a href="<?=$veri[0]["Facebook"]?>"> <button type="btn btn-primary btn-lg"><i class="ti-facebook"> </i></button></a></td><td>
                    <a href="<?=$veri[0]["Linkedin"]?>"><button type="btn btn-primary btn-lg"><i class="fa fa-linkedin"></i></button></a></td><td>
                    <a href="<?=$veri[0]["Instagram"]?>"><button type="btn btn-primary btn-lg"><i class="fa fa-instagram"></i></button></a></td>
                 </table>
				 
                                           
			
			</div>	
			<div class="col-md-9">
			<h2 style="text-align:center;" >BİYOGRAFİ</h2>
			
			<?php
					  
			$metin=($veri[0]["Biyografi"]);
			$metin=$DB->karakter($metin);
			
			?><?=$metin?>
			</div>
			
		  </div>
	   </div>
	</div>