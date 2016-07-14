<?php
require('../includes/config.php'); 
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  ARABAYA ATILAN
if(isset($_POST['urun']) && isset($_POST['adet']) ){
	
			$servistur = trim(@$_POST['servistur']);
			$arac = trim(@$_POST['arac']);
			$urun = trim(@$_POST['urun']);
			$adet = trim(@$_POST['adet']);
			date_default_timezone_set('Europe/Istanbul');
			$tarih =  date('d.m.Y');
			$saat =  date('H:i');
			$araba = trim(@$_POST['araba']);
			
			
			$servis_sorgu = $db->prepare("SELECT * FROM arabayaatilan 
			where 
			servis_id=$servistur && 
			urun_id = $urun &&
			arac_id = $arac &&
			tarih = '$tarih'
			
			");
			$servis_sorgu->execute();

			if($servis_sorgu->rowCount()){
				echo 1;			
			}else{
				$stmt = $db->prepare('INSERT INTO arabayaatilan (tarih,saat,arac_id,urun_id,adet,servis_id) 
				VALUES (:tarih, :saat, :arac, :urun, :adet, :servistur)');
						$stmt->execute(array(
							':tarih' => $tarih,
							':saat' => $saat,
							':arac' => $arac,
							':urun' => $urun,
							':adet' => $adet,
							':servistur' => $servistur
						));
						echo 2;
			}
}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  MÜŞTERİYE ÜRÜN VER
if( isset($_POST['musterimiz']) && isset($_POST['bsidmiz']) && isset($_POST['verilenurun']) && isset($_POST['verilenadet']) ){
			$musteri = trim(@$_POST['musterimiz']);
			$bsid=trim(@$_POST['bsidmiz']);
			$urun = trim(@$_POST['verilenurun']);
			$vadet = trim(@$_POST['verilenadet']);
			date_default_timezone_set('Europe/Istanbul');
			$tarih =  date('d.m.Y');
			$saat =  date('H:i');
			
			$verilenurun_sorgu = $db->prepare("SELECT * FROM satisdetaylari 
			where 
			bs_id=$bsid && 
			musteri_id =$musteri &&
			urun_id = $urun 			
			");
			$verilenurun_sorgu->execute();

			if($verilenurun_sorgu->rowCount()){
				echo 1;
								
			}else{
				
				$stmt = $db->prepare("SELECT * FROM yapilanservisler where bs_id=$bsid");
				$stmt->execute();
				$ys = $stmt->fetch(PDO::FETCH_ASSOC);
				$arac_id = $ys['arac_id'];
				$servis_id = $ys['servis_id'];
				
				$aa = $db->prepare("SELECT * FROM arabayaatilan where tarih='$tarih' and arac_id=$arac_id and servis_id=$servis_id and urun_id=$urun"); 
				$aa->execute();
				$asayi=$aa->fetch(PDO::FETCH_ASSOC);
				$asayisi=$asayi['adet'];
				
				$sa = $db->prepare("SELECT sum(adet),urun_id FROM satisdetaylari where bs_id=$bsid and urun_id=$urun group by urun_id"); 
				$sa->execute();
				$ssayi=$sa->fetch(PDO::FETCH_ASSOC);
				$ssayisi=$ssayi['sum(adet)'];
				
				$kalan=$asayisi-$ssayisi;
				if($vadet<=$kalan){
					$stmt = $db->prepare('INSERT INTO satisdetaylari (tarih,saat,musteri_id,urun_id,adet,bs_id) 
				VALUES (:tarih, :saat, :musteri, :urun, :adet, :bsid)');
						$stmt->execute(array(
							':tarih' => $tarih,
							':saat' => $saat,
							':musteri' => $musteri,
							':urun' => $urun,
							':adet' => $vadet,
							':bsid' => $bsid
						));
						echo 3;
				}else{
					echo 2;	
				}
				
			}
			
}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  SERVİS ALINAN PARA
if( isset($_POST['musterihesap']) && isset($_POST['bsidhesap']) && isset($_POST['apara']) && isset($_POST['tthesap']) ){
			
			$musteri = trim(@$_POST['musterihesap']);
			$bsid=trim(@$_POST['bsidhesap']);
			$para = trim(@$_POST['apara']);
			$tthesap = trim(@$_POST['tthesap']);
			date_default_timezone_set('Europe/Istanbul');
			$tarih =  date('d.m.Y');
			$saat =  date('H:i');
			
			$stmt = $db->prepare('INSERT INTO satishesaptakip (tarih,saat,musteri_id,bs_id,tutar,alinan) 
				VALUES (:tarih, :saat, :musteri, :bsid, :tutar, :alinan)');
						$stmt->execute(array(
							':tarih' => $tarih,
							':saat' => $saat,
							':musteri' => $musteri,
							':tutar' => $tthesap,
							':alinan' => $para,
							':bsid' => $bsid
						));
						echo 1;
			
}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  ÜRÜN EKLE    

if(isset($_POST['urunadi'])){
			$marka = trim(@$_POST['marka']);
			$urunadi = trim(@$_POST['urunadi']);
			$maaliyet = trim(@$_POST['maaliyet']);
			$satisfiyati = trim(@$_POST['satisfiyati']);
			$barkodno = trim(@$_POST['barkodno']);
			$birimi = trim(@$_POST['birimi']);

			$urun_sorgu = $db->prepare("SELECT * FROM urunler where urun_adi=?");
			$urun_sorgu->execute(array($urunadi));

			$barkod_sorgu = $db->prepare("SELECT * FROM urunler where barkod_no=?");
			$barkod_sorgu->execute(array($barkodno));
					
					if($urun_sorgu->rowCount()){
						echo 1;
					}else if($barkod_sorgu ->rowCount()){
						echo 2;
					}else if(strlen($barkodno)!=13){
						echo 3;
					}else{

						$stmt = $db->prepare('INSERT INTO urunler (marka,urun_adi,barkod_no,maliyet,satis_fiyati,birimi) VALUES (:marka, :urunadi, :barkodno, :maliyet, :satisfiyati, :birimi)');
						$stmt->execute(array(
							':marka' => $marka,
							':urunadi' => $urunadi,
							':barkodno' => $barkodno,
							':maliyet' => $maaliyet,
							':satisfiyati' => $satisfiyati,
							':birimi' => $birimi
							
						));
						echo 4;

					} 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    ARAÇ EKLE

if(isset($_POST['plaka'])){
	
			$marka = trim(@$_POST['marka']);
			$model = trim(@$_POST['model']);
			$yil = trim(@$_POST['uretimyili']);
			$plaka = trim(@$_POST['plaka']);
			$ytipi = trim(@$_POST['ytipi']);
			$atipi = trim(@$_POST['atipi']);

			

			$plaka_sorgu = $db->prepare("SELECT * FROM araclar where plaka=?");
			$plaka_sorgu->execute(array($plaka));
					
					if($plaka_sorgu->rowCount()){
						echo 1;
					}else{

						$stmt = $db->prepare('INSERT INTO araclar (marka,model,yil,plaka,ytipi,atipi) VALUES (:marka, :model, :yil, :plaka, :ytipi, :atipi)');
						$stmt->execute(array(
							':marka' => $marka,
							':model' => $model,
							':yil' => $yil,
							':plaka' => $plaka,
							':ytipi' => $ytipi,
							':atipi' => $atipi
							
						));
						echo 2;

					} 
	
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////     YÖNETİCİ EKLE  

if(isset($_POST['username']) && isset($_POST['email']) ){
	
	
$username = trim(@$_POST['username']);
$email = trim(@$_POST['email']);
$sifre = trim(@$_POST['password']);
$sifretekrar = trim(@$_POST['passwordConfirm']);
$rol = 1; //Yönetici rolü varsayılan...

$username_sorgu = $db->prepare("SELECT * FROM members where username=?");
$username_sorgu->execute(array($username));

$email_sorgu = $db->prepare("SELECT * FROM members where email=?");
$email_sorgu->execute(array($email));
		
		if($username_sorgu->rowCount()){
			echo 1;
		}else if($email_sorgu->rowCount()){
			echo 2;
		}else{
			
			//hash the password
				$hashedpassword = $user->password_hash($sifre, PASSWORD_BCRYPT);

			
			$stmt = $db->prepare('INSERT INTO members (username,password,email,rol) VALUES (:username, :password, :email, :rol)');
			$stmt->execute(array(
				':username' => $username,
				':password' => $hashedpassword,
				':email' => $email,
				':rol' => $rol
			));
			
			echo 3;

		} 
	
	
	
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////     MÜŞTERİ EKLE 

if( isset($_POST['firmaadi']) && isset($_POST['sahibi']) ){
	
	
$firmaadi = trim(@$_POST['firmaadi']);
$sahibi = trim(@$_POST['sahibi']);
$adres = trim(@$_POST['adres']);
$istel = trim(@$_POST['istel']);
$ceptel = trim(@$_POST['ceptel']);
$email = trim(@$_POST['memail']);
$liste = trim(@$_POST['liste']);
$sira = trim(@$_POST['sira']);
$bakiye = trim(@$_POST['bakiye']);
$username = trim(@$_POST['musername']);
$sifre  = trim(@$_POST['password']);
$sifretekrar  = trim(@$_POST['passwordConfirm']);
$rol=3;

$kullanici_sorgu = $db->prepare("SELECT * FROM members where username=?");
$kullanici_sorgu->execute(array($username));

$email_sorgu = $db->prepare("SELECT * FROM members where email=?");
$email_sorgu->execute(array($email));

$firmaadi_sorgu = $db->prepare("SELECT * FROM musteriler where musteri=?");
$firmaadi_sorgu->execute(array($firmaadi));

		
		if($kullanici_sorgu->rowCount()){
			echo 1;
		}else if($email_sorgu->rowCount()){
			echo 2;
		}else if($sifre != $sifretekrar){
			echo 3;
		}else if($firmaadi_sorgu->rowCount()){
			echo 4;
		}else{
			
			//hash the password
				$hashedpassword = $user->password_hash($sifre, PASSWORD_BCRYPT);

			
			$stmt = $db->prepare('INSERT INTO members (username,password,email,rol) VALUES (:username, :password, :email, :rol)');
			$stmt->execute(array(
				':username' => $username,
				':password' => $hashedpassword,
				':email' => $email,
				':rol' => $rol
			));
			$lastId = $db->lastInsertId();
			if($lastId != null){
				
				$musteribilgi = $db->prepare('INSERT INTO musteriler (userID,musteri,sahibi,m_adres,is_tel,cep_tel,liste,bakiye,sira) 
				                                    VALUES (:userID, :firmaadi, :sahibi, :adres, :istel, :ceptel, :liste, :bakiye, :sira)');
				$musteribilgi->execute(array(
				':userID' => $lastId,
				':firmaadi' => $firmaadi,
				':sahibi' => $sahibi,
				':adres' => $adres,
				':istel' => $istel,
				':ceptel' => $ceptel,
				':liste' => $liste,
				':bakiye' => $bakiye,
				':sira' => $sira
				
											));

			}


		//else catch the exception and show the error.
		} 
	
	
}

//////////////////////   //////////////////////////////////////////////////////////////////////////////////////     PERSONEL EKLE   
if(isset($_POST['adi']) && isset($_POST['soyadi'])){

$adi = trim(@$_POST['adi']);
$soyadi = trim(@$_POST['soyadi']);
$adres = trim(@$_POST['adres']);
$evtel = trim(@$_POST['evtel']);
$ceptel = trim(@$_POST['ceptel']);
$email = trim(@$_POST['semail']);
$medenihal = trim(@$_POST['medenihal']);
$iban = trim(@$_POST['iban']);
$maas = trim(@$_POST['maas']);
$isbastar = trim(@$_POST['isbastar']);
$csayisi = trim(@$_POST['csayisi']);
$username = trim(@$_POST['susername']);
$sifre  = trim(@$_POST['password']);
$sifretekrar  = trim(@$_POST['passwordConfirm']);
$konum=trim(@$_POST['konum']);
$rol=2;
$kullanici_sorgu = $db->prepare("SELECT * FROM members where username=?");
$kullanici_sorgu->execute(array($username));

$email_sorgu = $db->prepare("SELECT * FROM members where email=?");
$email_sorgu->execute(array($email));

		
		if($kullanici_sorgu->rowCount()){
			echo 1;
		}else if($email_sorgu->rowCount()){
			echo 2;
		}else if($sifre != $sifretekrar){
			echo 3;
		}else{
			
			//hash the password
				$hashedpassword = $user->password_hash($sifre, PASSWORD_BCRYPT);

			
			$stmt = $db->prepare('INSERT INTO members (username,password,email,rol) VALUES (:username, :password, :email, :rol)');
			$stmt->execute(array(
				':username' => $username,
				':password' => $hashedpassword,
				':email' => $email,
				':rol' => $rol
			));
			$lastId = $db->lastInsertId();
			if($lastId != null){
				
				$musteribilgi = $db->prepare('INSERT INTO personel (userID,adi,soyadi,adres,evtel,ceptel,iban,maas,medenihal,csayisi,isbastar,rol) 
				                                    VALUES (:userID, :adi, :soyadi, :adres, :evtel, :ceptel,:iban, :maas, :medenihal, :csayisi, :isbastar, :rol)');
				$musteribilgi->execute(array(
				':userID' => $lastId,
				':adi' => $adi,
				':soyadi' => $soyadi,
				':adres' => $adres,
				':evtel' => $evtel,
				':ceptel' => $ceptel,
				':iban' => $iban,
				':maas' => $maas,
				':medenihal' => $medenihal,
				':csayisi' => $csayisi,
				':isbastar' => $isbastar,
				':rol' => $konum
				
											));

			}

		} 
}
//////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////     ROL EKLE  

if(isset($_POST['rol']) && isset($_POST['tanim'])){
	$konum = trim(@$_POST['rol']);
	$tanim = trim(@$_POST['tanim']);

	
	$rol_sorgu = $db->prepare("SELECT * FROM roller where konum=?");
	$rol_sorgu->execute(array($konum));
		if($rol_sorgu->rowCount()){
			echo 1;
		}else{
			$stmt = $db->prepare('INSERT INTO roller (konum,tanim) VALUES (:konum, :tanim)');
			$stmt->execute(array(
				':konum' => $konum,
				':tanim' => $tanim
				
			));
			echo 2;
			
		}
	
	
}

//////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////     HİZMET EKLE  

if(isset($_POST['hizmet']) && isset($_POST['hizmettanim'])){
	$hizmet = trim(@$_POST['hizmet']);
	$hizmettanim = trim(@$_POST['hizmettanim']);
	
	$hizmet_sorgu = $db->prepare("SELECT * FROM hizmetler where hizmet=?");
	$hizmet_sorgu->execute(array($hizmet));
		if($hizmet_sorgu->rowCount()){
			echo 1;
		}else{
			$stmt = $db->prepare('INSERT INTO hizmetler (hizmet,tanim) VALUES (:hizmet, :tanim)');
			$stmt->execute(array(
				':hizmet' => $hizmet,
				':tanim' => $hizmettanim
			));
			echo 2;
			
		}
	
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     SERVİS TÜRÜ EKLE  

if(isset($_POST['servisadi']) && isset($_POST['tanim'])){
	$servisadi = trim(@$_POST['servisadi']);
	$tanim = trim(@$_POST['tanim']);
	
	$tur_sorgu = $db->prepare("SELECT * FROM serviscesit where servis_adi=?");
	$tur_sorgu->execute(array($servisadi));
		if($tur_sorgu->rowCount()){
			echo 1;
		}else{
			$stmt = $db->prepare('INSERT INTO serviscesit (servis_adi,tanim) VALUES (:servisadi, :tanim)');
			$stmt->execute(array(
				':servisadi' => $servisadi,
				':tanim' => $tanim
			));
			echo 2;
			
		}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     GÜZERGAH TÜRÜ GETİR  

if(isset($_POST['guzergah'])){
	$guzergahlist   = implode(',', $_POST['guzergah']);
	
	
	$guzergah_sorgu = $db->prepare("SELECT * FROM musteriler A JOIN guzergahlar B on A.liste=B.guzergah_id where A.liste='$guzergahlist'");
	$guzergah_sorgu->execute(); 
	$musteri = $guzergah_sorgu->fetch(PDO::FETCH_ASSOC);

	if($musteri){
		echo "<span class='f14 gri'><b class='red'>".$musteri['guzergah_adi']."</b> güzergahındaki müşteriler.  <i class='fa fa-random pull-right'></i></span>
			<div style='clear:both'></div><hr class='m5top m5bottom' />
				
			<ul><li id='listeId_guncelle' style='display: none;'></li>";
						
		$veriler = $db->prepare("SELECT m_id,musteri,m_adres FROM musteriler  where liste='$guzergahlist' Order By sira Asc");
		$veriler->execute();
		
			while( $lst = $veriler->fetch(PDO::FETCH_ASSOC) ) {  

				echo "<li id='listeId_".$lst['m_id']."'><b><u>".$lst['musteri']."</u></b> - ".$lst['m_adres']."</li>";
				
			}
		echo "</ul>";	
		echo " 	<script type='text/javascript'>
			$(document).ready(function(){ 
			$('#liste ul').sortable({opacity: 0.5, update: function(){
				var siralama = $(this).sortable('serialize');
				$.post('db/db.php', siralama);											 
			}});
		});	
	</script>";
	}else{
		echo "<span class='f14 gri'><b class='red'>Seçilen güzergahta müşteri bulunamadı.</b>   <i class='fa fa-warning fa-2x pull-right red'></i></span>";
	}
		


	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  HESAP TOPLA MÜŞTERİ SEÇİM KISMI 

if(isset($_POST['guzergahHesap'])){
	$guzergahlist   = implode(',', $_POST['guzergahHesap']);
	
	
	$guzergah_sorgu = $db->prepare("SELECT * FROM musteriler A JOIN guzergahlar B on A.liste=B.guzergah_id where A.liste='$guzergahlist'");
	$guzergah_sorgu->execute(); 
	$musteri = $guzergah_sorgu->fetch(PDO::FETCH_ASSOC);

	if($musteri){
		echo "<span class='f14 gri'><b class='red'>".$musteri['guzergah_adi']."</b> güzergahındaki müşteriler.  <i class='fa fa-random pull-right'></i></span>
			<div style='clear:both'></div><hr class='m5top m5bottom' />
				
			<ol id='selectable'>";
						
		$veriler = $db->prepare("SELECT m_id,musteri FROM musteriler  where liste='$guzergahlist' Order By sira Asc");
		$veriler->execute();
		
			while( $lst = $veriler->fetch(PDO::FETCH_ASSOC) ) {  

				echo "<li id='".$lst['m_id']."'><b><u><i id='data-id".$lst['m_id']."' id='check-icon' class=\"fa fa-check m5right none\" aria-hidden=\"true\"></i>".$lst['musteri']."</u></b></li>";
				
			}
		echo "</ol>";	
		echo " 	<script type='text/javascript'>

			$(function() {
				
				$(\"#selectable\").bind(\"mousedown\", function(evt) {
					evt.metaKey = true;
					
				}).selectable({
							stop: function() {
								var result =[]
								$( \"li.ui-selected\", this ).each(function() {
									result.push( this.id);
									
								});
								$( \"#select-result\" ).val(result.join(','))
							
							}
						});   
				});
	</script>";
	}else{
		echo "<span class='f14 gri'><b class='red'>Seçilen güzergahta müşteri bulunamadı.</b>   <i class='fa fa-warning fa-2x pull-right red'></i></span>";
	}
		


	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     GÜZERGAH TÜRÜ EKLE  

if(isset($_POST['guzergahadi']) && isset($_POST['guzergahtanim'])){
	$guzergahadi = trim(@$_POST['guzergahadi']);
	$guzergahtanim = trim(@$_POST['guzergahtanim']);
	
	$tur_sorgu = $db->prepare("SELECT * FROM guzergahlar where guzergah_adi=?");
	$tur_sorgu->execute(array($guzergahadi));
	
		if($tur_sorgu->rowCount()){
			echo 1;
		}else{
			$stmt = $db->prepare('INSERT INTO guzergahlar (guzergah_adi,tanim) VALUES (:guzergahadi, :guzergahtanim)');
			$stmt->execute(array(
				':guzergahadi' => $guzergahadi,
				':guzergahtanim' => $guzergahtanim
			));
			echo 2;
			
		}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// MÜŞTERİYE ÖZEL FİYAT BELİRLE  

if(isset($_POST['musterisec']) && isset($_POST['urunsec'])){
	$musteri = trim(@$_POST['musterisec']);
	$urun = trim(@$_POST['urunsec']);
	$fiyat = trim(@$_POST['fiyatver']);
	$ttarih =  trim(@$_POST['tarih']);
	function tarihDuzenle($ttarih){
		return implode('.',array_reverse(explode('-',$ttarih)));
	}
	$tarih=tarihDuzenle($ttarih);
	
	
	$mu_sorgu = $db->prepare("SELECT * FROM ozelfiyat where musteri_id=? and urun_id=? and tarih=?");
	$mu_sorgu->execute(array($musteri,$urun,$tarih));
		if($mu_sorgu->rowCount()){
			echo 1;
		}else{
			$stmt = $db->prepare('INSERT INTO ozelfiyat (musteri_id,urun_id,fiyat,tarih) VALUES (:musteri, :urun, :fiyat, :tarih)');
			$stmt->execute(array(
				':musteri' => $musteri,
				':urun' => $urun,
				':fiyat' => $fiyat,
				':tarih' => $tarih
			));
			echo 2;
			
		}
	
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ÇIKAN ÜRÜNLER RAPOR KISMI
if(isset($_POST['trh'])){
	
	$trh=trim(@$_POST['trh']);	
	function tarihDuzenle($trh){
		return implode('.',array_reverse(explode('-',$trh)));
	}
	$tarih=tarihDuzenle($trh);
	
	
	
	$ta_sorgu = $db->prepare("SELECT * FROM arabayaatilan where tarih=?");
	$ta_sorgu->execute(array($tarih));
		if($ta_sorgu->rowCount()){
			$stmt = $db->prepare("SELECT tarih,urun_adi,sum(adet),birimi FROM arabayaatilan A JOIN urunler B ON A.urun_id=B.urun_id  where A.tarih='$tarih' group by A.urun_id ");
			$stmt->execute();
			$sayi=0;
			
			echo "
					<thead>
						<tr>
							<th>S.N</th>
							<th>Ürünler</th>
							<th>Birim Miktar</th>
						</tr>
					</thead>
					<tbody class='searchable'>";
			
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			
			
			echo "
			<tr>
				<td>".$sayi=1+$sayi."</td><td>".$row['urun_adi']."</td>
				<td >".$row['sum(adet)']." ".$row['birimi']."</td>
			</tr>
			";
			}
			echo "</tbody>";
		}else{
			echo "<tr class='red' style='background:#fff;'><td style='border-right:0 none;'></td><td style='border-right:0 none;' class='text-center'><b>".$tarih." tarihinde ürün çıkışı olmamış ya da kaydedilmemiş!</b></td><td></td></tr>";
		}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ÇIKAN ÜRÜNLER RAPOR KISMI
if(isset($_POST['servis_turu']) && isset($_POST['guzergahtur']) ){
	$guzergah=@$_POST['guzergahtur'];
	$arac=@$_POST['arac'];
	$servis_turu=@$_POST['servis_turu'];
	$servisci=@$_POST['servisci'];
	
	date_default_timezone_set('Europe/Istanbul');
	$tarih =  date('d.m.Y');
	$saat =  date('H:i');
	
	$stmt = $db->prepare('INSERT INTO yapilanservisler (servisci_id,servis_id,arac_id,guzergah_id,tarih,baslangic_saati) 
				VALUES (:servisci_id, :servis_id, :arac, :guzergah_id, :tarih, :baslangic_saati)');
						$stmt->execute(array(
							':servisci_id' => $servisci,
							':servis_id' => $servis_turu,
							':arac' => $arac,
							':guzergah_id' => $guzergah,
							':tarih' => $tarih,
							':baslangic_saati' => $saat
						));
						$lastidmiz= $db->LastInsertID();
						echo $lastidmiz;
}
?>