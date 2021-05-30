<footer class="footer">
        <div class="footer_top">
            <div class="container"> 
			
                       <a href="<?=SITE?>">
					   <?php
					   $data=$DB->VeriGetir("logo","","","ORDER BY ID ASC",1);
                       if($data!=false)
					   { 
				           
					   }
					   else
					   {    
				           
					   }
					   ?>
                         
                           </a>
                 
					
             
					
					<div class="row">
					<div class="col-12">
					  <h4 style="color:white; text-align:center;" class="footer_title">İletişim<hr>
                             <i class="fa fa-phone fa"></i>  <?=$siteTelefon?><br>
			                    <i class="fa fa-envelope fa-fw"></i><?=$siteMail?><br>
			                    <i class="fa fa-globe fa-fw"></i><?=$siteAdres?><br>
			                    <i class="fa fa-fax fa-fw"></i><?=$siteFaks?><br>
                            </h4>
                                	</div>
					</div>
                  <div class="row">
				  <div class="col-12">
					  <?php
				$veriler=$DB->VeriGetir("ayarlar","","","ORDER BY ID ASC",1);
				
				?>
                           <h5 style="color:white; text-align:center;" class="footer_title"><hr>
							
							
							 <div class="socail_links">
                                <ul>
                                    <li>
									
                                        <a style="font-size: 30px !important;" href="<?=$siteFacebook?>">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a style="font-size: 30px !important;" href="<?=$siteLinkedin?>">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a style="font-size: 30px !important;" href="<?=$siteTwitter?>">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a style="font-size: 30px !important;"href="<?=$siteInstagram?>">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul></h5>
                            </div>
							</div>
                                
					</div>
                </div>
				</div>
			
                  
          
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<?=date("Y")?> Tüm hakları saklıdır | Tasarım <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://medianostalgie.com/">MediaNostalgie</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>