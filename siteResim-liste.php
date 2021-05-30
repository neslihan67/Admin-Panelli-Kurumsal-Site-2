

	 <div class="content-wrapper">
       <!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anasayfa Slayt Resimleri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Resim Listesi</li>
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
	  <a href="<?=SITE?>siteResim-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus">YENİ EKLE</i></a>
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
                    <th>ID</th>
                    <th>Resim Açklama</th>
                    <th>Resim (URL)</th>
				    <th>Eklenme Tarihi</th>
               		<th>İşlemler</th>
                  </tr>
                  </thead>
			
                  <tbody>
				<?php
					error_reporting(E_ALL);
				ini_set("display_errors", 1);
				$veriler=$DB->VeriGetir("siteresim","","","ORDER BY ID ASC");
				if($veriler!=false)
				{
					for($i=0; $i<count($veriler);$i++)
					{
						?>
						<td><?=$veriler[$i]["ID"]?></td>
						<td><?=$veriler[$i]["ResimAciklama"]?></td>
							<td><?=$veriler[$i]["Resim"]?></td>
								<td><?=$veriler[$i]["Tarih"]?></td>
					
					<td>
					<a href="<?=SITE?>siteResim-duzenle/<?=$veriler[$i]["ID"]?>" class="btn btn-warning btn-sm">Güncelle</a>
					<a href="<?=SITE?>siteResim-sil/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm">Sil</a>
				 </td>
					</tr>
					
					<?php
					}
					
				}
				else
				{
					
				}
				
				?>
                 
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>ID</th>
                    <th>Resim Açklama</th>
                    <th>Resim (URL)</th>
				    <th>Eklenme Tarihi</th>
					<th>İşlemler</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body ----------------------------------------------------------------------------------------------------------->
            </div>
	     </div>
    
      </section>
 
    </div>
	

  
	
	