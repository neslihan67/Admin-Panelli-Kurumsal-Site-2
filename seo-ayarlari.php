
	 <div class="content-wrapper">
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Seo Ayarları</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Seo Ayarları</li>
            </ol>
          </div>
      </div>
	  
   </div>
    </div>
	
   <section class="content">
      <div class="container-fluid">
		    <!-- SELECT2 EXAMPLE -->
        <div class="card card-warning">
          <div class="card-header">
	        <div class="card-tools">
            </div>
         </div>
		  <div class="col-md-10">
		
		  <?php   
		  if($_POST)
		  {
			  if((!empty($_POST["baslik"])) && (!empty($_POST["description"])) && (!empty($_POST["anahtar"])) && (!empty($_POST["url"])))
			  {
				$baslik=$DB->Filter($_POST["baslik"]);
				  $anahtar=$DB->Filter($_POST["anahtar"]);
				  $description=$DB->Filter($_POST["description"]);
				  $url=$DB->$_POST["url"];
				
			        $guncelle=$DB->SorguCalistir("UPDATE ayarlar","SET Baslik=?,Anahtar=?,Aciklama=?, Url=?  WHERE ID=?",
			        array($baslik,$anahtar,$description,$url,1),1);
						  
			
				  if($guncelle!=false)
				  {
					  ?>
					  <div class="alert alert-success">İşleminiz Başarıyla Kaydedildi.</div>
					  <meta http-equiv="refresh" content="2;url=<?=SITE?>seo-ayarlari">
					  <?php
				  }
				  else
				  {
					  ?>
					  <div class="alert alert-danger">İşlemini Sırasında Bir Sorunla Karşılaşıldı.Lütfen Daha Sonra Tekrar Deneyiniz.</div>
					  <?php
				  } 
		  }
			 
			  else
			  {?>
				 
				  <div class="alert alert-danger">Boş Bıraktığınız Alanları Doldurunuz.</div>
			  <?php
			  }
			  }
			  else
			  {    ?>
				   <meta http-equiv="refresh" content="url=<?=SITE?>seo-ayarlari">
				   <?php
			  }
		  

			  ?>
		  <form action="#" method="post" enctype="multipart/form-data">
		 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
          	
               <div class="col-md-12">
                <div class="form-group">
                 <label>Site Başlık</label> 
				 <input type="text" class="form-control" style="border-color:#f0dc82;" name="baslik" 
					value="<?=$siteBaslik?>">
                 </div>
				</div>
            
				
		    
               <div class="col-md-12">
                <div class="form-group">
                 <label>Anahtar</label> 
                    <input type="text" class="form-control" name="anahtar" style="border-color:#f0dc82;" 
					value="<?=$siteAnahtar?>">
				</div>
               </div>
             		
			 <div class="col-md-12">
                <div class="form-group">
                 <label>Description</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="description" 
					value="<?=$siteAciklama?>">
                 </div>
				</div>


          <div class="col-md-12">
                <div class="form-group">
                 <label>Site Url</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="url" 
					value="<?=$siteUrl?>">
                 </div>
				</div>

              
             
			<div class="col-md-12">
			    <div class="col-md-10">
                <div class="form-group">
                  <button type="submit" style="width:100%;"class="btn btn-block btn-primary btn-lg">Güncelle</button>
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


  
	