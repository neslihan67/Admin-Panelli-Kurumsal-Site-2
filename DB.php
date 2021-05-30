<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
class DB{



var $server="localhost";
var $user="root";
var $password="";
var $dbname="miracoto_dbavukatv1";

var $connection;

function __construct()
{

    try {
         $this->connection=new PDO("mysql:host=".$this->server.";dbname=".$this->dbname.";charset=utf8;",$this->user,$this->password);
         //Burada veritabını baglantısında sorun varsa veritabnı ısmı yanlıs ya da user password yanlıssa diye try catch yapısı kuruyoruz.
      

    } catch (PDOException $error) {

        echo $error->getMessage();
        exit();
    }
   
	
}

//SELECT * FROM TabloAdı WHERE Sart ORDER BY Referans sıralama sekli(b->k or k->b or alfabetik vs.) LIMIT 1 (KAC DEGER GETİRECEGİM(Burada 1 olacak panelin bir ismi olur.))
//SELECT *FROM Ayarlar WHERE ID=1 ORDER BY ASC LIMIT 1
//VARSAYILAN SIRALAMA ORDER BY ID ASC
public function VeriGetir($tablo,$whereAlanlar="",$whereArrayDeger="", $orderby="ORDER BY ID ASC", $limit=""){
    $this->connection->query("SET CHARACTER SET utf8");
    $sql="SELECT * FROM ".$tablo; //SELECT * FROM Ayarlar

    if(!empty($whereAlanlar) && !empty($whereArrayDeger)){

        $sql.=" ".$whereAlanlar;

        if(!empty($orderby)){
            $sql.=" ".$orderby;
        }
        
        if(!empty($limit)){
            $sql.=" LIMIT ".$limit;
        }
                
        $run=$this->connection->prepare($sql);
        
        $result=$run->execute($whereArrayDeger);
        $data=$run->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
		
        if(!empty($orderby)){
            $sql.=" ".$orderby;
        }

        if(!empty($limit)){
            $sql.=" LIMIT ".$limit; 
        }

        $data=$this->connection->query($sql,PDO::FETCH_ASSOC);


    }

    if($data!=false && (!empty($data))){
        $datas=array();
        foreach($data as $bilgiler){
            $datas[]=$bilgiler;
        }
        return $datas;
    }

    else
    {
        return false;
    } 

}

//EKLEME SİLME GUNCELLEME İŞLEMLERİ BURADAN YAPILACAK

public function SorguCalistir($tablo,$alanlar="",$degerArray="",$limit="")
{
	$this->connection->query("SET CHARACTER SET utf8");
	
	if((!empty($alanlar)) && (!empty($degerArray)))
	{
			
	    $sql=$tablo." ".$alanlar; 
	    if(!empty($limit))
	    {
		    $sql.=" LIMIT ".$limit;
		}
	        $run=$this->connection->prepare($sql);
		    $result=$run->execute($degerArray);
			
	    
	}	
	else
	{
		$sql=$tablo;
		
		if(!empty($limit))
		{
			$sql.=" LIMIT ".$limit;
		}
		$result=$this->connection->exec($sql);
    }
	
	if($result!=false)
		
	{
		return true;
	}
	
	else
	{
	
		return false;
	}
	$this->connection->query("SET CHARACTER SET utf8");
}


//Türkçe karakter kullanımı:veritabanı için kontrol 
public function seflink($val)
{
	$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#','?','*','!','.','(',')');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp','','','','','','');
		$string = strtolower(str_replace($find, $replace, $val));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;
	
}

      public function kucukten_buyuge($metin)
       {
        $bul = array('ı','i','ğ','ü','ş','ö','ç');
        $degistir = array('I','İ','Ğ','Ü','Ş','Ö','Ç');
        $metin = str_replace($bul,$degistir,$metin);
        return $metin;
        }  


     public function buyukten_kucuge($metin)
    {
        $bul = array('I','İ','Ğ','Ü','Ş','Ö','Ç');
        $degistir = array('ı','i','ğ','ü','ş','ö','ç');
        $metin = str_replace($bul,$degistir,$metin);
        return $metin;
    } 

public function karakter($metin){
	
    $tr = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü');
    $kod = array('&Ccedil;', '&ccedil;', '&#286;', '&#287;', '&#305;', '&#304;', '&Ouml;', '&ouml;', '&#350;', '&#351;', '&Uuml;', '&uuml;');
    $veri = str_replace($tr, $kod, $metin);
	return $veri;
	
}
	
		

public function ModulEkle()
{

	if(!empty($_POST["baslik"]))
	{
		
		$baslik=$_POST["baslik"];
		if(!empty($_POST["durum"]))
		{
			$durum=1;
		}
		else
		{
			$durum=2;
		}
		$tablo=str_replace("-","",$this->seflink($baslik));
		$kontrol=$this->VeriGetir("moduller","WHERE Tablo=?",array($tablo),"ORDER BY ID ASC",1);
		if($kontrol!=false)
		{
			return false;
		}
		else
		{
			$tabloOlustur=$this->SorguCalistir('
			
	CREATE TABLE IF NOT EXISTS '.$tablo.' (
  `ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Seflink` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Kategori` int(11) DEFAULT NULL,
  `Metin` text COLLATE utf8_turkish_ci,
  `Resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Anahtar` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Durum` int(5) DEFAULT NULL,
  `Sirano` int(11) DEFAULT NULL,
  `Tarih` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
	');
			$modulekle=$this->SorguCalistir("INSERT INTO moduller","SET Baslik=?, Tablo=?, Durum=?, Tarih=?",array($baslik,$tablo,$durum,date("Y-m-d")));
		    $kategoriekle=$this->SorguCalistir("INSERT INTO kategoriler","SET Baslik=?, Seflink=?, Tablo=?, Durum=?, Tarih=?",array($baslik,$tablo,'modul' ,1,date("Y-m-d")));
		    
			if($modulekle!=false)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
	}
	else
	{
		return false;
	}
}
//SQL INJECTION HATALARI ICIN
public function Filter($val,$tf=false)
{
	if($tf==false)
	{
		$val=strip_tags($val);
	}
	$val=addslashes(trim($val));
	return $val;
}

public function uzanti($dosyaadi)

{
	$parca=explode(".",$dosyaadi);
	$uzanti=end($parca);
	$donustur=strtolower($uzanti);
	return $donustur;
}
//<!------------------------------------------------------------------------>

public function upload($nesnename,$yuklenecekyer='images/',$tur='img',$w='',$h='',$resimyazisi='')
	{
		if($tur=="img")
		{
			if(!empty($_FILES[$nesnename]["name"]))
			{
				$dosyanizinadi=$_FILES[$nesnename]["name"];
				$tmp_name=$_FILES[$nesnename]["tmp_name"];
				$uzanti=$this->uzanti($dosyanizinadi);
				if($uzanti=="png" || $uzanti=="jpg" || $uzanti=="jpeg" || $uzanti=="gif")
				{
					$classIMG=new upload($_FILES[$nesnename]);
					if($classIMG->uploaded)
					{
						if(!empty($w))
						{
							if(!empty($h))
							{
								$classIMG->image_resize=true;
								$classIMG->image_x=$w;
								$classIMG->image_y=$h;
							}
							else
							{
								if($classIMG->image_src_x>$w)
								{
									$classIMG->image_resize=true;
									$classIMG->image_ratio_y=true;
									$classIMG->image_x=$w;
								}
							}
						}
						else if(!empty($h))
						{
								if($classIMG->image_src_h>$h)
								{
									$classIMG->image_resize=true;
									$classIMG->image_ratio_x=true;
									$classIMG->image_y=$h;
								}
						}
						
						if(!empty($resimyazisi))
						{
							$classIMG->image_text = $resimyazisi;

						$classIMG->image_text_direction = 'v';
						
						$classIMG->image_text_color = '#FFFFFF';
						
						$classIMG->image_text_position = 'BL';
						}
						$rand=uniqid(true);
						$classIMG->file_new_name_body=$rand;
						$classIMG->Process($yuklenecekyer);
						if($classIMG->processed)
						{
							$resimadi=$rand.".".$classIMG->image_src_type;
							return $resimadi;
						}
						else
						{
							return false;
						}
					}
					else
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else if($tur=="ds")
		{
			
			if(!empty($_FILES[$nesnename]["name"]))
			{
				
				$dosyanizinadi=$_FILES[$nesnename]["name"];
				$tmp_name=$_FILES[$nesnename]["tmp_name"];
				$uzanti=$this->uzanti($dosyanizinadi);
				if($uzanti=="doc" || $uzanti=="docx" || $uzanti=="pdf" || $uzanti=="xlsx" || $uzanti=="xls" || $uzanti=="ppt" || $uzanti=="xml" || $uzanti=="mp4" || $uzanti=="avi" || $uzanti=="mov")
				{
					
					$classIMG=new upload($_FILES[$nesnename]);
					if($classIMG->uploaded)
					{
						$rand=uniqid(true);
						$classIMG->file_new_name_body=$rand;
						$classIMG->Process($yuklenecekyer);
						if($classIMG->processed)
						{
							$dokuman=$rand.".".$uzanti;
							return $dokuman;
						}
						else
						{
							return false;
						}
					}
				}
			}
		}
		else
		{
			return false;
		}
	}
	//<!------------------------------------------------------------------------>
	public function kategoriGetir($tablo,$secilenID="",$uzunluk=-1)
	{
		$uzunluk++;
		$kategori=$this->VeriGetir("kategoriler","WHERE  Tablo=?",array($tablo),"ORDER BY ID ASC");
		if($kategori!=false)
		{
			for($q=0;$q<count($kategori);$q++)
			{
				$kategoriSeflink=$kategori[$q]["Seflink"];
				$kategoriID=$kategori[$q]["ID"];
				if($secilenID==$kategoriID)
				{
					echo '<option value="'.$kategoriID.'"selected="selected">'.str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$uzunluk).stripslashes($kategori[$q]["Baslik"]).'</option>';
				}
				else
				{
					echo '<option value="'.$kategoriID.'">'.str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$uzunluk),stripslashes($kategori[$q]["Baslik"]).'</option>';
				
				}
				if($kategoriSeflink==$tablo)
	           	{
		         	break;
			        $this->kategoriGetir($kategoriSeflink,$secilenID,$uzunluk);
	         	}
 				
			}
			
		}
		else
		{
			return false;
		}
		
	}
	
	
		public function tekKategoriGetir($tablo,$secilenID="",$uzunluk=-1)
	{
		$uzunluk++;
		$kategori=$this->VeriGetir("kategoriler","WHERE  Seflink=? AND Tablo=?",array($tablo,"modul"),"ORDER BY ID ASC");
		if($kategori!=false)
		{
			for($q=0;$q<count($kategori);$q++)
			{
				$kategoriSeflink=$kategori[$q]["Seflink"];
				$kategoriID=$kategori[$q]["ID"];
				if($secilenID==$kategoriID)
				{
					echo '<option value="'.$kategoriID.'"selected="selected">'.str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$uzunluk).stripslashes($kategori[$q]["Baslik"]).'</option>';
				}
				else
				{
					echo '<option value="'.$kategoriID.'">'.str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$uzunluk),stripslashes($kategori[$q]["Baslik"]).'</option>';
				
				}
				
			}
		}
		else
		{
			return false;
		}
		
		}
	
		
public function MailGonder($mail,$konu="",$mesaj)
	   {
		   include_once(SINIF."class.phpmailer.php");
include_once(SINIF."class.smtp.php");

			   $posta = new PHPMailer();
			   	$posta->CharSet = "UTF-8";
				$posta->IsSMTP();                                   // send via SMTP
				$posta->Host     = 	"ssl://smtp.gmail.com"; // SMTP servers
				$posta->SMTPAuth = true;     // turn on SMTP authentication
				$posta->Username = "neslihanozdemir642@gmail.com";  // SMTP username
				$posta->Password = "Kalem.12NO"; // SMTP password
				$posta->Port     = 465; 
				$posta->From     = "neslihanozdemir642@gmail.com"; // smtp kullanýcý adýnýz ile ayný olmalý
				$posta->Fromname = "neslihanozdemir642@gmail.com";
				$posta->AddAddress($mail, "neslihanozdemir642@gmail.com");
				$posta->Subject  =  $konu;
				$posta->Body     =  $mesaj;
				
				if(!$posta->Send())
				{
					return false;
				}
				else
				{
					return true;
				}
	   }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

?>









