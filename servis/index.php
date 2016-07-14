<?php 
session_start();
	if(isset($_SESSION["loginservis"])){
				if($_SESSION["durum"]==1){
					
					echo "<meta content='0; URL=servis1.php' http-equiv='refresh'>";	
					
					
				}else if($_SESSION["durum"]==2){
					
				echo "<meta content='0; URL=servis2.php' http-equiv='refresh'>";	
				}
			 }else{ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="tr-TR">
<head profile="http://gmpg.org/xfn/11">
<meta name="distribution" content="global" />
<meta name="language" content="tr" />
<meta name="robots" content="index,follow" />	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="tr" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>SERVİS - MUTAP | Belgem Süt Ürünleri</title>
 <!-- CSS -->
 <link rel="stylesheet" href="css/servis.css" type="text/css" media="all" />
<link rel="stylesheet" href="../css/default.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/font-awesome.min.css" /><!-- İcon CSS -->




</head>
<body>

	<div class="container ana">
		<div class="uyepaneladmin text-center">
		<img  src="../images/logo.png" width="200" alt="Belgem Logo" title="Belgem Logo" />
	<form class="main" action="denetle.php" method="post" >

	  <div class="form-group">
				
				<div class="input-group m5bottom ">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="k_adi" class="form-control" id="exampleInputEmail1" placeholder="Kullanıcı Adı">
				</div>

				<div class="input-group m15top">
				  <span class="input-group-addon"><i class="fa fa-key"></i></span>
					<input type="password" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="Şifre">
				</div>
				
	  </div>
	  
	  				<label class="pull-left">
				  <input class="check" type="checkbox" name="hatirla"><span class="m5left labelhatirla">Beni hatırla.</span>
				</label>
	  <input type="submit" name="giris" value="Giriş Yap" class="btn btn-info pull-right">
	  <br />

	</form>
		<div class="col-md-12 m15top"> <a href="sifrehatirlat.php" ></span> Parolanızı mı Unuttunuz?</a></div>
				 <div class="col-md-12 m15top"> <a  href="http://www.belgemsuturunleri.com" ></span>belgemsuturunleri.com</a></div>
		</div>
	</div>
	<div style="clear:both"></div>

<footer>
		<div class="text-center">
						<span>©2015 belgemsuturunleri.com. Tüm Hakları Saklıdır. </span>
		</div>	
</footer>
	
</body>
</html>
	<?php	}
?>
        
		











