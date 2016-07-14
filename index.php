<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ 


$rol = $_SESSION['rol'];
		if($rol == 1){
			
			header('Location: mt-admin/');
		}else if($rol == 2){
			header('Location: servis/index.php');
		}

} 

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
		$_SESSION['username'] = $username;
		$rol = $_SESSION['rol'];
		if($rol == 1){
			
			header('Location: mt-admin/');
		}else{
			header('Location: memberpage.php');
		}
		
		exit;
	
	} else {
		$error[] = 'Yanlış kullanıcı adı veya şifre veya hesabınız aktive edilmemiş.';
	}

}//end if submit

//define page title
$title = 'BELGEM | Giriş Yapınız.';

//include header template
require('layout/header.php'); 
?>

<div class="container ana">



		<div class="uyepaneladmin text-center">
		<img  src="images/logo.png" width="200" alt="Belgem Logo" title="Belgem Logo" />
		<form role="form" class="main" id="girisform" action="" method="post">
				<div class="form-group">
				
				<div class="input-group m5bottom ">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="username" id="username" class="form-control" placeholder="Kullanıcı Adı"  tabindex="1">
				</div>

				<div class="input-group m15top">
				  <span class="input-group-addon"><i class="fa fa-key"></i></span>
					<input type="password" name="password" id="password" class="form-control" placeholder="Şifre" tabindex="3">
				</div>
				
	  </div>

	  <div class="">  <button type="submit"  name="submit" class="btn btn-info btn-block " tabindex="5">Giriş Yap</button></div>
	  <div class="clr"></div>
		 <?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-primary m15top padding15">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Şimdi giriş yapabilirsiniz Hesabınız artık etkin.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Mail gönderildi, gelen kutunuzu kontrol edin .</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Şifreniz değiştirildi, şimdi giriş yapabilirsiniz.</h2>";
							break;
					}

				}

				
				?>
	</form>
		<div class="col-md-12 m15top"> <a href='reset.php' ></span> Parolanızı mı Unuttunuz?</a></div>
				 <div class="col-md-12 m15top"> <a  href="http://www.belgemsuturunleri.com" ></span>belgemsuturunleri.com</a></div>
				
		</div>
		
		
	</div>

<?php 
//include header template
require('layout/footer.php'); 
?>



























