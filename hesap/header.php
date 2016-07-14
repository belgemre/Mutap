<?php 
session_start();
	if(isset($_SESSION["login"])){
				
				$kullanici = $_SESSION['adsoyad'];
				$id = $_SESSION['id'];
				$k_adi = $_SESSION['k_adi'];				
			  }else{
				echo "<meta content='0; URL=index.php' http-equiv='refresh'>";
		}
?>
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

<title>Türkiye Eğitim Kurumları Rehberi</title>

<link rel="shortcut icon" href="http://meltemkoleji.com/wp-content/themes/meltem/img/icon.png"/>

 <!-- CSS -->
<link rel="stylesheet" href="../css/default.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/font-awesome.min.css" /><!-- İcon CSS -->

</head>

<body>
<header>

<nav class="navbar navbar-default br0" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="margin-left:40px;" class="navbar-brand" href="#" >BELGEM SÜT MAMÜLLERİ</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="/mutap/index.php" ><span class="glyphicon glyphicon-home"></span> Anasayfa <span class="sr-only">(current)</span></a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-info-sign"></span> Nedir?</a></li>
        <li class="dropdown">
          <a href="#"  data-step="4" data-intro="Kategorilere göre ve konumunuza göre detaylı aramayı burada yapabilirsiniz." class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-screenshot"></span> Keşfet<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><b>Kategoriler</b> <br /> <small> Kategorilere Göre Keşfet</small></a></li>
			<li role="separator" class="divider"></li>
            <li><a href="#"><b>Konum</b> </br> <small> Çevrendekileri Keşfet</small></a></li>
           
          </ul>
        </li>
      </ul>
      
	  
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" data-step="8" data-intro="Üyeliğe dayalı tüm işlemlerinizi buradan yapabilirsiniz." class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 

			<?php echo $kullanici; ?>
			
		  <span class="caret"></span></a>
          <ul class="dropdown-menu">


<!-- Form Bitiş-->
           
            <li></li>
            
            <li><a href="cikis.php" class="m5left"><span class="glyphicon glyphicon-log-out"></span> Çıkış Yap</a></li>
			<li><a href="profil.php?kullanici=<?php echo $k_adi; ?>" class="m5left"><span class="glyphicon glyphicon-user"></span> Bilgilerim</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header>

