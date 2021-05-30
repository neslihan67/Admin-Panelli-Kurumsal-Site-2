<header >
        <div style="border-color:black; border-style:none none solid none; border-size:5px;" class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
				
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
						
                            <div class="col-xl-3 col-lg-3">
                                <div class="logo">
                                    <a href="<?=SITE?>">
									<?php
									  error_reporting(E_ALL);
ini_set("display_errors", 1);
									$data=$DB->VeriGetir("logo","","","ORDER BY ID ASC",1);
									if($data!=false)
									{?>
										  <img style="width:130px; height:65px;"src="<?=SITE?>images/Logo/<?=$data[0]["Resim"]?>" alt="">
										  <?php
									}
									else
										{
											?>
											 <img style="width:130px; height:65px;"src="<?=SITE?>images/Logo/varsayilan.png" alt="">
											 <?php
										}
									
									?>
                                      
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="<?=SITE?>">ANASAYFA</a></li>
                                            <li><a href="#">HAKKIMIZDA<i class="ti-angle-down"></i></a>
											  <ul class="submenu">
                                                
												<?php
												$kurumsal=$DB->VeriGetir("kurumsal","WHERE Durum=?",array(1),"ORDER BY Sirano ASC");
												if($kurumsal!=false)
												{
													for($i=0; $i<count($kurumsal); $i++)
													{
													 ?>
													 <li><a href="<?=SITE?>kurumsal/<?=$kurumsal[$i]["Seflink"]?>"><?=stripslashes($kurumsal[$i]["Baslik"])?></a></li> 
													 <?php
													}
													
												}
												?>
											
												 </ul>
												 </li>
                                              
											<li><a href="<?=SITE?>hizmetler">HİZMETLER</a></li> 
											<li><a href="<?=SITE?>blog">MAKALELER</a>   </li>
											  <li><a href="<?=SITE?>avukatlar">EKİBİMİZ</a></li>
                                            <li><a href="<?=SITE?>iletisim">İLETİŞİM</a></li>
                                            
                                    
                                           
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
   </header>