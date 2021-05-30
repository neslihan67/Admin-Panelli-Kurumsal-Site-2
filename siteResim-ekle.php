
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anasayfa Slayt Resimleri Ekleme </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Resim Ekleme </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="container-fluid">
	     <div class="row">
	  <div class="col-md-12">
	 
	   <a href="<?=SITE?>siteResim-liste" class="btn btn-info" style="float:right; margin-bottom:10px;">
	   <i style="margin-right:3px;"class="fas fa-bars">..LİSTELE</i></a>

		  </div>
		  </div>
        
	  
	 
	       <div class="card card-success">
          <div class="card-header">
	        <div class="card-tools">
            </div>
         </div>
		  <div class="col-md-10">
		  <?php 
		   error_reporting(E_ALL);
				ini_set("display_errors", 1);
		     if($_POST)
		  {
			  if(!empty($_POST["resimAciklama"]))
			  {
				  $resimAciklama=$DB->Filter($_POST["resimAciklama"]);
				 if(!empty($_FILES["resim"]["name"]))
				  {
					  $yukle=$DB->upload("resim","../images/SiteResim/");
					  error_reporting(0); ini_set('display_errors',0);
					  if($yukle!=false)
					  {
						  $ekle=$DB->SorguCalistir("INSERT INTO siteresim","SET ResimAciklama=? ,Resim=?, Tarih=?",array($resimAciklama,$yukle,date("Y-m-d")));
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
			        $ekle=$DB->SorguCalistir("INSERT INTO siteresim ","SET ResimAciklama=?,Tarih=?", array($resimAciklama, date("Y-m-d")));
						  
				  }
				  if($ekle!=false)
				  {error_reporting(0); ini_set('display_errors',0);
					  ?>
					  <div class="alert alert-success">İşleminiz Başarıyla Kaydedildi.</div>
					  <?php
				  }
				  else
				  {
					  ?><div class="alert alert-danger">İşlemini Sırasında Bir Sorunla Karşılaşıldı.Lütfen Daha Sonra Tekrar Deneyiniz.</div>
					  <?php
				  } 
			  }
			  else
			  {?>
				  <div class="alert alert-danger">Boş Bıraktığınız Alanları Doldurunuz.</div>
			  <?php
			  }
		  }

			  ?>

		  
			  
			  
			  
			  
			  
			  
			  
		  <form action="#" method="post" enctype="multipart/form-data">
		 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              
			  
			  <div class="col-md-8">
                <div class="form-group">
                 <label>Resim Açıklaması</label> 
			
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="resimAciklama" placeholder="Resim Açıklaması..">
                 </div>
				</div>
             
			
            
              <div class="col-md-8">
                <div class="form-group">
                 <label>Resim</label> 
				   <input type="file" class="form-control" style="border-color:#f0dc82;" name="resim" placeholder="Resim Seçiniz">
                 </div>
				</div>
				  
				  
            
		
             
			<div class="col-md-8">
			    <div class="col-md-8">
                <div class="form-group">
                  <button type="submit" style="width:100%;"class="btn btn-block btn-primary btn-lg">Kaydet</button>
				</div>
			  </div>
			 </div>
			  
			  </div> 
			  
			  
			 </div> 
	       </form>
	   </div>

    </section>
   
  </div>
  </div>
