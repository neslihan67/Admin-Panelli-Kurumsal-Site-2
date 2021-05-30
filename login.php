

<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");
include_once(DATA."connection.php");
define("SITE",$siteUrl."admin/");

if(!empty($_SESSION["ID"]) && (!empty($_SESSION["adsoyad"])) && (!empty($_SESSION["mail"])))
	{
		?>
		<meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <title><?=$siteBaslik?></title>
<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="keywords" content="<?=$siteAnahtar?>">
  <meta http-equiv="description" content="<?=$siteAciklama?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=SITE?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=SITE?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE?>dist/css/adminlte.min.css">
</head>
<style>
body{

background-image: url("../images/admin/arkaplan.jpg");
backgroung-repeat:no repeat;
 background-repeat: no-repeat;
 background-attachment: fixed;
 background-position: right;
background-size: cover;
}
</style>
<body class="login-page">
 
<div style="margin-top:0px;padding-top:0px; margin-bottom:0px;padding-bottom:0px;" class="container">
<div style="margin-left:30px; margin-right:30px;margin-top:0px;padding-top:0px;" class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
 

  <a href="https://medianostalgie.com/"><img  style="width:100%"  src="<?=$siteUrl?>images/medianostalgie/media.png"></a>
</div>
</div>
</div>
<div class="login-box">
  <div class="login-logo">
    <a href="<?=SITE?>"><h1 style="color:black;opacity:0.99;" ><b>Yönetim</b>Girişi</a><h1>
  </div>
  <!-- /.login-logo -->
  <div style="opacity:0.55;" class="card">
  
    <div class="card-body login-card-body">
      <p class="login-box-msg">Giriş yapmak için bilgilerinizi giriniz.</p>
    
	<?php
	
	if($_POST)
	{
		if(!empty($_POST["kullanici"]) && !empty($_POST["sifre"]))
		{
			$kullanici=$DB->Filter($_POST["kullanici"]);
			$sifre=$DB->Filter($_POST["sifre"]);
			$kontrol=$DB->VeriGetir("kullanicilar","WHERE KullaniciAdi=? AND Sifre=?",array($kullanici,$sifre),"ORDER BY ID ASC",1);
			if($kontrol!=false)
			{
				$_SESSION["ID"]=$kontrol[0]["ID"];
				$_SESSION["adsoyad"]=$kontrol[0]["Adsoyad"];
				$_SESSION["mail"]=$kontrol[0]["Mail"];
				$_SESSION["kullanici"]=$kontrol[0]["KullaniciAdi"];
									
				?>
				<meta http-equiv="refresh" content="1;url=<?=SITE?>"> 
				<?php
			exit();
			}
			else
			{
				echo '<div class="alert alert-danger">Kullanıcı adı veya şifre hatalı</div>';
			}
		}
		else
	    {
		  echo '<div class="alert alert-danger">Boş Alanları doldurunuz.</div>';
	    }
	}
	
	?>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input style="border-color:#00cbcc;" type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adınız">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input style="border-color:#00cbcc;" type="password" class="form-control" name="sifre" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-sm">Giriş Yap</button>
          </div> 
		 </div>
		  
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=SITE?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=SITE?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=SITE?>dist/js/adminlte.min.js"></script>
</body>
</html>
