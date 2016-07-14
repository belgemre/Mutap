<?php
$kayran = trim(@$_POST['kayran']);
$bayran = trim(@$_POST['bayran']);
$doruk  = trim(@$_POST['doruk']);
$kasar  = trim(@$_POST['kasar']);
$tulum  = trim(@$_POST['tulum']);
$tereyag = trim(@$_POST['tereyag']);
date_default_timezone_set('Europe/Istanbul');
$tarih =  date('d.m.Y');
$saat =  date('H:i');
$araba = trim(@$_POST['araba']);
include 'baglan.php';

		
		if(!empty($kayran) && 
		   !empty($bayran) && 
		   !empty($doruk) && 
		   !empty($kasar) && 
		   !empty($tulum) && 
		   !empty($tereyag) 
		   ){
				$sql = "INSERT INTO arabayaatilan(tarih,saat,kayran,bayran,doruk,kasar,tulum,tereyag,araba) 
				VALUES (
					:tarih,
					:saat,
					:kayran,
					:bayran,
					:doruk,
					:kasar,
					:tulum,
					:tereyag,
					:araba
					
					)";               
					$stmt = $vt->prepare($sql);  
					$stmt->bindParam(':tarih', $tarih);
					$stmt->bindParam(':saat', $saat);					
					$stmt->bindParam(':kayran', $kayran);   
					$stmt->bindParam(':bayran', $bayran); 
					$stmt->bindParam(':doruk', $doruk);   
					$stmt->bindParam(':kasar', $kasar);   
					$stmt->bindParam(':tulum', $tulum); 
					$stmt->bindParam(':tereyag', $tereyag);
					$stmt->bindParam(':araba', $araba);					


												   
					$stmt->execute(); 
					if($stmt){
							echo $kayran;
								
							}else {echo 1;}


		}else { echo 2;}


?>
