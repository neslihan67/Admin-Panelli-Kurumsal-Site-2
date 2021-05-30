
	 <div class="content-wrapper">
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">İletisim Ayarları</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">İletisim Ayarları</li>
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
			  if((!empty($_POST["telefon"])) && (!empty($_POST["mail"])) && (!empty($_POST["adres"])) && (!empty($_POST["faks"])) && (!empty($_POST["facebook"])) && (!empty($_POST["twitter"])) && (!empty($_POST["linkedin"])) && (!empty($_POST["instagram"])))
			  {
				$telefon=$DB->Filter($_POST["telefon"]);
				  $mail=$DB->Filter($_POST["mail"]);
				  $adres=$DB->Filter($_POST["adres"]);
				  $faks=$DB->Filter($_POST["faks"]);

				    $facebook=$_POST["facebook"];
					  $twitter=$_POST["twitter"];
					    $linkedin=$_POST["linkedin"];
						  $instagram=$_POST["instagram"];

				
			        $guncelle=$DB->SorguCalistir("UPDATE ayarlar","SET Telefon=?,Mail=?,Adres=?, Faks=?,Facebook=?,Twitter=?,Linkedin=?,Instagram=? WHERE ID=?",
			        array($telefon,$mail,$adres,$faks,$facebook,$twitter,$linkedin,$instagram,1),1);
						  
			
				  if($guncelle!=false)
				  {
					  ?>
					 
					  <div class="alert alert-success">İşleminiz Başarıyla Kaydedildi.</div>
					  <meta http-equiv="refresh" content="2;url=<?=SITE?>iletisim-ayarlari">
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
				   <meta http-equiv="refresh" content="url=<?=SITE?>iletisim-ayarlari">
				   <?php
			  }
		  

			  ?>
		  <form action="#" method="post" enctype="multipart/form-data">
		 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
          	
			<?php
			$veri=$DB->VeriGetir("ayarlar","","","ORDER BY ID ASC",1);
			 ?>
			
			
               <div class="col-md-12">
                <div class="form-group">
                 <label>Site Telefon</label> 
			      <input type="text" class="form-control" style="border-color:#f0dc82;" name="telefon" maxlength="11"
				  value="<?=$veri[0]["Telefon"]?>">
                 </div>
				</div>
			
			
			
			   <div class="col-md-12">
                <div class="form-group">
                 <label>Site Mail</label> 
                    <input type="email" class="form-control" style="border-color:#f0dc82;" name="mail" 
					value="<?=$veri[0]["Mail"]?>">
				</div>
               </div>
			
			
			
			
                <div class="col-md-12">
                <div class="form-group">
                 <label>Site Adres</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="adres" 
					value="<?=$veri[0]["Adres"]?>">
                 </div>
				</div>
            
				
		    
              <div class="col-md-12">
                <div class="form-group">
                 <label>Site Faks</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="faks" 
					value="<?=$veri[0]["Faks"]?>">
                 </div>
				</div>
             		
			<div class="col-md-12">
                <div class="form-group">
                 <label>Facebook Adresi</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="facebook" 
					value="<?=$veri[0]["Facebook"]?>">
                 </div>
				</div>


          <div class="col-md-12">
                <div class="form-group">
                 <label>Instagram Adresi</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="instagram" 
					value="<?=$veri[0]["Instagram"]?>">
                 </div>
				</div>
				
				
				<div class="col-md-12">
                <div class="form-group">
                 <label>Linkedin Adresi</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="linkedin" 
					value="<?=$veri[0]["Linkedin"]?>">
                 </div>
				</div>
				
				
				 <div class="col-md-12">
                <div class="form-group">
                 <label>Twitter Adresi</label> 
                    <input type="text" class="form-control" style="border-color:#f0dc82;" name="twitter" 
					value="<?=$veri[0]["Twitter"]?>">
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


  
	