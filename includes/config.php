<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/Istanbul');

//database credentials
define('DBHOST','localhost');
define('DBUSER','belgemre');
define('DBPASS','');
define('DBNAME','mutap');
define('CHARSET','utf8');

//application address
define('DIR','http://domain.com/');
define('SITEEMAIL','noreply@domain.com');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=".CHARSET, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
//include('classes/phpmailer/mail.php');
$user = new User($db);
?>
