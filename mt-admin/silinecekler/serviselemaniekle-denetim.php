<?php
require('../includes/config.php'); 

$adi = trim(@$_POST['adi']);
$soyadi = trim(@$_POST['soyadi']);
$adres = trim(@$_POST['adres']);
$evtel = trim(@$_POST['evtel']);
$ceptel = trim(@$_POST['ceptel']);
$email = trim(@$_POST['email']);
$medenihal = trim(@$_POST['medenihal']);
$iban = trim(@$_POST['iban']);
$maas = trim(@$_POST['maas']);
$isbastar = trim(@$_POST['isbastar']);
$csayisi = trim(@$_POST['csayisi']);
$username = trim(@$_POST['username']);
$sifre  = trim(@$_POST['password']);
$sifretekrar  = trim(@$_POST['passwordConfirm']);
$rol=2;//servis elemanı

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
				
				$musteribilgi = $db->prepare('INSERT INTO personel (userID,adi,soyadi,adres,evtel,ceptel,iban,maas,medenihal,csayisi,isbastar) 
				                                    VALUES (:userID, :adi, :soyadi, :adres, :evtel, :ceptel,:iban, :maas, :medenihal, :csayisi, :isbastar)');
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
				':isbastar' => $isbastar
				
											));

			}

		} 

?>
