<?php
require('../includes/config.php'); 

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




?>