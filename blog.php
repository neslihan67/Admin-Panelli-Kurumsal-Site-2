
		
  <div class="bradcam_area bradcam_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h4 style="font-family:Montserrat, sans-serif">Makaleler</h4>
								<div class="search_form">
								
                                <form action="#" method="post">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 col-md-8">
                                            <div class="input_field">
                                                <input style="margin-bottom:4px;" type="text" name="kelime" class="form-control" required="required" placeholder="Arama Yap">
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-4">
                                            <div  class="button_search">
                                                <button style="float:left;" class="boxed-btn2" type="submit">ARAMA YAP</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ bradcam_area---------------------------------------------------------------->
   
   
          <div style="background-color:orange; width:100%; height:auto; padding-bottom:10px; border-color:blue; border-style:none  none dotted none;"><br>
			<?php
			
			$veriler=$DB->VeriGetir("kurumsal","WHERE Seflink=? AND Durum=?",array("misyonumuz",1),"ORDER BY ID ASC",1);
			if($veriler!=false)
			{ 
				$metin=$veriler[0]["Metin"];
				 ?>
			  	<h4 style="color:white;  text-align:center;"><?=$metin?></h4>	<div style="text-align:center; font-color:white;" class="container">
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
   
   
   
   
     <!--/ bradcam_area---------------------------------------------------------------->
   
   
   
  <div class="explorer_europe" style="padding-top:30px; background-color:#f0f4de;"> 
     <div class="container">
            <div class="row">
		       
			   
			   
		<?php
			if($_POST)
	    	{
				if(!empty($_POST["kelime"]))
				{

					$kelime=$DB->Filter($_POST["kelime"]);
					$veri=$DB->VeriGetir("bloglar","WHERE Durum=? AND (Baslik LIKE ? OR Metin LIKE ?)",array(1,'%'.$kelime.'%','%'.$kelime.'%'),"ORDER BY ID DESC");
					
					if($veri==null)
					{
						?>
						<div style="text-align:center;" class="col-12"><h1 style="text-align:center;" >Böyle bir makale bulunamadı.<h1>
			<a href="<?=SITE?>blog"><button class="btn btn-lg" style="background-color:black; border-style:solid; border-top-color:#deb887;border-radius:0px;color:white; font-size:18px;" >Tüm makalelere geri dön!</button></a>
                             	
						</div>

						<?php
						
					}
					
					else
					{
						
						for($i=0; $i<count($veri);$i++)
						{
							
				           if(!empty($veri[$i]["Resim"]))
				          {
				         	$resim=$veri[$i]["Resim"];
					         ?>
					    
                              <div style="text-align:center;  background-color:white; border-style:solid none none solid; border-color:#deb887; border-width:3px; padding-bottom:10px;" class="col-12">

                               <img style="width:250px; height:auto;" src="<?=SITE?>images/bloglar/<?=$veri[$i]["Resim"]?>">

                               </div>

                                 <div style="padding-bottom:20px; margin-bottom:20px; border-style:none solid solid none; border-color:#deb887; background-color:white; border-width:3px;" class="col-12">
                                 <h2 style="text-align:center;"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><?=$veri[$i]["Baslik"]?></a></h2>
                                 <h5 style="text-align:center;"><p><?=mb_substr(strip_tags(stripslashes($veri[$i]["Metin"])),0,538,"UTF-8")?>...</p></h5>
                                  <div style="text-align:center;" class="container"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><button class="btn btn-lg" style="background-color:black; border-style:solid; border-top-color:#deb887;border-radius:0px;color:white; font-size:18px;" >Devamını Gör--></button></a></div>
                                 </div>
					
                                 <?php
					
			              }    //if parantae
                          else
					      {
						  ?>
						   
                          <div style="padding-bottom:20px; margin-bottom:20px; border-style:solid; border-color:#deb887; background-color:white; border-width:3px;" class="col-12">
                          <h2 style="text-align:center;"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><?=$veri[$i]["Baslik"]?></a></h2>
                          <h5 style="text-align:center;"><p><?=mb_substr(strip_tags(stripslashes($veri[$i]["Metin"])),0,538,"UTF-8")?>...</p></h5>
                          <div style="text-align:center;" class="container"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><button class="btn btn-lg" style="background-color:black; border-style:solid; border-top-color:#deb887;border-radius:0px;color:white; font-size:18px;" >Devamını Gör--></button></a></div>
                          </div>
						  <?php
					   }//else
					}
			
						
					}

					
					
					
				}
		    }
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		else
		{
					
				$veri=$DB->VeriGetir("bloglar","WHERE Durum=?",array(1),"ORDER BY ID DESC");
			for($i=0; $i<count($veri);$i++)
			{
				
				    if(!empty($veri[$i]["Resim"]))
				    {
				      	$resim=$veri[$i]["Resim"];
					    ?>
					   
					    
                       <div style="text-align:center;  background-color:white; border-style:solid none none solid; border-color:#deb887; border-width:3px; padding-bottom:10px;" class="col-12">

                       <img style="width:250px; height:auto;" src="<?=SITE?>images/bloglar/<?=$veri[$i]["Resim"]?>">

                       </div>

                       <div style="padding-bottom:20px; margin-bottom:20px; border-style:none solid solid none; border-color:#deb887; background-color:white; border-width:3px;" class="col-12">
                       <h2 style="text-align:center;"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><?=$veri[$i]["Baslik"]?></a></h2>
                       <h5 style="text-align:center;"><p><?=mb_substr(strip_tags(stripslashes($veri[$i]["Metin"])),0,538,"UTF-8")?>...</p></h5>
                       <div style="text-align:center;" class="container"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><button class="btn btn-lg" style="background-color:black; border-style:solid; border-top-color:#deb887;border-radius:0px;color:white; font-size:18px;" >Devamını Gör--></button></a></div>
                       </div>
					
					   <?php
			        }
				else
				{
					    ?>					   
                        <div style="padding-bottom:20px; margin-bottom:20px; border-style:none solid solid none; border-color:#deb887; background-color:white; border-width:3px;" class="col-12">
                        <h2 style="text-align:center;"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><?=$veri[$i]["Baslik"]?></a></h2>
                        <h5 style="text-align:center;"><p><?=mb_substr(strip_tags(stripslashes($veri[$i]["Metin"])),0,538,"UTF-8")?>...</p></h5>
                        <div style="text-align:center;" class="container"><a href="<?=SITE?>blog-detay/<?=$veri[$i]["Seflink"]?>"><button class="btn btn-lg" style="background-color:black; border-style:solid; border-top-color:#deb887;border-radius:0px;color:white; font-size:18px;" >Devamını Gör--></button></a></div>
                        </div>
					   <?php
				}
			}//for parantezi	
		}
        
        ?>
             </div> 
	       </div> 
	     </div> 

