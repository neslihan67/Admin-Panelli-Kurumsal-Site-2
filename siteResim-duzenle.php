

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
if(!empty($_GET["ID"]))
{
	$ID=$DB->Filter($_GET["ID"]);
	$kontrol=$DB->VeriGetir("siteresim","","","ORDER BY ID ASC",1);
	if($kontrol!=false)
	{
      	$veri=$DB->VeriGetir("siteresim","WHERE ID=?",array($ID),"ORDER BY ID ASC");
		if($veri!=false)
		{
			?>
			 <div class="content-wrapper">
                <div class="content-header">
                 <div class="container-fluid">
                   <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Resim Güncelleme Formu</h1>
                        </div>
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Resim Güncelle </li>
                        </ol>
                       </div>
                     </div>
                   </div>
                 </div> 
   
   
     <section class="content">
      <div class="container-fluid">
	  <div class="row">
	  <div class="col-md-12">
	 
	   <a href="<?=SITE?>siteResim-liste" class="btn btn-info" style="float:right; margin-left:10px;"><i style="margin-right:3px;"class="fas fa-bars">..LİSTELE</i></a>
	   <a href="<?=SITE?>siteResim-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"> YENİ EKLE</i></a>
		  </div>
		  </div>
		    <!-- SELECT2 EXAMPLE -->
        <div class="card card-warning">
          <div class="card-header">
	
        
          </div>
		  <div class="col-md-10">
            <?php 
			if($_POST)
		    {
			  
			  if(!empty($_POST["resimAciklama"]))
			  
			  {
				  $resimAciklama=$DB->Filter($_POST["resimAciklama"]);
				  if(!empty($_FILES["resim"]["name"]))
				  {
					  $yukle=$DB->upload("resim","../images/SiteResim/");
					  error_reporting(0); ini_set('display_errors',0)
					  if($yukle!=false)
					  {
						  $ekle=$DB->SorguCalistir("UPDATE siteresim","SET ResimAciklama=?, Resim=?, Tarih=?  WHERE ID=?",
						  array($resimAciklama,$yukle,date("Y-m-d"),$veri[0]["ID"]));
					  }
					   else
					  {
						  ?>
						  <div class="alert alert-info">Resim Yükleme işleminiz Başarısız</div>
						  <?php
					  }
				  
				  }
				   else
				  {
			        $ekle=$DB->SorguCalistir("UPDATE siteresim ","SET ResimAciklama=?, Tarih=? WHERE ID=?",
			        array($resimAciklama,date("Y-m-d"),$veri[0]["ID"]));
				  }
				  
                    if($ekle!=false)
				  {
					 $veri=$DB->VeriGetir("siteresim","WHERE ID=?",array($veri[0]["ID"]),"ORDER BY ID ASC"); 
					  ?>
					  <div class="alert alert-success">Güncelleme İşleminiz Başarıyla Kaydedildi.</div>
					  <?php
				  }
				  
				  else
				  {
					  ?>
					  <div class="alert alert-danger">Güncelleme İşleminiz Sırasında Bir Sorunla Karşılaşıldı.Lütfen Daha Sonra Tekrar Deneyiniz.</div>
					  <?php
				  } 						
				
				  }
				   else
			     {
				  ?>
				  <div class="alert alert-danger">Boş Bıraktığınız Alanları Doldurunuz.</div>
			      <?php
		    	 }
				  
		    }
			
			
			
			  ?>
		  <form action="#" method="post" enctype="multipart/form-data">
		 <div class="card-body">
            <div class="row">
              
               <div class="col-md-12">
                <div class="form-group">
                 <label>Resim Açıklaması</label> 
				    <input type="text" class="form-control" style="border-color:#f0dc82;" name="resimAciklama" 
					value="<?=stripslashes($veri[0]["ResimAciklama"])?>" >
                 </div>
				</div>
				
				
				  <div class="col-md-12">
                   <div class="form-group">
                    <label>Resim</label> 
				   <input type="file" class="form-control" style="border-color:#f0dc82;" name="resim" placeholder="Resim Seçiniz">
                  </div>
				</div>
				
			
			      <div class="col-md-10">
                   <div class="form-group">
                  <button type="submit" style="width:100%;"class="btn btn-block btn-primary btn-lg">Değişiklikleri Kaydet</button>
				   </div>
			     </div>
		
				
				
			      </div>
		         </div>
			    </form>
			
			   </div>
			 </section>
		   </div>
         </div>
		 <?php
		}
		else
		{
			?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>siteResim-liste">
	         <?php
	 	   }
	    }
	    else
        {
	       ?>
	        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
	       <?php
         }
        }
        else
        {
	      ?>
	      <meta http-equiv="refresh" content="0;url=<?=SITE?>">
     	  <?php

        }


    ?>


<!--------------------------------------------------------------------------------------------->
