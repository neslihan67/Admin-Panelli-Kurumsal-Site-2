
<?php

if(!empty($_GET["tablo"]) && !empty($_GET["ID"]))
{
	
	$tablo=$DB->Filter($_GET["tablo"]);
	$ID=$DB->Filter($_GET["ID"]);
	
	$kontrol=$DB->VeriGetir("moduller","WHERE Tablo=? AND Durum=?",array($tablo,1),"ORDER BY ID ASC",1);
	if($kontrol!=false)
	{
		$veri=$DB->VeriGetir($kontrol[0]["Tablo"],"WHERE ID=?",array($ID),"ORDER BY ID ASC");
		if($veri!=false)
		{			
		
	?>
	 <div class="content-wrapper">
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$kontrol[0]["Baslik"]?> Güncelleme Formu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active"><?=$kontrol[0]["Baslik"]?> </li>
            </ol>
          </div>
      </div>
	
   </div>
    </div>
	
   <section class="content">
      <div class="container-fluid">
	  <div class="row">
	  <div class="col-md-12">
	 
	   <a href="<?=SITE?>liste/<?=$kontrol[0]["Tablo"]?>" class="btn btn-info" style="float:right; margin-left:10px;"><i style="margin-right:3px;"class="fas fa-bars">..LİSTELE</i></a>
	   <a href="<?=SITE?>ekle/<?=$kontrol[0]["Tablo"]?>" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"> YENİ EKLE</i></a>
		  </div>
		  </div>
		    <!-- SELECT2 EXAMPLE -->
        <div class="card card-warning">
          <div class="card-header">
	
        
          </div>
		  <div class="col-md-10">
		  <?php if($_POST)
		  {
			  if(!empty($_POST["kategori"])&& (!empty($_POST["baslik"])) && (!empty($_POST["description"])) && (!empty($_POST["anahtar"])) && (!empty($_POST["sirano"])))
			  {
				  $kategori=$DB->Filter($_POST["kategori"]);
				  $baslik=$DB->Filter($_POST["baslik"]);
				  $baslik=$DB->karakter($baslik);
				  $seflinkKontrol=$DB->Seflink($baslik);
				  $anahtar=$DB->Filter($_POST["anahtar"]);
				  $description=$DB->Filter($_POST["description"]);
				  $sirano=$DB->Filter($_POST["sirano"]);
				  
				  $metin=$DB->Filter($_POST["metin"],true);
                  $metin=$DB->karakter($metin);
				  
				  if(!empty($_FILES["resim"]["name"]))
				  {
					  $yukle=$DB->upload("resim","../images/".$kontrol[0]["Tablo"]."/");
					  error_reporting(0); ini_set('display_errors',0);
					  if($yukle!=false)
					  {
						  $ekle=$DB->SorguCalistir("UPDATE ".$kontrol[0]["Tablo"],"SET Baslik=?, Seflink=?, 
						  Kategori=?, Metin=? ,Resim=?, Anahtar=?,Description=?,Durum=?,Sirano=?,Tarih=?  WHERE ID=?",
						  array($baslik,$seflinkKontrol,$kategori,$metin,$yukle,$anahtar,$description,1,$sirano,date("Y-m-d"),$veri[0]["ID"]));
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
			        $ekle=$DB->SorguCalistir("UPDATE ".$kontrol[0]["Tablo"],"SET Baslik=?, Seflink=?, 
			        Kategori=?, Metin=? , Anahtar=?,Description=?,Durum=?,Sirano=?,Tarih=? WHERE ID=?",
			        array($baslik,$seflinkKontrol,$kategori,$metin,$anahtar,$description,1,$sirano,date("Y-m-d"),$veri[0]["ID"]));
						  
				  }
				  if($ekle!=false)
				  {
					 $veri=$DB->VeriGetir($kontrol[0]["Tablo"],"WHERE ID=?",array($veri[0]["ID"]),"ORDER BY ID ASC"); 
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
                  <label>Kategori Seçiniz</label>
                  <select class="form-control select2" name="kategori" style="width: 100%; border-color:#f0dc82;">
                    <?php
					
					$result=$DB->kategoriGetir($kontrol[0]["Tablo"],$veri[0]["Kategori"],-1);
					if($result!=false)
					{
						echo $result;
					}
					else
					{
						echo $DB->tekKategoriGetir($kontrol[0]["Tablo"]);
					}
					
					?>
                  </select>
                </div> 
			</div>	
               <div class="col-md-12">
                <div class="form-group">
                 <label>Başlık</label> 
				 <div class="form-group">
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="baslik" placeholder="Başlık Giriniz ..."
					value="<?=stripslashes($veri[0]["Baslik"])?>">
                 </div>
				</div>
                </div>
				<div class="col-md-12">
				  <div class="form-group">
                        <label>Metin Alanı</label>    
                        <textarea class="textarea" name="metin" 
						style="width: 100%; height:100px; font-size:20px; line-height : 10px; border: 1px solid #ddddddd; padding:10px;"><?=stripslashes($veri[0]["Metin"])?></textarea>
						
                 </div>
		  
                </div>  
               <div class="col-md-12">
                <div class="form-group">
                 <label>Anahtar</label> 
                    <input type="text" class="form-control" name="anahtar" style="border-color:#f0dc82;" value="<?=stripslashes($veri[0]["Anahtar"])?>"
					placeholder="Anahtar Olarak Belirlemek İstediğiniz Kelimeleri Giriniz.">
				</div>
               </div>
             		
			 <div class="col-md-12">
                <div class="form-group">
                 <label>Description</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="description" value="<?=stripslashes($veri[0]["Description"])?>"
					placeholder="Tanımlarınızı Yazınız">
                 </div>
				</div>

              <div class="col-md-12">
                <div class="form-group">
                 <label>Resim</label> 
				   <input type="file" class="form-control" style="border-color:#f0dc82;" name="resim" placeholder="Resim Seçiniz">
                 </div>
				</div>
             
					
              <div class="col-md-2">
                <div class="form-group">
                 <label>Sıra Numarası</label> 
                    <input type="number" class="form-control" style="border-color:#f0dc82;"  value="<?=stripslashes($veri[0]["Sirano"])?>"
					name="sirano" placeholder="Sıra Numarası Seçiniz">
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

 </section>
 </div>
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

  
	