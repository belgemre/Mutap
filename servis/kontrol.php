<?php
$adsoyad = trim(@$_POST['adsoyad']);
$k_adi = trim(@$_POST['k_adi']);
$eposta = trim(@$_POST['eposta']);
$cep = trim(@$_POST['cep']);
$sifre  = trim(@$_POST['sifre']);
$sifre1  = trim(@$_POST['sifre1']);
include 'baglan.php';

$k_adi_sorgu = $vt->prepare("SELECT * FROM uyeler where k_adi=?");
$k_adi_sorgu->execute(array($k_adi));

if($k_adi_sorgu->rowCount()){
	echo 1;
}else{
	$eposta_sorgu = $vt->prepare("SELECT * FROM uyeler where eposta=?");
    $eposta_sorgu->execute(array($eposta));
	
	if($eposta_sorgu->rowCount()){
	
	echo 2;
    
	}else{
		if($sifre != "" and $sifre1 != "" and $sifre == $sifre1){
				
				$query = $vt->prepare("INSERT INTO uyeler SET
			adsoyad = :adsoyad,
			k_adi = :k_adi,
			eposta = :eposta,
			cep = :cep,
			sifre = :sifre
			");
			$insert = $query->execute(array(
				  "adsoyad" => $adsoyad,
				  "k_adi" => $k_adi,
				  "eposta" => $eposta,
				   "cep" => $cep,
					"sifre" => $sifre
			));
			if ( $insert ){
				echo  $adsoyad;
			}	
			}else { echo 3;
					}
    
	}


	
}





			
?>