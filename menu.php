

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=SITE?>" class="brand-link">
  
<i class="fa fa-user"></i>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
		<a href="#" class="d-block"><?=$_SESSION["adsoyad"]?></a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
			   
			   <li class="nav-item">
            <a href="<?=$siteUrl?>" class="nav-link">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Siteye Git
                
              </p>
            </a>
          </li>
		  <!---------------------------------------------------->
			   
			<li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-images"></i>
              <p>
             
                Site Resimleri  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			
            <ul class="nav nav-treeview">
		
					 <li class="nav-item">
                       <a href="<?=SITE?>siteResim-liste" class="nav-link">
                         <i class="nav-icon fas fa-images"></i>
                       <p>
                         Anasayfa Slayt Resimleri 
                      </p>
                    </a>
                  </li> 	

                       <li class="nav-item">
                         <a href="<?=SITE?>logo-liste" class="nav-link">
                           <i class="fas fa-images nav-icon"></i>
                             <p>Site Logo Resimleri</p>
                         </a>
                       </li>						   
			        </ul>
			    </li>
		  
		  <!------------------------------------------------>
			   
			   
               <li class="nav-item">
            <a href="<?=SITE?>modul-ekle" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Modül Ekle
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             
                Sayfalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<?php
			error_reporting(E_ALL); ini_set("display_errors", 1);
			$moduller=$DB->VeriGetir("moduller","WHERE Durum=?",array(1),"ORDER BY ID ASC");
			if($moduller!=false)
			{
				for($i=0;$i<count($moduller);$i++)
				{
					?>
					   <li class="nav-item">
                         <a href="<?=SITE?>liste/<?=$moduller[$i]["Tablo"]?>" class="nav-link">
                           <i class="fas fa-paper-plane nav-icon"></i>
                             <p><?=$moduller[$i]["Baslik"]?></p>
                         </a>
                       </li>			
					<?php
					 
				}
			}
			
			?>
             
            </ul>
			
          </li>

 
             <li class="nav-item">
            <a href="<?=SITE?>kullanici-liste" class="nav-link">
          
			  <i class="fas fa-user nav-icon"></i>
              <p>Kullanıcılar</p>
            </a>
          </li>
 
            
			
			  
			
 
            <li class="nav-item">
            <a href="<?=SITE?>seo-ayarlari" class="nav-link">
          
			  <i class="fas fa-tools nav-icon"></i>
              <p>Seo Ayarları</p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="<?=SITE?>iletisim-ayarlari" class="nav-link">
          
			<i class="fas fa-globe-americas nav-icon"></i>
              <p>İletişim Ayarları</p>
            </a>
          </li>
		  
		   <li class="nav-item">
            <a href="<?=SITE?>cikis" class="nav-link">
			<i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Güvenli Çıkış</p>
            </a>
          </li>
         
		 
		 
		 
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>