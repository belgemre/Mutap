<?php
require('../includes/config.php'); 

////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  MÜŞTERİ BİLGİLERİ    
if( isset($_POST['musteri']) && isset($_POST['sahibi']) ){

		$musteri = trim(@$_POST['musteri']);
		$sahibi = trim(@$_POST['sahibi']);
		$adres = trim(@$_POST['adres']);
		$istel = trim(@$_POST['istel']);
		$ceptel = trim(@$_POST['ceptel']);
		$liste = trim(@$_POST['liste']);
		$m_id=trim(@$_POST['m_id']);
		
		$musteri_sorgu = $db->prepare("SELECT * FROM musteriler where musteri=?");
		$musteri_sorgu->execute(array($musteri));
		
		$stmt = $db->prepare("SELECT * FROM musteriler where m_id= $m_id");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
		
		
		if($musteri == $row['musteri'] 
		&& $sahibi == $row['sahibi'] 
		&& $adres == $row['m_adres'] 
		&& $istel == $row['is_tel'] 
		&& $ceptel == $row['cep_tel'] 
		&& $liste == $row['liste'] ){
		
			echo 1;
		
		}else if($musteri!=$row['musteri']){
			
				$musteri_sorgu = $db->prepare("SELECT * FROM musteriler where musteri=?");
				$musteri_sorgu->execute(array($musteri));
			
				if($musteri_sorgu->rowCount()){
					echo 2;
				}else{
				
						$sql = "UPDATE musteriler SET 
						musteri = :musteri,
						sahibi = :sahibi,
						m_adres = :m_adres,
						is_tel = :istel,
						cep_tel = :ceptel,
						liste = :liste
						WHERE m_id= :m_id";
						$stmt = $db->prepare($sql);                                 
						$stmt->bindParam(':musteri', $musteri, PDO::PARAM_STR);    
						$stmt->bindParam(':sahibi', $sahibi, PDO::PARAM_STR);  
						$stmt->bindParam(':m_adres', $adres, PDO::PARAM_STR);    
						$stmt->bindParam(':istel', $istel, PDO::PARAM_STR); 
						$stmt->bindParam(':ceptel', $ceptel, PDO::PARAM_STR); 	
						$stmt->bindParam(':liste', $liste, PDO::PARAM_INT); 	

						$stmt->bindParam(':m_id', $m_id, PDO::PARAM_INT);   
						$stmt->execute(); 
						echo 3;
				}
			
		}else{
				
						$sql = "UPDATE musteriler SET 
						musteri = :musteri,
						sahibi = :sahibi,
						m_adres = :m_adres,
						is_tel = :istel,
						cep_tel = :ceptel,
						liste = :liste
						WHERE m_id= :m_id";
						$stmt = $db->prepare($sql);                                 
						$stmt->bindParam(':musteri', $musteri, PDO::PARAM_STR);    
						$stmt->bindParam(':sahibi', $sahibi, PDO::PARAM_STR);  
						$stmt->bindParam(':m_adres', $adres, PDO::PARAM_STR);    
						$stmt->bindParam(':istel', $istel, PDO::PARAM_STR); 
						$stmt->bindParam(':ceptel', $ceptel, PDO::PARAM_STR); 	
						$stmt->bindParam(':liste', $liste, PDO::PARAM_INT); 	

						$stmt->bindParam(':m_id', $m_id, PDO::PARAM_INT);   
						$stmt->execute(); 
						echo 3;
				}
		
}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  PERSONEL BİLGİLERİ    
if( isset($_POST['personeladi']) && isset($_POST['personelsoyadi']) ){
	$id = trim(@$_POST['per_id']);
	$adi = trim(@$_POST['personeladi']);
	$soyadi = trim(@$_POST['personelsoyadi']);
	$adres = trim(@$_POST['adres']);
	$evtel = trim(@$_POST['evtel']);
	$ceptel = trim(@$_POST['ceptel']);
	$medenihal = trim(@$_POST['medenihal']);
	$iban = trim(@$_POST['iban']);
	$maas = trim(@$_POST['maas']);
	$isbastar = trim(@$_POST['isbastar']);
	$csayisi = trim(@$_POST['csayisi']);
	$konum=trim(@$_POST['konum']);
	
	$stmt = $db->prepare("SELECT * FROM personel where per_id= $id");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
		
		
		if($adi == $row['adi'] 
		&& $soyadi == $row['soyadi'] 
		&& $adres == $row['adres'] 
		&& $evtel == $row['evtel'] 
		&& $ceptel == $row['ceptel'] 
		&& $medenihal == $row['medenihal']
		&& $iban == $row['iban']
		&& $maas == $row['maas']
		&& $isbastar == $row['isbastar']
		&& $csayisi == $row['csayisi']
		&& $konum == $row['rol']		){
		
			echo 2;
		
		}else{
			$sql = "UPDATE personel SET 
			adi = :adi,
			soyadi = :soyadi,
			adres = :adres,
			evtel = :evtel,
			ceptel = :ceptel,
			medenihal = :medenihal,
			iban = :iban,
			maas = :maas,
			isbastar = :isbastar,
			csayisi = :csayisi,
			rol = :konum
			
			WHERE per_id= :per_id";
			$stmt = $db->prepare($sql);                                 
			$stmt->bindParam(':adi', $adi, PDO::PARAM_STR);    
			$stmt->bindParam(':soyadi', $soyadi, PDO::PARAM_STR);  
			$stmt->bindParam(':adres', $adres, PDO::PARAM_STR);    
			$stmt->bindParam(':evtel', $evtel, PDO::PARAM_STR); 
			$stmt->bindParam(':ceptel', $ceptel, PDO::PARAM_STR); 	
			$stmt->bindParam(':medenihal', $medenihal, PDO::PARAM_STR); 
			$stmt->bindParam(':iban', $iban, PDO::PARAM_STR);  
			$stmt->bindParam(':maas', $maas, PDO::PARAM_STR);    
			$stmt->bindParam(':isbastar', $isbastar, PDO::PARAM_STR); 
			$stmt->bindParam(':csayisi', $csayisi, PDO::PARAM_INT); 	
			$stmt->bindParam(':konum', $konum, PDO::PARAM_STR); 		

			$stmt->bindParam(':per_id', $id, PDO::PARAM_INT);   
			$stmt->execute(); 
			echo 1;
		}

}


////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  SERVİSCİ GÜNCELLE  
if( isset($_POST['servistur']) && isset($_POST['guncelservisci']) ){
	
		$servistur = trim(@$_POST['servistur']);
		$guncelservisci = trim(@$_POST['guncelservisci']);
		$arac = trim(@$_POST['arac']);
		
		$sql = "UPDATE arabayaatilan SET 
			servisci_id = :guncelservisci
			
			WHERE servis_id= :servistur and arac_id= :arac ";
		$stmt = $db->prepare($sql);  
		$stmt->bindParam(':guncelservisci', $guncelservisci, PDO::PARAM_INT);
		
		$stmt->bindParam(':servistur', $servistur, PDO::PARAM_INT);
		$stmt->bindParam(':arac', $arac, PDO::PARAM_INT);		
		$stmt->execute(); 
		echo 1;
}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////// ARABAYA ATILAN ÜRÜN ADETİ

if( isset($_POST['gid']) && isset($_POST['gadet']) ){
	$id=trim(@$_POST['gid']);
	$adet=trim(@$_POST['gadet']);
	$sql = "UPDATE arabayaatilan SET 
			adet = :adet
			
			WHERE id= :id";
		$stmt = $db->prepare($sql);  
		$stmt->bindParam(':adet', $adet, PDO::PARAM_INT);
		
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
		$stmt->execute(); 
		echo 1;

}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////// MÜŞTERİYE VERİLEN ÜRÜN ADETİ

if( isset($_POST['gidd']) && isset($_POST['gadett']) && isset($_POST['bsid']) ){
	$id=trim(@$_POST['gidd']);
	$adet=trim(@$_POST['gadett']);
	$bsid=trim(@$_POST['bsid']);
	$urun=trim(@$_POST['urunid']);
	
	date_default_timezone_set('Europe/Istanbul');
			$tarih =  date('d.m.Y');
			$saat =  date('H:i');
			
				$yser = $db->prepare("SELECT * FROM yapilanservisler where bs_id=$bsid");
				$yser->execute();
				$ys = $yser->fetch(PDO::FETCH_ASSOC);
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
				
				$sas = $db->prepare("SELECT adet,urun_id FROM satisdetaylari where bs_id=$bsid and urun_id=$urun"); 
				$sas->execute();
				$ssayis=$sas->fetch(PDO::FETCH_ASSOC);
				$ssayisiurun=$ssayis['adet'];
				
				$kalan=$asayisi-($ssayisi-$ssayisiurun);
				
				if($adet<=$kalan){
					$sql = "UPDATE satisdetaylari SET 
					adet = :adet
					
					WHERE sd_id= :id";
					$stmt = $db->prepare($sql);  
					$stmt->bindParam(':adet', $adet, PDO::PARAM_INT);
					
					$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
					$stmt->execute(); 
					echo 1;
					
				}else{
					echo 2;	
				}
	
	

}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////// MÜŞTERİDEN ALINAN PARA

if( isset($_POST['bsidd']) && isset($_POST['musteriid']) && isset($_POST['aparaa']) ){
	$bs_id=trim(@$_POST['bsidd']);
	$musteri_id=trim(@$_POST['musteriid']);
	$para=trim(@$_POST['aparaa']);
	date_default_timezone_set('Europe/Istanbul');
	$saat =  date('H:i');
	
	$sql = "UPDATE satishesaptakip SET 
			alinan = :alinan,
			saat = :saat
			
			WHERE bs_id= :bs_id and musteri_id=:musteri_id";
		$stmt = $db->prepare($sql);  
		$stmt->bindParam(':alinan', $para, PDO::PARAM_INT);
		$stmt->bindParam(':saat', $saat, PDO::PARAM_STR);
		
		$stmt->bindParam(':bs_id', $bs_id, PDO::PARAM_INT);
		$stmt->bindParam(':musteri_id', $musteri_id, PDO::PARAM_INT);		
		$stmt->execute(); 
		echo 1;

}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////// GÜZERGAH GÜNCELLE

if( isset($_POST['guzergahGuncelId']) ){
	$id=trim(@$_POST['guzergahGuncelId']);
	$adi=trim(@$_POST['gadi']);
	$tanim=trim(@$_POST['gtanim']);
	
	$stmt = $db->prepare("SELECT * FROM guzergahlar where guzergah_id=$id");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if($adi==$row['guzergah_adi'] && $tanim==$row['tanim'] ){
		echo 1;
	}else if($adi!=$row['guzergah_adi']){
		
		$guzergah_sorgu = $db->prepare("SELECT * FROM guzergahlar where guzergah_adi=?");
		$guzergah_sorgu->execute(array($adi));
	
		if($guzergah_sorgu->rowCount()){
			echo 2;
		}else{
			
			$sql = "UPDATE guzergahlar SET 
					guzergah_adi = :adi,
					tanim = :tanim
					
					WHERE guzergah_id= :id";
				$stmt = $db->prepare($sql);  
				$stmt->bindParam(':adi', $adi, PDO::PARAM_STR);
				$stmt->bindParam(':tanim', $tanim, PDO::PARAM_STR);
				
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
				$stmt->execute(); 
				echo 3;
		}
		
	}
	

}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////// POZİZYON GÜNCELLE

if( isset($_POST['pozisyonGuncelId']) ){
	$id=trim(@$_POST['pozisyonGuncelId']);
	$konum=trim(@$_POST['akonum']);
	$tanim=trim(@$_POST['atanim']);
	
	$stmt = $db->prepare("SELECT * FROM roller where rol_id=$id");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
	if($konum==$row['konum'] && $tanim==$row['tanim'] ){
		echo 1;
	}else if($konum!=$row['konum']){
		
		$konum_sorgu = $db->prepare("SELECT * FROM roller where konum=?");
		$konum_sorgu->execute(array($konum));
	
		if($konum_sorgu->rowCount()){
			echo 2;
		}else{
			
			$sql = "UPDATE roller SET 
					konum = :konum,
					tanim = :tanim
					
					WHERE rol_id= :id";
				$stmt = $db->prepare($sql);  
				$stmt->bindParam(':konum', $konum, PDO::PARAM_STR);
				$stmt->bindParam(':tanim', $tanim, PDO::PARAM_STR);
				
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
				$stmt->execute(); 
				echo 3;
		}
		
	}
	

}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////// SERVİS TÜRÜ GÜNCELLE

if( isset($_POST['stGuncelId']) ){
	$id=trim(@$_POST['stGuncelId']);
	$tur=trim(@$_POST['stur']);
	$tanim=trim(@$_POST['sttanim']);
	
	$stmt = $db->prepare("SELECT * FROM serviscesit where servis_id=$id");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
	if($tur==$row['servis_adi'] && $tanim==$row['tanim'] ){
		echo 1;
	}else if($tur!=$row['servis_adi']){
		
		$konum_sorgu = $db->prepare("SELECT * FROM serviscesit where servis_adi=?");
		$konum_sorgu->execute(array($tur));
	
		if($konum_sorgu->rowCount()){
			echo 2;
		}else{
			
			$sql = "UPDATE serviscesit SET 
					servis_adi = :servis_adi,
					tanim = :tanim
					
					WHERE servis_id= :id";
				$stmt = $db->prepare($sql);  
				$stmt->bindParam(':servis_adi', $tur, PDO::PARAM_STR);
				$stmt->bindParam(':tanim', $tanim, PDO::PARAM_STR);
				
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
				$stmt->execute(); 
				echo 3;
		}
		
	}
	

}


///////////////////// ///////////////////////////////////////////////////////////////////////////////////// YENİ PAROLA

if( isset($_POST['yeniparolaid'])){
 $id=trim(@$_POST['yeniparolaid']);
 $sifre=trim(@$_POST['msifre']);
 $hashedpassword = $user->password_hash($sifre, PASSWORD_BCRYPT);
 
	
		$sql = "UPDATE members SET 
			password = :sifre
			
			WHERE memberID= :id";
		$stmt = $db->prepare($sql);  
		$stmt->bindParam(':sifre', $hashedpassword, PDO::PARAM_STR);
		
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
		$stmt->execute(); 
		
		echo 1;
}
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  KULLANICI BİLGİLERİ    
if( isset($_POST['k_id']) && isset($_POST['memail']) ){
	$id=trim(@$_POST['k_id']);
	$kadi=trim(@$_POST['musername']);
	$email=trim(@$_POST['memail']);
	

	
	$bilgicek = $db->prepare("SELECT * FROM members where memberID=?");
	$bilgicek->execute(array($id));
	$bilgi = $bilgicek->fetch(PDO::FETCH_ASSOC);
	
	$emailimiz = $bilgi['email'];
	$kadimiz   = $bilgi['username'];
	$rolumuz   = $bilgi['rol'];

	if($kadi==$kadimiz && $email==$emailimiz && $rolumuz == $rol){
		echo 1;
	}else if($kadi!=$kadimiz){
					
						$kadi_sorgu = $db->prepare("SELECT * FROM members where username=?");
						$kadi_sorgu->execute(array($kadi));
		
						if($kadi_sorgu->rowCount()){
							echo 2;
							
						}else if($email!=$emailimiz){
							
							$mail_sorgu = $db->prepare("SELECT * FROM members where email=?");
							$mail_sorgu->execute(array($email));
				
							if($mail_sorgu->rowCount()){
								echo 3;
								
							}else{
								$sql = "UPDATE members SET 
								username = :kadi,
								email = :email
								
								
								WHERE memberID= :id";
								
								$stmt = $db->prepare($sql);  
								$stmt->bindParam(':kadi', $kadi, PDO::PARAM_STR);
								$stmt->bindParam(':email', $email, PDO::PARAM_STR);
								
								$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
								$stmt->execute(); 
								echo 4;	
							}
						
						}else{
							$sql = "UPDATE members SET 
							username = :kadi,
							email = :email
							
							
							WHERE memberID= :id";
							
							$stmt = $db->prepare($sql);  
							$stmt->bindParam(':kadi', $kadi, PDO::PARAM_STR);
							$stmt->bindParam(':email', $email, PDO::PARAM_STR);
							
							$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
							$stmt->execute(); 
							echo 4;
						}
		
		
						
					
	}else if($email!=$emailimiz){
			
			$mail_sorgu = $db->prepare("SELECT * FROM members where email=?");
			$mail_sorgu->execute(array($email));

			if($mail_sorgu->rowCount()){
				echo 3;
				
			}else{
				$sql = "UPDATE members SET 
				username = :kadi,
				email = :email
				
				
				WHERE memberID= :id";
				
				$stmt = $db->prepare($sql);  
				$stmt->bindParam(':kadi', $kadi, PDO::PARAM_STR);
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);

				$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
				$stmt->execute(); 
				echo 4;	
			}
		
	}else{
		$sql = "UPDATE members SET 
				username = :kadi,
				email = :email
				
				
				WHERE memberID= :id";
				
				$stmt = $db->prepare($sql);  
				$stmt->bindParam(':kadi', $kadi, PDO::PARAM_STR);
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
				$stmt->execute(); 
				echo 4;
	}
			

}	
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  ÜRÜN GÜNCELLE    

if(isset($_POST['urunadi'])){
			$id = trim(@$_POST['urunid']);
			$marka = trim(@$_POST['marka']);
			$urunadi = trim(@$_POST['urunadi']);
			$maaliyet = trim(@$_POST['maaliyet']);
			$satisfiyati = trim(@$_POST['satisfiyati']);
			$barkodno = trim(@$_POST['barkodno']);
			$birimi = trim(@$_POST['birimi']);
			
			$stmt = $db->prepare("SELECT * FROM urunler where urun_id=$id");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					if($marka==$row['marka']
					&& $urunadi==$row['urun_adi']
					&& $maaliyet==$row['maliyet']
					&& $satisfiyati==$row['satis_fiyati']
					&& $barkodno==$row['barkod_no']
					&& $birimi==$row['birimi']
						){
						echo 1;
						
					}else if(strlen($barkodno)!=13){
						echo 2;
					}else if($urunadi!=$row['urun_adi']){
					
						$urun_sorgu = $db->prepare("SELECT * FROM urunler where urun_adi=?");
						$urun_sorgu->execute(array($urunadi));
		
						if($urun_sorgu->rowCount()){
							echo 3;
							
						}else if($barkodno!=$row['barkod_no']){
							
							$barkod_sorgu = $db->prepare("SELECT * FROM urunler where barkod_no=?");
							$barkod_sorgu->execute(array($barkodno));
				
							if($barkod_sorgu->rowCount()){
								echo 4;
							}else{
								$sql = "UPDATE urunler SET 
										marka = :marka,
										urun_adi = :urunadi,
										maliyet = :maaliyet,
										satis_fiyati = :satisfiyati,
										barkod_no = :barkodno,
										birimi = :birimi

										WHERE urun_id = :id";
										
										$stmt = $db->prepare($sql);  
										$stmt->bindParam(':marka', $marka, PDO::PARAM_STR);
										$stmt->bindParam(':urunadi', $urunadi, PDO::PARAM_STR);
										$stmt->bindParam(':maaliyet', $maaliyet, PDO::PARAM_STR);
										$stmt->bindParam(':satisfiyati', $satisfiyati, PDO::PARAM_STR);
										$stmt->bindParam(':barkodno', $barkodno, PDO::PARAM_STR);
										$stmt->bindParam(':birimi', $birimi, PDO::PARAM_STR);
										
										$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
										$stmt->execute(); 
								echo 5;	
							}
						
						}else{
							$sql = "UPDATE urunler SET 
										marka = :marka,
										urun_adi = :urunadi,
										maliyet = :maaliyet,
										satis_fiyati = :satisfiyati,
										barkod_no = :barkodno,
										birimi = :birimi

										WHERE urun_id = :id";
										
										$stmt = $db->prepare($sql);  
										$stmt->bindParam(':marka', $marka, PDO::PARAM_STR);
										$stmt->bindParam(':urunadi', $urunadi, PDO::PARAM_STR);
										$stmt->bindParam(':maaliyet', $maaliyet, PDO::PARAM_STR);
										$stmt->bindParam(':satisfiyati', $satisfiyati, PDO::PARAM_STR);
										$stmt->bindParam(':barkodno', $barkodno, PDO::PARAM_STR);
										$stmt->bindParam(':birimi', $birimi, PDO::PARAM_STR);
										
										$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
										$stmt->execute(); 
							echo 5;	
							}
					}else if($barkodno!=$row['barkod_no']){
							
							$barkod_sorgu = $db->prepare("SELECT * FROM urunler where barkod_no=?");
							$barkod_sorgu->execute(array($barkodno));

							if($barkod_sorgu->rowCount()){
								echo 4;
								
							}else{
								$sql = "UPDATE urunler SET 
										marka = :marka,
										urun_adi = :urunadi,
										maliyet = :maaliyet,
										satis_fiyati = :satisfiyati,
										barkod_no = :barkodno,
										birimi = :birimi

										WHERE urun_id = :id";
										
										$stmt = $db->prepare($sql);  
										$stmt->bindParam(':marka', $marka, PDO::PARAM_STR);
										$stmt->bindParam(':urunadi', $urunadi, PDO::PARAM_STR);
										$stmt->bindParam(':maaliyet', $maaliyet, PDO::PARAM_STR);
										$stmt->bindParam(':satisfiyati', $satisfiyati, PDO::PARAM_STR);
										$stmt->bindParam(':barkodno', $barkodno, PDO::PARAM_STR);
										$stmt->bindParam(':birimi', $birimi, PDO::PARAM_STR);
										
										$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
										$stmt->execute(); 
								echo 5;	
								}
					}else{
						$sql = "UPDATE urunler SET 
										marka = :marka,
										urun_adi = :urunadi,
										maliyet = :maaliyet,
										satis_fiyati = :satisfiyati,
										barkod_no = :barkodno,
										birimi = :birimi

										WHERE urun_id = :id";
										
										$stmt = $db->prepare($sql);  
										$stmt->bindParam(':marka', $marka, PDO::PARAM_STR);
										$stmt->bindParam(':urunadi', $urunadi, PDO::PARAM_STR);
										$stmt->bindParam(':maaliyet', $maaliyet, PDO::PARAM_STR);
										$stmt->bindParam(':satisfiyati', $satisfiyati, PDO::PARAM_STR);
										$stmt->bindParam(':barkodno', $barkodno, PDO::PARAM_STR);
										$stmt->bindParam(':birimi', $birimi, PDO::PARAM_STR);
										
										$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
										$stmt->execute(); 
						echo 5;	
					}	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    ARAÇ GÜNCELLE

if(isset($_POST['plaka'])){
			$id = trim(@$_POST['arac_id']);
			$marka = trim(@$_POST['marka']);
			$model = trim(@$_POST['model']);
			$yil = trim(@$_POST['uretimyili']);
			$plaka = trim(@$_POST['plaka']);
			$ytipi = trim(@$_POST['ytipi']);
			$atipi = trim(@$_POST['atipi']);

			$stmt = $db->prepare("SELECT * FROM araclar where arac_id=$id");
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if(		$marka==$row['marka']
					&& $model==$row['model']
					&& $yil==$row['yil']
					&& $plaka==$row['plaka']
					&& $ytipi==$row['ytipi']
					&& $atipi==$row['atipi']
			){
				echo 1;
			}else if($plaka!=$row['plaka']){
					$plaka_sorgu = $db->prepare("SELECT * FROM araclar where plaka=?");
					$plaka_sorgu->execute(array($plaka));
				
					if($plaka_sorgu->rowCount()){
						echo 2;
					}else{

						$sql = "UPDATE araclar SET 
										marka = :marka,
										model = :model,
										yil = :yil,
										plaka = :plaka,
										ytipi = :ytipi,
										atipi = :atipi

										WHERE arac_id = :id";
										
										$stmt = $db->prepare($sql);  
										$stmt->bindParam(':marka', $marka, PDO::PARAM_STR);
										$stmt->bindParam(':model', $model, PDO::PARAM_STR);
										$stmt->bindParam(':yil', $yil, PDO::PARAM_STR);
										$stmt->bindParam(':plaka', $plaka, PDO::PARAM_STR);
										$stmt->bindParam(':ytipi', $ytipi, PDO::PARAM_STR);
										$stmt->bindParam(':atipi', $atipi, PDO::PARAM_STR);
										
										$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
										$stmt->execute(); 
						echo 3;

					} 
			}

			
					
					
	
}

////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  SERVİS BİTİR

if(isset($_POST['ServisBitirid'])){
   $id = trim(@$_POST['ServisBitirid']);
   date_default_timezone_set('Europe/Istanbul');
   $saat =  date('H:i');
   $durum = 1;
   
   $sql = "UPDATE yapilanservisler SET 
			bitis_saati = :saat,
			durum = :durum
			WHERE bs_id = :id";
			
			$stmt = $db->prepare($sql);  
			$stmt->bindParam(':saat', $saat, PDO::PARAM_STR);
			$stmt->bindParam(':durum', $durum, PDO::PARAM_INT);
			
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);		
			$stmt->execute(); 
   echo 1;
}
 


    
?>