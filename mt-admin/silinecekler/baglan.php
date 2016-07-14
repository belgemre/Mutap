<?php 
$user = "belgemre";
$pass="";

try {
     $vt = new PDO("mysql:host=localhost;dbname=mutap;charset=utf8", $user, $pass);
} catch ( PDOException $e ){
     print $e->getMessage();
}
   


 ?>
        