<?php require('../includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../index.php'); } 

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
<title>BELGEM | Yönetici Paneli</title>


 <!-- CSS -->

<link rel="stylesheet" href="../css/default.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/font-awesome.min.css" /><!-- İcon CSS -->
<link href="../css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet"><!-- Table CSS -->
       
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

 
<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="../js/bootstrap-multiselect.js"></script>
 <!-- burada kalsın 
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/nagging-menu.js" ></script> -->
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
      <a class="navbar-brand" href="http://www.belgemsuturunleri.com" >BELGEM SÜT </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="./"><span class="glyphicon glyphicon-home"></span> Ekranım <span class="sr-only">(current)</span></a></li>
		<li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		  <i class="fa fa-users"></i> Personel <span class="caret"></span>
		  </a>
          <ul class="dropdown-menu">
            <li><a href="personellerim.php" title="Tüm personeller"> <i class="fa fa-sticky-note"></i> <b>Personellerim</b></a></li>
			<li role="separator" class="divider"></li>
            <li><a href="personel-ekle.php" ><span class="glyphicon glyphicon-plus"></span> <b>Personel Ekle</b></a></li>
			<li><a href="pozisyon-ekle.php" title="Depocu, Servisçi, Muhasebeci vs."><span class="glyphicon glyphicon-plus"></span> <b>Pozisyon Ekle</b></a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#"   class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		  <span class="glyphicon glyphicon-cutlery"></span> Ürün <span class="caret"></span>
		  </a>
          <ul class="dropdown-menu">
            <li><a href="urunler.php"><i class="fa fa-sticky-note"></i> <b>Ürünlerim</b></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="urun-ekle.php"><span class="glyphicon glyphicon-plus"></span> <b>Ürün Ekle</b></a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#"   class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		  <i class="fa fa-car"></i> Araç <span class="caret"></span>
		  </a>
          <ul class="dropdown-menu">
            <li><a href="araclarim.php"><i class="fa fa-sticky-note"></i> <b>Araçlarım</b></a></li>
			<li><a href="#"><i class="fa fa-sticky-note"></i> <b>Akaryakıt Al</b></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="arac-ekle.php"><span class="glyphicon glyphicon-plus"></span> <b>Araç Ekle</b></a></li>
			
          </ul>
        </li>
		<li class="dropdown">
          <a href="#"   class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		   <i class="fa fa-truck"></i> Servis <span class="caret"></span>
		  </a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-map-marker"></i> <b class="m5left">Servisçim Nerede?</b></a></li>
			<li><a href="arabayaatilan-ayar.php"><i class="fa fa-sign-in"></i> <b class="m5left">Servis Başlat</b></a></li>
			<li><a href="baslatilmis-servisler.php"><i class="fa fa-truck"></i> <b class="m5left">Servis Takip</b></a></li>
			<li><a href="hesaptopla.php"><i class="fa fa-try" aria-hidden="true"></i> <b class="m5left">Hesap Topla</b></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="servis-turu-ekle.php"><span class="glyphicon glyphicon-plus"></span> <b>Servis Türü Ekle</b></a></li>
			<li role="separator" class="divider"></li>
			<li  data-toggle="tooltip" data-placement="bottom" title="Güzergahtaki müşterilerin sıralarını değiştirebilirsiniz."><a href="guzergahlarim.php"><i class="fa fa-random"></i> <b>Güzergahlarım</b></a></li>
            <li><a href="guzergah-turu-ekle.php"><span class="glyphicon glyphicon-plus"></span> <b>Güzergah Ekle - Düzenle</b></a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		   <i class="fa fa-arrow-right"></i> Müşteri <span class="caret"></span>
		  </a>
          <ul class="dropdown-menu">
            <li><a href="musterilerim.php"><i class="fa fa-sticky-note"></i> <b>Müşterilerim</b></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="musteri-ekle.php"><span class="glyphicon glyphicon-plus"></span> <b>Müşteri Ekle</b></a></li>
			<li><a href="hizmet-ekle.php" title="Dolap, Tabela yaptırma vs."><span class="glyphicon glyphicon-plus"></span> <b>Hizmet Ekle</b></a></li>
			<li role="separator" class="divider"></li>
		    <li data-toggle="tooltip" data-placement="bottom" title="Bir müşteriye normal satış fiyatından farklı bir fiyat verebilirsiniz."><a href="ozel-fiyat.php"><i class="fa fa-try"></i> <b>Özel Fiyat</b></br> <small> Müşteriye Özel Fiyat Belirle</small></a></li>
           
          </ul>
        </li>
		<li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		   <i class="fa fa-arrow-left"></i> Firma <span class="caret"></span>
		  </a>
          <ul class="dropdown-menu">
            <li><a href="firma-ekle.php"><span class="glyphicon glyphicon-plus"></span> <b>Firma Ekle</b></a></li>
            <li><a href="firmalarim.php"><i class="fa fa-sticky-note"></i> <b>Firmalarım</b></a></li>
           
          </ul>
        </li>
		<li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-line-chart"></i> Raporlar<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li data-toggle="tooltip" data-placement="left" title="Günlük servis araçlarına yüklenen malın toplam miktarını gösterir!."><a href="arabaya_atilan_liste_gunluk.php" ><b><i class="fa fa-truck"></i> Çıkan Ürün (GENEL)</b></a></li>
			<li data-toggle="tooltip" data-placement="left" title="Günlük servis aracına yüklenen malı detaylı gösterir!."><a href="arabaya_atilan_liste_saatlik.php" ><b><i class="fa fa-truck"></i> Çıkan Ürün (ÖZEL)</b></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="servis_cizelgesi.php" ><b><i class="fa fa-sticky-note"></i> Servis Çizelgesi</b></a></li>
			<li><a href="satis_raporu_gunluk.php" ><b><i class="fa fa-bar-chart"></i> Satış Raporu (GÜNLÜK)</b></a></li>
			<li><a href="servis_sonu_raporu.php" ><b><i class="fa fa-pie-chart"></i> Servis Sonu Raporu</b></a></li>
          </ul>
        </li>
      </ul>
      
	  
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 

			<?php echo $_SESSION['username']; ?>
			
		  <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="profil.php?kullanici=<?php echo $_SESSION['username']; ?>"><span class="glyphicon glyphicon-user"></span> <b>Profilim</b></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="kullanicilar.php"><i class="fa fa-sticky-note"></i> <b>Kullanıcılar</b></a></li>
			<li><a href="yonetici-ekle.php"><span class="glyphicon glyphicon-plus"></span> <b>Yönetici Ekle</b></a></li>
			<li role="separator" class="divider"></li>
            <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> <b>Çıkış Yap</b></a></li>
			
		 </ul>
        </li>
      </ul>
	  
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header>

<script type="text/javascript">
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});

$(function(){
	
	var menu = $('#menutab'),
		pos = menu.offset();
		
		$(window).scroll(function(){
			if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('defaulttab')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('defaulttab').addClass('fixed').fadeIn('fast');
				});
			} else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('fixed').addClass('defaulttab').fadeIn('fast');
				});
			}
		});

});
</script>
