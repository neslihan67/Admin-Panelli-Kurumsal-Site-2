
<?php
//GÜNCELLE KULLANICI
if(!empty($_GET["ID"]))
{

	$ID=$DB->Filter($_GET["ID"]);
	
	$kontrol=$DB->VeriGetir("kullanicilar","","","ORDER BY ID ASC",1);
	if($kontrol!=false)
	{
		$veri=$DB->VeriGetir("kullanicilar","WHERE ID=?",array($ID),"ORDER BY ID ASC");
		if($veri!=false)
		{			
		
	?>
	 <div class="content-wrapper">
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Avukat Güncelleme Formu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Avukat</li>
            </ol>
          </div>
      </div>
	
   </div>
    </div>
	
   <section class="content">
      <div class="container-fluid">
	  <div class="row">
	  <div class="col-md-12">
	 
	   <a href="<?=SITE?>kullanici-liste" class="btn btn-info" style="float:right; margin-left:10px;"><i style="margin-right:3px;"class="fas fa-bars">..LİSTELE</i></a>
	   <a href="<?=SITE?>kullanici-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"> YENİ EKLE</i></a>
		  </div>
		  </div>
		    <!-- SELECT2 EXAMPLE -->
        <div class="card card-warning">
          <div class="card-header">
	
        
          </div>
		  <div class="col-md-10">
		  <?php if($_POST)
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
					  {
						   $ekle=$DB->SorguCalistir("UPDATE kullanicilar ","SET Adsoyad=?, Mail=?, 
						  KullaniciAdi=?, Sifre=? ,TelEv=?, TelCep=?,Facebook=?,Instagram=?,Twitter=?,Linkedin=?  ,Adres=?  ,Resim=?  ,Biyografi=?,Tarih=? WHERE ID=? ",
						  array($adsoyad,$mail,$kullaniciAd,$sifre,$telEv,$telCep,$faceAdres,$instagramAdres,$twitterAdres,$linkedinAdres,
						  $adres,$yukle,$biografi,date("Y-m-d"),$veri[0]["ID"]));
						  
						  
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
			         $ekle=$DB->SorguCalistir("UPDATE kullanicilar ","SET Adsoyad=?, Mail=?, 
						  KullaniciAdi=?, Sifre=? ,TelEv=?, TelCep=?,Facebook=?,Instagram=?,Twitter=?,Linkedin=?  ,Adres=?  ,Biyografi=?,Tarih=? WHERE ID=?",
						  array($adsoyad,$mail,$kullaniciAd,$sifre,$telEv,$telCep,$faceAdres,$instagramAdres,$twitterAdres,$linkedinAdres,
						  $adres,$biografi,date("Y-m-d"),$veri[0]["ID"]));
						  
				  }
				  if($ekle!=false)
				  {
					 $veri=$DB->VeriGetir("kullanicilar","WHERE ID=?",array($veri[0]["ID"]),"ORDER BY ID ASC"); 
					  ?>
					  <div class="alert alert-success">Güncelleme İşleminiz Başarıyla Kaydedildi.</div>
					  <?php
				  }
				  else
				  {
					  ?><div class="alert alert-danger">Güncelleme İşleminiz Sırasında Bir Sorunla Karşılaşıldı.Lütfen Daha Sonra Tekrar Deneyiniz.</div>
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
				    <input type="text" class="form-control" style="border-color:#f0dc82;" name="adsoyad" 
					value="<?=stripslashes($veri[0]["Adsoyad"])?>" >
                 </div>
				</div>
            
				
				
				  <div class="col-md-12">
                <div class="form-group">
                 <label>Kullanıcı Adı</label> 
			
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="kullaniciAd"
                      value="<?=stripslashes($veri[0]["KullaniciAdi"])?> ">
                 </div>
				</div>
      
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Şifre</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="sifre" 
					value="<?=stripslashes($veri[0]["Sifre"])?>">
              
				</div>
                </div>
				
				  <div class="col-md-12">
                <div class="form-group">
                 <label>Mail Adresi</label> 
			
                    <input type="email" class="form-control" style="border-color:#f0dc82;" name="mail" 
					value="<?=stripslashes($veri[0]["Mail"])?>" >
                 </div>
				</div>
          
				
				  
				
				
				  <div class="col-md-12">
                <div class="form-group">
                 <label>Telefon(Cep)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="telCep" 
					value="<?=stripslashes($veri[0]["TelCep"])?>">
                 </div>
				</div>
            
				
				 <div class="col-md-12">
                <div class="form-group">
                 <label>Telefon(Ev)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="telEv" 
					value="<?=stripslashes($veri[0]["TelEv"])?>">
                 </div>
				</div>
           
				
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Facebook Adresi (Link)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="faceAdres"
					value="<?=($veri[0]["Facebook"])?>">
                 </div>
				</div>
              
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Twitter Adresi (Link)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="twitterAdres"
					value="<?=($veri[0]["Twitter"])?>">
                 </div>
				</div>
                
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>İnstagram Adresi (Link)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="instagramAdres"
					value="<?=($veri[0]["Instagram"])?>">
                 </div>
				</div>
               
				
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Linkedin Adresi (Link)</label> 
				
                    <input type="text" class="form-control" style="border-color:#f0dc82;"
					value="<?=($veri[0]["Linkedin"])?>" name="linkedinAdres">
                 </div>
				</div>
          
				
				<div class="col-md-12">
				  <div class="form-group">
                        <label>Adres</label>    
                        <textarea class="textarea" name="adres"
						style="width: 100%; height:100px; font-size:20px; line-height : 10px; border: 1px solid #ddddddd; padding:10px;"><?=stripslashes($veri[0]["Adres"])?></textarea>
						
                 </div>
                </div>  
				
				<div class="col-md-12">
				  <div class="form-group">
                        <label>Biyografi</label>    
                        <textarea class="textarea" name="biografi"
						style="width: 100%; height:100px; font-size:20px; line-height : 10px; border: 1px solid #ddddddd; padding:10px;"><?=strip_tags(stripslashes($veri[0]["Biyografi"]))?></textarea>
						
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
                  <button type="submit" style="width:100%;"class="btn btn-block btn-primary btn-lg">Değişiklikleri Kaydet</button>
				</div>
			  </div>
			 </div>
			  
			  </div> 
			 </div> 
	       </form>
		  
             
			
			  
			  </div> 
			 </div> 
	      
	   </div>

 </section>
 </div>

<?php
		}
		else
		{
			?>
         	<meta http-equiv="refresh" content="0;url=<?=SITE?>liste/<?=$kontrol[0]["Tablo"]?>">
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

  
	