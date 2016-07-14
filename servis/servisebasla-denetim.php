<?php
$id = trim(@$_POST['id']);
$kayran = trim(@$_POST['kayran']);
$bayran = trim(@$_POST['bayran']);
$doruk  = trim(@$_POST['doruk']);
$kasar  = trim(@$_POST['kasar']);
$tulum  = trim(@$_POST['tulum']);
$tereyag = trim(@$_POST['tereyag']);
$nakit = trim(@$_POST['nakit']);
date_default_timezone_set('Europe/Istanbul');
$tarih =  date('d.m.Y');
$saat =  date('H:i');


include 'baglan.php';

		
		if(!empty($kayran) && 
		   !empty($bayran) && 
		   !empty($doruk) && 
		   !empty($kasar) && 
		   !empty($tulum) && 
		   !empty($tereyag) 
		   ){
				$sql = "INSERT INTO satisdetay(m_id,tarih,saat,sd_ayran,sd_bayran,sd_doruk,sd_kasar,sd_tulum,sd_tereyag,nakit) 
				VALUES (
					:id,
					:tarih,
					:saat,
					:kayran,
					:bayran,
					:doruk,
					:kasar,
					:tulum,
					:tereyag,
					:nakit
					
					)";               
					$stmt = $vt->prepare($sql);   
					$stmt->bindParam(':id', $id);  
					$stmt->bindParam(':tarih', $tarih);  
					$stmt->bindParam(':saat', $saat);  
					$stmt->bindParam(':kayran', $kayran);   
					$stmt->bindParam(':bayran', $bayran); 
					$stmt->bindParam(':doruk', $doruk);   
					$stmt->bindParam(':kasar', $kasar);   
					$stmt->bindParam(':tulum', $tulum); 
					$stmt->bindParam(':tereyag', $tereyag); 
					$stmt->bindParam(':nakit', $nakit); 


												   
					$stmt->execute(); 
					if($stmt){
							echo $kayran;
								
							}else {echo 1;}


		}else { echo 2;}


?>
