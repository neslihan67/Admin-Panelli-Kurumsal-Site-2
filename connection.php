<?php 
  error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once(SINIF."class.upload.php");
//baglantı için veritabanına ihtiyacımız var. Yani veritabanı sınıfına
include_once(SINIF."DB.php");
//Yeni bir değişken tanımlayıp, veritabanımızdan dönen degerleri bu değişkene($DB) atıyoruz.
$DB=new DB();

$ayarlar=$DB-> VeriGetir("ayarlar","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
if($ayarlar!=false){
    $siteBaslik=$ayarlar[0]["Baslik"];
    $siteAnahtar=$ayarlar[0]["Anahtar"];
    $siteAciklama=$ayarlar[0]["Aciklama"];
	$siteTelefon=$ayarlar[0]["Telefon"];
	$siteMail=$ayarlar[0]["Mail"];
	$siteAdres=$ayarlar[0]["Adres"];
	$siteFaks=$ayarlar[0]["Faks"];
        $siteUrl=$ayarlar[0]["Url"];
	$siteFacebook=$ayarlar[0]["Facebook"];
	$siteTwitter=$ayarlar[0]["Twitter"];
	$siteLinkedin=$ayarlar[0]["Linkedin"];
	$siteInstagram=$ayarlar[0]["Instagram"];
}
else
{

}

?>