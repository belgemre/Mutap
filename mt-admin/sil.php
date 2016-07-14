<?php
require('../includes/config.php'); 

////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Arabaya Atılan Ürün Sil    

if(isset($_POST['id']) ){
	$id = trim(@$_POST['id']);
	
	$sil = $db->prepare("DELETE FROM arabayaatilan where id = $id");
	$sil->execute();
	
	echo 1;
}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Servis Personeli Sil  

if(isset($_POST['perSilId']) ){
	$id = trim(@$_POST['perSilId']);
	
	$sil = $db->prepare("DELETE FROM personel where userID = $id");
	$sil->execute();
	$sil2 = $db->prepare("DELETE FROM members where memberID = $id");
	$sil2->execute();
	echo 1;
}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Kullanıcı Sil  

if(isset($_POST['memberSilId']) ){
	$id = trim(@$_POST['memberSilId']);
	
	$rol_sorgu = $db->prepare("SELECT rol FROM members where memberID = $id");
	$rol_sorgu->execute();
	$roller = $rol_sorgu->fetch(PDO::FETCH_ASSOC);
	$rol=$roller['rol'];
	
	if($rol==1){
		
		$sil = $db->prepare("DELETE FROM members where memberID = $id");
		$sil->execute();
		echo 1;
		exit;
		
	}else if($rol==3){
		
		$sil = $db->prepare("DELETE FROM members where memberID = $id");
		$sil->execute();
		
		$sil2 = $db->prepare("DELETE FROM musteriler where userID = $id");
		$sil2->execute();
		echo 1;
		exit;
		
	}else{
		$sil = $db->prepare("DELETE FROM members where memberID = $id");
		$sil->execute();
		
		$sil2 = $db->prepare("DELETE FROM personel where userID = $id");
		$sil2->execute();
		echo 1;
		exit;
	}

}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Ürün Sil  

if(isset($_POST['urunSilId']) ){
	$id = trim(@$_POST['urunSilId']);
	
	$sil = $db->prepare("DELETE FROM urunler where urun_id = $id");
	$sil->execute();
	echo 1;
}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Araç Sil  

if(isset($_POST['aracSilId']) ){
	$id = trim(@$_POST['aracSilId']);
	
	$sil = $db->prepare("DELETE FROM araclar where arac_id = $id");
	$sil->execute();
	echo 1;
}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Müşteri Sil  

if(isset($_POST['musteriSilId']) ){
	$id = trim(@$_POST['musteriSilId']);
	
	$sil = $db->prepare("DELETE FROM musteriler where userID = $id");
	$sil->execute();
	$sil2 = $db->prepare("DELETE FROM members where memberID = $id");
	$sil2->execute();
	echo 1;
}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Güzergah Sil  

if(isset($_POST['guzergahSilId']) ){
	$id = trim(@$_POST['guzergahSilId']);
	
	$sil = $db->prepare("DELETE FROM guzergahlar where guzergah_id = $id");
	$sil->execute();
	echo 1;
}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Servis Tür Sil  

if(isset($_POST['servisturSilId']) ){
	$id = trim(@$_POST['servisturSilId']);
	
	$sil = $db->prepare("DELETE FROM serviscesit where servis_id = $id");
	$sil->execute();
	echo 1;
}

////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Pozisyon Sil  

if(isset($_POST['pozisyonSilId']) ){
	$id = trim(@$_POST['pozisyonSilId']);
	
	$sil = $db->prepare("DELETE FROM roller where rol_id = $id");
	$sil->execute();
	echo 1;
}
////////////////////// /////////////////////////////////////////////////////////////////////////////////////// Verilen Ürün Sil  

if(isset($_POST['VerilenUrunSilId']) ){
	$id = trim(@$_POST['VerilenUrunSilId']);
	
	$sil = $db->prepare("DELETE FROM satisdetaylari where sd_id = $id");
	$sil->execute();
	echo 1;
}
?>