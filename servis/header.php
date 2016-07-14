<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="tr-TR">
<head profile="http://gmpg.org/xfn/11">
<meta name="distribution" content="global" />
<meta name="language" content="tr" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="tr" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>SERVİS - MUTAP | Belgem Süt Ürünleri</title>

 <!-- CSS -->
<link rel="stylesheet" href="../css/default.css" type="text/css" media="all" />
<link rel="stylesheet" href="../css/bootstrap-theme.css"/>
<link rel="stylesheet" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/font-awesome.min.css" /><!-- İcon CSS -->
<link href="../css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet"><!-- Table CSS -->
	
 <!-- burada kalsın -->
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/nagging-menu.js" ></script>
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
        <li ><a href="/mutap/servis/index.php" ><span class="glyphicon glyphicon-home"></span> Anasayfa <span class="sr-only">(current)</span></a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-info-sign"></span> Nedir?</a></li>
        <li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-truck"></i> Servis<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="arabayaatilan.php" ><b>Servise Başla</b></a></li>           
          </ul>
        </li>
		<li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-line-chart"></i> Raporlar<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="arabaya_atilan_liste_gunluk.php" ><b><i class="fa fa-truck"></i> Arabaya Atılan (GÜNLÜK)</b></a></li>
			<li><a href="arabaya_atilan_liste_saatlik.php" ><b><i class="fa fa-truck"></i> Arabaya Atılan (SAATLİK)</b></a></li>
			<li><a href="servis_cizelgesi.php" ><b><i class="fa fa-sticky-note"></i> Servis Çizelgesi</b></a></li>
			<li><a href="satis_raporu_gunluk.php" ><b><i class="fa fa-bar-chart"></i> Satış Raporu (GÜNLÜK)</b></a></li>
			<li><a href="servis_sonu_raporu.php" ><b><i class="fa fa-pie-chart"></i> Servis Sonu Raporu</b></a></li>
          </ul>
        </li>
      </ul>
      
	  
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" data-step="8" data-intro="Üyeliğe dayalı tüm işlemlerinizi buradan yapabilirsiniz." class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 


			
		  <span class="caret"></span></a>
          <ul class="dropdown-menu">


<!-- Form Bitiş-->
           
            <li></li>
            
            <li><a href="cikis.php" class="m5left"><span class="glyphicon glyphicon-log-out"></span> Çıkış Yap</a></li>
			<li><a href="profil.php?kullanici=" class="m5left"><span class="glyphicon glyphicon-user"></span> Bilgilerim</a></li>
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

