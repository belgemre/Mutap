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
	$sorgu = $vt->prepare("select * from servisciler where k_adi=? and sifre=?");
	$sorgu->execute(array($k_adi,$sifre));
	$islem = $sorgu->fetch();
	
	if($islem){
		session_start();
		$_SESSION["loginservis"] = "true";
		$_SESSION['k_adi'] = $islem['k_adi'];
		$_SESSION['adsoyad'] = $islem['adsoyad'];
		$_SESSION['id'] = $islem['s_id'];
		$_SESSION['durum'] = $islem['durum'];
		$durum = $islem['durum'];
				if($durum == 1){
					
					echo yonlendir(0,"servis1.php");
					
				}else if($durum == 2){
					
					echo yonlendir(0,"servis2.php");
				}else{
					
							echo "<script> alert('Böyle bir servis elemaný yok ya da durumsuz!'); </script>";
							echo yonlendir(0,"index.php");
					
				}
		
	}else{
		
		echo "<script> alert('Kullanýcý Adý ve ya Þifre Hatalý'); </script>";
		echo yonlendir(0,"index.php");
	}
	
}
ob_end_flush();
?>