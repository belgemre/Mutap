<?php
require('../includes/config.php'); 

$firmaadi = trim(@$_POST['firmaadi']);
$sahibi = trim(@$_POST['sahibi']);
$adres = trim(@$_POST['adres']);
$istel = trim(@$_POST['istel']);
$ceptel = trim(@$_POST['ceptel']);
$email = trim(@$_POST['email']);
$liste = trim(@$_POST['liste']);
$sira = trim(@$_POST['liste']);
$bakiye = trim(@$_POST['bakiye']);
$username = trim(@$_POST['username']);
$sifre  = trim(@$_POST['password']);
$sifretekrar  = trim(@$_POST['passwordConfirm']);
$rol=4;

$kullanici_sorgu = $db->prepare("SELECT * FROM members where username=?");
$kullanici_sorgu->execute(array($username));

$email_sorgu = $db->prepare("SELECT * FROM members where email=?");
$email_sorgu->execute(array($email));

$firmaadi_sorgu = $db->prepare("SELECT * FROM musteriler where firma_adi=?");
$firmaadi_sorgu->execute(array($firmaadi));

		
		if($kullanici_sorgu->rowCount()){
			echo 1;
		}else if($email_sorgu->rowCount()){
			echo 2;
		}else if($sifre != $sifretekrar){
			echo 3;
		}else if($firmaadi_sorgu->rowCount()){
			echo 4;
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
				
				$musteribilgi = $db->prepare('INSERT INTO musteriler (userID,firma_adi,sahibi,m_adres,is_tel,cep_tel,liste,bakiye,sira) 
				                                    VALUES (:userID, :firmaadi, :sahibi, :adres, :istel, :ceptel, :liste, :bakiye, :sira)');
				$musteribilgi->execute(array(
				':userID' => $lastId,
				':firmaadi' => $firmaadi,
				':sahibi' => $sahibi,
				':adres' => $adres,
				':istel' => $istel,
				':ceptel' => $ceptel,
				':liste' => $liste,
				':bakiye' => $bakiye,
				':sira' => $sira
				
											));

			}


		//else catch the exception and show the error.
		} 

?>
