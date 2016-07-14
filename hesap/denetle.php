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
	$sorgu = $vt->prepare("select * from musteriler where m_k_adi=? and m_sifre=?");
	$sorgu->execute(array($k_adi,$sifre));
	$islem = $sorgu->fetch();
	
	if($islem){
		session_start();
		$_SESSION["login"] = "true";
		$_SESSION['k_adi'] = $islem['m_k_adi'];
		$_SESSION['adsoyad'] = $islem['sahibi'];
		$_SESSION['id'] = $islem['m_id'];
		echo yonlendir(0,"hesabim.php");
	}else{
		
		echo "<script> alert('Kullanýcý Adý ve ya Þifre Hatalý'); </script>";
		echo yonlendir(0,"index.php");
	}
	
}
ob_end_flush();
?>