



 <div class="content-wrapper">
    <!-- Content Header (Page header)---------------------KULLANICI EKLE----------------------->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Avukat Ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Avukat Ekle </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="container-fluid">
	     <div class="row">
	  <div class="col-md-12">
	 
	   <a href="<?=SITE?>kullanici-liste" class="btn btn-info" style="float:right; margin-bottom:10px;">
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
		  if($_POST)
		  {
			  if(!empty($_POST["adsoyad"])&& (!empty($_POST["kullaniciAd"])) && (!empty($_POST["sifre"])) && (!empty($_POST["mail"])) && 
			  (!empty($_POST["telCep"])) && (!empty($_POST["telEv"])) && (!empty($_POST["faceAdres"])) && (!empty($_POST["instagramAdres"])) && 
			  (!empty($_POST["twitterAdres"])) && (!empty($_POST["linkedinAdres"])) &&(!empty($_POST["adres"])) &&(!empty($_POST["biografi"])))
			  {
				  $adsoyad=$DB->Filter($_POST["adsoyad"]);
				  $adsoyad=$DB->karakter($adsoyad);
				  $kullaniciAd=$DB->Filter($_POST["kullaniciAd"]);
				  $kullaniciAd=$DB->karakter($kullaniciAd);
				  $sifre=$DB->Filter($_POST["sifre"]);
				  $sifre=$DB->karakter($sifre);
				  $mail=$DB->Filter($_POST["mail"]);
				  $mail=$DB->karakter($mail);
				  $telCep=$DB->Filter($_POST["telCep"]);
				  $telEv=$DB->Filter($_POST["telEv"]);
				  $faceAdres=$DB->Filter($_POST["faceAdres"],true);
				  $instagramAdres=$DB->Filter($_POST["instagramAdres"],true);
				  $twitterAdres=$DB->Filter($_POST["twitterAdres"],true);
				  $linkedinAdres=$DB->Filter($_POST["linkedinAdres"],true);
				  $adres=$DB->Filter($_POST["adres"],true);
				  $adres=$DB->karakter($adres);
				  $biografi=$DB->Filter($_POST["biografi"],true);
				  $biografi=$DB->karakter($biografi);
				  
				  
				 
				  
				  if(!empty($_FILES["resim"]["name"]))
				  {
					  $yukle=$DB->upload("resim","../images/Avukatlarimiz");
					  error_reporting(0); ini_set('display_errors',0);
					  if($yukle!=false)
						  
					  //(`ID`, `Adsoyad`, `Mail`, `KullaniciAdi`, `Sifre`, `TelEv`, `TelCep`,
					  //`Facebook`, `Instagram`, `Twitter`, `linkedin`, `Adres`, `Resim`, `Biyografi`, `Tarih`
					  
					  {
						  $ekle=$DB->SorguCalistir("INSERT INTO kullanicilar ","SET Adsoyad=?, Mail=?, 
						  KullaniciAdi=?, Sifre=? ,TelEv=?, TelCep=?,Facebook=?,Instagram=?,Twitter=?,Linkedin=?  ,Adres=?  ,Resim=?  ,Biyografi=?,Tarih=?",
						  array($adsoyad,$mail,$kullaniciAd,$sifre,$telEv,$telCep,$faceAdres,$instagramAdres,$twitterAdres,$linkedinAdres,
						  $adres,$yukle,$biografi,date("Y-m-d")));
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
			         $ekle=$DB->SorguCalistir("INSERT INTO kullanicilar ","SET Adsoyad=?, Mail=?, 
						  KullaniciAdi=?, Sifre=? ,TelEv=?, TelCep=?,Facebook=?,Instagram=?,Twitter=?,Linkedin=?  ,Adres=?  ,Biyografi=?,Tarih=?",
						  array($adsoyad,$mail,$kullaniciAd,$sifre,$telEv,$telCep,$faceAdres,$instagramAdres,$twitterAdres,$linkedinAdres,
						  $adres,$biografi,date("Y-m-d")));
						  
				  }
				  if($ekle!=false)
				  {
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
              
               <div class="col-md-12">
                <div class="form-group">
                 <label>Ad Soyad</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="adsoyad" placeholder="Tam Adınızı Giriniz ...">
				</div>
                </div>
				
				
				  <div class="col-md-12">
                <div class="form-group">
                 <label>Kullanıcı Adı</label> 
			
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="kullaniciAd" placeholder="Kullanıcı Adı Oluşturunuz...">
                 </div>
				</div>

				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Şifre</label> 
			        <input type="text" class="form-control" style="border-color:#f0dc82;" name="sifre" placeholder="Şifre Oluşturunuz...">
                 
				</div>
                </div>
				
				  <div class="col-md-12">
                <div class="form-group">
                 <label>Mail Adresi</label> 
			
                    <input type="email" class="form-control" style="border-color:#f0dc82;" name="mail" placeholder="Mailinizi Giriniz...">
                 </div>
				</div>
         
				
				  
				
				
				  <div class="col-md-12">
                <div class="form-group">
                 <label>Telefon(Cep)</label> 
	
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="telCep" placeholder=" Telefonuzu Giriniz ...">
                 </div>
				</div>
    
				
				
				 <div class="col-md-12">
                <div class="form-group">
                 <label>Telefon(Ev)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="telEv" placeholder="Telefonuzu Giriniz...">
                 </div>
				</div>
  
				
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Facebook Adresi (Link)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="faceAdres">
                 </div>
				</div>
        
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Twitter Adresi (Link)</label> 
		
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="twitterAdres">
                 </div>
				</div>
 
				<div class="col-md-12">
                <div class="form-group">
                 <label>İnstagram Adresi (Link)</label> 
			
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="instagramAdres">
                 </div>
				</div>
    
				
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Linkedin Adresi (Link)</label> 
	
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="linkedinAdres">
                 </div>
				</div>
  
				
				<div class="col-md-12">
				  <div class="form-group">
                        <label>Adres</label>    
                        <textarea class="textarea" name="adres"
						style="width: 100%; height:100px; font-size:20px; line-height : 10px; border: 1px solid #ddddddd; padding:10px;"></textarea>
						
                 </div>
                </div>  
				
				<div class="col-md-12">
				  <div class="form-group">
                        <label>Biyografi</label>    
                        <textarea class="textarea" name="biografi"
						style="width: 100%; height:100px; font-size:20px; line-height : 10px; border: 1px solid #ddddddd; padding:10px;"></textarea>
						
                 </div>
                </div>  
				
            
              <div class="col-md-12">
                <div class="form-group">
                 <label>Resim</label> 
				   <input type="file" class="form-control" style="border-color:#f0dc82;" name="resim" placeholder="Resim Seçiniz">
                 </div>
				</div>
             
		
             
			<div class="col-md-12">
			    <div class="col-md-10">
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
