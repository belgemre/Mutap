<?php
require('../includes/config.php'); 
//if form has been submitted process it

	//very basic validation
	if(strlen($_POST['username']) < 3){
		echo = 1; //Kullanıcı Adı Kısa
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			echo =2; //Kullanıcı Adı kullanılıyor.
		}

	}


?>