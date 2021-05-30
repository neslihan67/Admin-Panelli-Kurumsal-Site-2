
<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");
include_once(DATA."connection.php");
define("SITE","admin/");


if($_POST)
{
	if(!empty($_POST["Tablo"]) && !empty($_POST["ID"]) && !empty($_POST["Durum"]))
	{
		$tablo=$DB->Filter($_POST["Tablo"]);
		$ID=$DB->Filter($_POST["ID"]);
		$durum=$DB->Filter($_POST["Durum"]);
		$guncelle=$DB->SorguCalistir("UPDATE ".$tablo,"SET Durum=? WHERE ID=?", array($durum,$ID),1);
		
		if($guncelle!=false)
		{
			echo "TAMAM";
		}
		else
		{
			echo "HATA";
		}
	}
	else
    {
		echo "BOS";
	}	
		
}
else
{
	
}
	














?>

 