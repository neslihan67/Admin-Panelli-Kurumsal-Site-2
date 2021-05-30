 
<!--KURUMSAL HOME-->

<div class="slider_area">

  <?php
	   
	   $veri=$DB->VeriGetir("siteresim","","","ORDER BY ID ASC");
	   if($veri!=false)
	   {
		   for($i=0;$i<count($veri);$i++)
		   {
			   ?> 
		    
			   <img class="mySlides" src="<?=SITE?>images/SiteResim/<?=$veri[$i]["Resim"]?>" style="width:100%; height:500px;">
			   <style>
                .mySlides {display:none;}
               </style>
			   <?php
		   }
	   }
	   
	   ?>

</div>

      <div style="background-color:orange; width:100%; height:auto; padding-bottom:10px; border-color:blue; border-style:none  none dotted none;"><br>
			<?php
			
			$veriler=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array("misyonumuz",1),"ORDER BY ID ASC",1);
			if($veriler!=false)
			{  
                              //sğl/anm>aktaddr.->sğlanmaktaddr //
							  $metin=strip_tags(stripslashes($veriler[0]["Metin"]));
							  $Temizmetin=$DB->kucukten_buyuge($metin);
							  $Tertemizmetin=strtoupper($Temizmetin);
							  
                               ?>
			  	<h4 style="color:white;  text-align:center;"><?=$Tertemizmetin?></h4>
				<div style="text-align:center; font-color:white;" class="container">
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

    <!-- ------------------------slider_area_end ----------------------------->

    <!-- ------------------------Hizmetlerimiz ----------------------------->

    <div style="margin-bottom:0px;padding-bottom:0px; padding-top:70px; background-color:#f0f4de;"class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60 text-center">
                        <h1 style="font-family:Montserrat, sans-serif">HİZMETLERİMİZ</h1>
						
                    </div>
                </div>
            </div>
           
		   
               <div style="text-align:center;" class="explorer_europe">
                 <div class="container">
                   <div class="row">
			        <?php
			
			        $veri=$DB->VeriGetir("hizmetler","WHERE Durum=?",array(1),"ORDER BY ID DESC",6);
			 if($veri!=false)
			{
		
				for($i=0; $i<count($veri);$i++)
				{
				
				if(!empty($veri[$i]["Resim"]))
				{
					$resim=$veri[$i]["Resim"];
					?>
					 <div class="col-xl-4 col-lg-4 col-md-6">
                            <div style="background-color:#fffdee; border:1px solid #e49b0f" class="single_explorer">
                                <div class="thumb">
                                    <img style="with:100%; height:150px;" src="<?=SITE?>images/hizmetler/<?=$resim?>" alt="<?=stripslashes($veri[$i]["Baslik"])?>">
                                </div>
                                <div class="explorer_bottom d-flex">
                                    <div class="explorer_info">
                                        <h3><a href="<?=SITE?>hizmet-detay/<?=$veri[$i]["Seflink"]?>"><?=$veri[$i]["Baslik"]?></a></h3>
                                            <p><?=mb_substr(strip_tags(stripslashes($veri[$i]["Metin"])),0,100,"UTF-8")?>...</p>
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
		  </div>		
	</div>	

	
    <!-- ------------------------Hakkımızda ----------------------------->
   	
			<div  style="padding-top:0px; padding-bottom:0px; margin:0px; border-color:#001D38;" class="popular_catagory_area">   


	    
	     <?php 
		  
          $veri=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array("hakkimizda",1),"ORDER BY ID ASC",1);
		  if($veri!=false)
		  {
			 ?> 
			 <div style="text-align:center;  background-color:#001D38; border-style:solid none none solid; border-color:#d5b790; border-width:5px; padding-top:0px; padding-bottom:0px; margin:0px;" class="col-12">

            <img style="width:100%; height:auto;" src="<?=SITE?>images/kurumsal/<?=$veri[0]["Resim"]?>">
			
			<?php
		  }
         ?>
</div>

   <div style="border-style:none solid solid none; border-color:#d5b790; background-color:#001D38; padding-top:30px; padding-bottom:50px; margin:0px;border-width:5px;" class="col-12">
    <h2 style="text-align:center; color:orange;">HAKKIMIZDA</h2>
   <?php 
   
   $db=$DB->VeriGetir("kurumsal","WHERE Durum=?",array(1),"ORDER BY ID ASC");
   
   if($db!=false)
   {
	   for($i=0; $i<count($veri); $i++)
	   {
           ?>
 <h5 style="text-align:center;color:white; "><?=mb_substr(strip_tags(stripslashes($db[$i]["Metin"])),0,1000,"UTF-8")?>...</h5>
                                                             
           <?php
	   }
   }
   ?>
    </div>

   
	  </div>
	
	<!-------------- /from turkiye START ------------------------------------------------>
 <div style="margin-bottom:0px;padding-bottom:40px; padding-top:70px;background-color:#f3f2dc;"class="popular_catagory_area">      	 
	 <div style="padding-top:0px; margin-top:0px;" class="team_area">
                 <div style="margin-top:0px;" class="container">
                     <div class="row">
                            <div class="col-xl-12">
                                <div class="section_title mb-40 text-center">
                                    <h1 style="font-family:Montserrat, sans-serif">MAKALELER</h1>
                                </div>
                            </div>
                        </div>
						
						
						
	
      <div class="row">	
       <?php
		$veri=$DB->VeriGetir("bloglar","","","ORDER BY ID ASC");
          if($veri!=false)
		{
			for($i=0; $i<count($veri);$i++)
				{
				?>
				
				 <div class="col-md-6 col-sm-12" style="border-color:#228b22; border-radius:13px; border-width:2px; border-style: dotted none none none;">
				  <div style=" background-color:white; margin-bottom:0px;" class="single_team">  
					<div class="team_thumb">
					<img style="width:100%; height:300px;" src="<?=SITE?>images/bloglar/<?=$veri[$i]["Resim"]?>">
                      <h3 style="text-align:center;"><br><?=$veri[$i]["Baslik"]?></h3>
					  
                       <p><?=mb_substr(strip_tags(stripslashes($veri[$i]["Metin"])),0,140,"UTF-8")?></p>
					      <h5 style="text-align:right;"><?=$veri[$i]["Tarih"]?></h5>
                        <div  class="social_link">
                      <ul>
                       <li>
                         <a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><h2 style="color:white;">OKU <i class="fa fa-book"></i></h2></a>
                          </li>
						                          
                          </ul>
                          </div>
                          </div>
						  </div> 
						  

							     
                            </div>
							<?php
							
							}
							
						}
				    
					?>                    
					</div>
					
                  </div>
			    </div>
				
				 <div style=" width:100%; height:85px; margin-top:0px; padding-top:0px;"><br>
					<div class="row">
					  <div style="text-align:center;width:100%; height:85px;" class="col-12">
					 <a href="<?=SITE?>blog" ><button class="btn btn-md" style="background-color:black; width:100%; height:auto; border-color:orange;border-radius:5px; border-style:dashed; color:white;"><br>--> DAHA FAZLA MAKALE GÖR<br><br></button></a>
					  </div>
					</div>
					</div>
              </div>
			 
	<!-------------- /team_area START ------------------------------------------------>
			
						

<div style="padding-top:20px; margin-top:0px; background-color:#f0f8ff;" class="team_area"> 
  <div style="padding-top:50px; margin-bottom:10px;" class="explorer_europe" style="margin-top:30px;">
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

       
    <!-- /team_area  -------------------------------------------------------------->
 <div class="explorer_europe" style="padding-top:50px;  border-color:red; border-size:55px; border-style:inset; padding-bottom:40px;">
        <div  class="container">
		<h2  style="text-align:center;" >İLETİŞİM FORMU</h2>
            <div class="row align-items-center">
			<div class="col-12">
			
			<?php
			
			if($_POST)
			{
				if(!empty($_POST["adsoyad"]) && !empty($_POST["mail"]) && !empty($_POST["konu"]) && !empty($_POST["mesaj"]))
				{
					$adsoyad=$DB->Filter($_POST["adsoyad"]);
					$mail=$DB->Filter($_POST["mail"]);
					$konu=$DB->Filter($_POST["konu"]);
					$mesaj=$DB->Filter($_POST["mesaj"]);
					$telefon=$DB->Filter($_POST["telefon"]);
					$metin="Ad Soyad : ".$adsoyad.' Mail Adresi : '.$mail."Telefon : ".$telefon." Mesaj : ".$mesaj;
					$maililet=$DB->MailGonder($mail,$konu,$metin);
					
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
			<table  class="table">
			
			<tr>
			<td style="font-weight:bolder;">Adınız Soyadınız</td>
			<td><input type="text" style="border-color:#65da65; border-style:dashed; border-size:5px;"  name="adsoyad" class="form-control" required="required"/></td>
			</tr>
			
			<tr>
			<td style="font-weight:bolder">Mail Adresiniz</td>
			<td><input type="email" style="border-color:#65da65; border-style:dashed; border-size:5px;" name="mail" class="form-control" required="required"/></td>
			</tr>
			
			<tr >
			<td style="font-weight:bolder ">Telefon</td>
			<td ><input type="text" style="border-color:#65da65; border-style:dashed; border-size:5px;"  name="telefon" class="form-control" maxlength="11"/></td>
			</tr>
			
			<tr>
			<td style="font-weight:bolder">Konu</td>
			<td><input  type="text"  style="border-color:#65da65; border-style:dashed; border-size:5px;"name="konu" class="form-control" required="required"/></td>
			</tr>
			
			<tr>
			<td style="font-weight:bolder">Mesajınız</td>
			<td><textarea  style="border-color:#65da65; border-style:dashed; border-size:5px;" name="mesaj" class="form-control" required="required"/></textarea></td>
			</tr>
			
			<tr>
			<td></td>
			<td><input  style="background-color:orange;  color:white;" type="submit" name="ilet" class="form-control" value="GÖNDER"></td>
			</tr>
			
			</table>
			</div>
		
			</div>
			 
           </div>
        </div>
	  
 <!---------------------- /iletisim_area  -------------------------------------------------------------->
 
				
	<div class="sprayed_area overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text text-center">
                        <h3>Bize Ulaşın.</h3>
                        <p>Soru, fikir ve önerileriniz için bizimle iletişime geçin.</p>
                        <a href="<?=SITE?>iletisim" class="boxed-btn2">İletişime Geç!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
				
