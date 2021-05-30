 <div class="bradcam_area bradcam_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>İLETİŞİM</h3>
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
			 <div style="background-color:#b0b0b0; padding-bottom:0px; margin-top:20px; width:100%; height:auto; margin:0px;" class="col-12">
			<h1 style="text-align:center;" >KONUMUMUZ</h1>
			</div>
			
			<div style="margin-top:20px; " class="container">
							<?php
				$ayarlar=$DB-> VeriGetir("Ayarlar","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
               if($ayarlar!=false){
                   $siteHarita=$ayarlar[0]["HaritaAdres"];}
				   ?>
                    


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3060.009951709863!2d32.85325541490938!3d39.918793493696576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d34faa59ca8541%3A0xb4bdcb20cfbf4209!2sANB%20Dan%C4%B1%C5%9Fmanl%C4%B1k%20ve%20Sosyal%20Hizmetler%20Tic.%20Ltd.%20%C5%9Eti.!5e0!3m2!1str!2str!4v1603788270550!5m2!1str!2str" style="width:100%; height:400px; frameborder:0; border:0; aria-hidden:false; tabindex:0;"></iframe>                    

           
			   </div>
			
   
            <!--/ bradcam_area  -->
			
			
			
			
			
			
            
    <!-- about_mission  -->
   <div class="explorer_europe" style="padding-top:50px;"><hr>
   <div style="padding:0px; margin:0px;background-color:#b0b0b0;height:auto;width:100%"  class="col-12">
   <h1 style="text-align:center;" >İLETİŞİM FORMU</h1>
   </div>
       
<hr>
			<div class="container">
            <div class="row align-items-center">
			
			<div class="col-12">
			
			<?php
			
			if($_POST)
			{
			include_once(SINIF."class.phpmailer.php");
include_once(SINIF."class.smtp.php");
				if(!empty($_POST["adsoyad"]) && !empty($_POST["mail"]) && !empty($_POST["konu"]) && !empty($_POST["mesaj"]))
				{
					$adsoyad=$DB->Filter($_POST["adsoyad"]);
					$mail=$DB->Filter($_POST["mail"]);
					$konu=$DB->Filter($_POST["konu"]);
					$mesaj=$DB->Filter($_POST["mesaj"]);
					$telefon=$DB->Filter($_POST["telefon"]);
					$metin="Ad Soyad : ".$adsoyad.' Mail Adresi : '.$mail."Telefon : ".$telefon." Mesaj : ".$mesaj;
					$maililet=$DB->MailGonder("neslihanOzdemir642@gmail.com",$konu,$metin);
					
					if($maililet!=false)
					{
						echo '<div class="alert alert-success">Mesajınız Başarıyla Gönderildi</div>';
					}
					else
					{
						echo '<div class="alert alert-danger">Mail Görderme işlemi sırasında hata oluştu.Lütfen daha
						sonra yeniden deneyiniz</div>';
					}
					
				}
				else
				{
					echo '<div class="alert alert-danger">Boş Alanları Doldurunuz</div>';
				}
			}
			
			?>
			<form action="#" method="post">
			<table class="table">
			
			<tr>
			<td style="font-weight:bolder;">Adınız Soyadınız</td>
			<td><input type="text" style="border-color:#c0c0c0;"  name="adsoyad" class="form-control" required="required"/></td>
			</tr>
			
			<tr>
			<td style="font-weight:bolder">Mail Adresiniz</td>
			<td><input type="email" style="border-color:#c0c0c0;" name="mail" class="form-control" required="required"/></td>
			</tr>
			
			<tr>
			<td style="font-weight:bolder">Telefon</td>
			<td><input type="text" style="border-color:#c0c0c0;"  name="telefon" class="form-control" maxlength="11"/></td>
			</tr>
			
			<tr>
			<td style="font-weight:bolder">Konu</td>
			<td><input  type="text"  style="border-color:#c0c0c0;"name="konu" class="form-control" required="required"/></td>
			</tr>
			
			<tr>
			<td style="font-weight:bolder">Mesajınız</td>
			<td><textarea  style="border-color:#c0c0c0;" name="mesaj" class="form-control" required="required"/></textarea></td>
			</tr>
			
           <tr>
			<td></td>
			<td><input  style="border-color:#ffefd5; background-color:orange;" type="submit" name="ilet" class="form-control" value="GÖNDER"></td>
			</tr>
			
			</table>
			</div>

			</div>
			 
           </div>
        </div>