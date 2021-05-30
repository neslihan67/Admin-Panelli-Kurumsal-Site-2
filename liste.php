
<?php

if(!empty($_GET["tablo"]))
{
	
	$tablo=$DB->Filter($_GET["tablo"]);
	
	$kontrol=$DB->VeriGetir("moduller","WHERE Tablo=? AND Durum=?",array($tablo,1),"ORDER BY ID ASC",1);

	if($kontrol!=false)
	{
		
	?>
	 <div class="content-wrapper">
       <!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$kontrol[0]["Baslik"]?></h1>
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
	    <!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
   <section class="content">
      <div class="container-fluid">
	  
	  
	  <div class="row">
	  <div class="col-md-12">
	  <a href="<?=SITE?>ekle/<?=$kontrol[0]["Tablo"]?>" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus">YENİ EKLE</i></a>
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
                    <th>Sıra</th>
                    <th>Açıklama</th>
				
                    <th style="width:30px">Durum</th>
                    <th style="width:80px">Tarih</th>
                    <th style="width:120px;">İşlem</th>
                  </tr>
                  </thead>
			
                  <tbody>
				  <?php
				  $veriler=$DB->VeriGetir($kontrol[0]["Tablo"],"","","ORDER BY ID ASC");
					if($veriler!=false)
					{
						$sira=0;
						for($i=0;$i<count($veriler);$i++)
					{
						$sira++;
						if($veriler[$i]["Durum"]==1)
						{
							$akfifPasif='checked="checked"';
						}
						else
						{
							$akfifPasif="";
						}
						?>
				  <tr>
                    <td style="width:15px"><?=$sira?></td>
					
					<td>
					<?php 
					     echo stripslashes($veriler[$i]["Baslik"]);
						 echo '<br/>'.mb_substr(strip_tags(stripslashes($veriler[$i]["Metin"])),0,80,"UTF-8")."...";
					 ?>
					</td>
					<td style="text-align:center">

					<div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                     
					 <input type="checkbox"
					  class="custom-control-input aktifPasif<?=$veriler[$i]["ID"]?>" 
					  id="customSwitch3<?=$veriler[$i]["ID"]?>" <?=$akfifPasif?> 
					  onclick="aktifPasif(<?=$veriler[$i]["ID"]?>,'<?=$kontrol[0]["Tablo"]?>');" 
					  value="<?=$veriler[$i]["ID"]?>">
					  
					  
                      <label class="custom-control-label" 
					  for="customSwitch3<?=$veriler[$i]["ID"]?>" >
					  </label>
					  
                    </div>
                  </div>
				  
				  </td>
					<td><?=$veriler[$i]["Tarih"]?></td>
					
					<td>
					<a href="<?=SITE?>duzenle/<?=$kontrol[0]["Tablo"]?>/<?=$veriler[$i]["ID"]?>" class="btn btn-warning btn-sm">Güncelle</a>
					<a href="<?=SITE?>sil/<?=$kontrol[0]["Tablo"]?>/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm">Sil</a>
				
					</td>
					
                  </tr>
				  <?php
					}
					}
					
					?>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sıra</th>
				
                    <th>Açıklama</th>
                    <th>Durum</th>
                    <th>Tarih</th>
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
	  
	 <?php
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

  
	