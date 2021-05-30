
	 <div class="content-wrapper">
       <!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Avukatlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Avukat Listesi</li>
            </ol>
          </div>
      </div>
   </div>
    </div>
	    <!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
   <section class="content">
      <div class="container-fluid">
	  
	  
	  <div class="row">
	  <div class="col-md-12">
	  <a href="<?=SITE?>kullanici-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus">YENİ EKLE</i></a>
		  </div>
		  </div>
		  
		  
         <div class="card card-info">
              <div class="card-header">
                <div class="card-tools"></div>
              </div>
              <!-- /.card-header ------------------------------------------------------------------------------------------------------------->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:105px;">Ad Soyad</th>
                    <th>Mail</th>
                    <th>Telefon1</th>
					<th>Telefon 2</th>
                    <th>Kullanıcı Adı</th>
                    <th style="width:105px;" >İşlem</th>
                  </tr>
                  </thead>
			
                  <tbody>
				  <?php
				  $veriler=$DB->VeriGetir("kullanicilar","","","ORDER BY ID ASC");
					if($veriler!=false)
					{
						
						for($i=0;$i<count($veriler);$i++)
					{
					
						
						?>
				  <tr>
                    <td>
					<?php 
					     echo stripslashes($veriler[$i]["Adsoyad"]);
						
					 ?>
					</td>
		
					<td><?=$veriler[$i]["Mail"]?></td>
					<td><?=$veriler[$i]["TelEv"]?></td>
					<td><?=$veriler[$i]["TelCep"]?></td>
					<td><?=$veriler[$i]["KullaniciAdi"]?></td>
					<td>
					<a href="<?=SITE?>kullanici-duzenle/<?=$veriler[$i]["ID"]?>" class="btn btn-warning btn-sm">Güncelle</a>
					<a href="<?=SITE?>kullanici-sil/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm">Sil</a>
				
					</td>
					
                  </tr>
				  <?php
					}
					}
					
					?>
                 
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>Ad Soyad</th>
                    <th>Mail</th>
                    <th >Telefon1</th>
					<th>Telefon 2</th>
                    <th>Kullanıcı Adı</th>
                    <th>İşlem</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body ----------------------------------------------------------------------------------------------------------->
            </div>
	     </div>
    
      </section>
 
    </div>
	

  
	
	