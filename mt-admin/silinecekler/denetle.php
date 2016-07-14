<?php
ob_start();
function yonlendir($sure,$sayfa){ 
  $deger = "<meta http-equiv=\"refresh\" content=\"$sure;url=$sayfa\">\n"; 
  return $deger; 
 } 

$k_adi = trim(@$_POST['k_adi']);
$sifre  = trim(@$_POST['sifre']);

if(!empty($k_adi) && !empty ($sifre)){
	include 'baglan.php';
	$sorgu = $vt->prepare("select * from uyeler where k_adi=? and sifre=?");
	$sorgu->execute(array($k_adi,$sifre));
	$islem = $sorgu->fetch();
	
	if($islem){
		session_start();
		$_SESSION["loginadmin"] = "true";
		$_SESSION['k_adi'] = $islem['k_adi'];
		$_SESSION['adsoyad'] = $islem['adsoyad'];
		$_SESSION['id'] = $islem['id'];
		echo yonlendir(0,"admin.php");
	}else{
		
		echo "<script> alert('Kullanýcý Adý ve ya Þifre Hatalý'); </script>";
		echo yonlendir(0,"index.php");
	}
	
}
ob_end_flush();
?>