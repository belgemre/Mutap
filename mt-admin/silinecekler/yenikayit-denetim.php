<?php
require('../includes/config.php'); 

$username = trim(@$_POST['username']);
$email = trim(@$_POST['email']);
$sifre = trim(@$_POST['password']);
$sifretekrar = trim(@$_POST['passwordConfirm']);
$rol = trim(@$_POST['roller']);

$firma_sorgu = $db->prepare("SELECT * FROM members where username=?");
$firma_sorgu->execute(array($username));
$email_sorgu = $db->prepare("SELECT * FROM members where email=?");
$email_sorgu->execute(array($email));
		
		if($firma_sorgu->rowCount()){
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
			echo $lastId;


		//else catch the exception and show the error.
		} 



?>