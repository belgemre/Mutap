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
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

 <!-- CSS -->
<link rel="stylesheet" href="css/default.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- İcon CSS -->
<script type="text/javascript">
function sozlesmebuton()
{
if (document.forms[0].cb_rules_agree.checked)
{

document.forms[0].kaydet.disabled = false;
}
else
{
document.forms[0].kaydet.disabled = true;
}
}
</script>
<script>
$(document).ready(function(){
	
    $('#kayit').submit(function(){
        $.ajax({
					type:'POST',
					url:'kontrol.php',
					data:$('#kayit').serialize(),
					success:function(data){
		if(data == 3){
			alert("Şifreler Aynı değil!");
			document.getElementById("sifre").classList.add('hata');
			document.getElementById("sifre1").classList.add('hata');
		}else if(data == 1){
			alert("Kullanıcı adı zaten kullanılıyor.");
			document.getElementById("kadi").classList.add('hata');
			
		}else if(data == 2){
			alert("Bu e-posta zaten kayıtlı.");
			document.getElementById("eposta").classList.add('hata');
		}else{
		alert("Sayın "+ data +" Kaydınız Yapılmıştır. Giriş yaparak devam edebilirsiniz.");
		location.href = 'mt-admin';
		}
		},
					error:function(){alert("Başarısız");}
        });
return false;
    })  
});
</script>
<script>
function temizlekadi (){
	document.getElementById("kadi").classList.remove('hata');
}
function temizleeposta (){
	document.getElementById("eposta").classList.remove('hata');
}
function temizlesifre (){
	document.getElementById("sifre").classList.remove('hata');
	document.getElementById("sifre1").classList.remove('hata');
}
</script>
</head>

<body>

<div class="container ana">
<a class="btn btn-info" style="margin-top:40px; margin-left:20px; margin-bottom:-50px;" href="index.php" ><span class="glyphicon glyphicon-home"></span></a> 

		<div class="uyepanelkayit text-center">
		
			<form  name="form1" id="kayit" class="text-center" action="" method="post" >
			<img  src="images/logo.png" width="200" alt="Belgem Logo" title="Belgem Logo" />
			  <div class="form-group">
			  
						<div class="input-group m5bottom ">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input class="form-control" type="text" required name="adsoyad" placeholder="Ad Soyad">
						</div>
						
						<div id="kadi" class="input-group m5bottom">
						  <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
						  <input class="form-control" onClick="temizlekadi()" type="text" name="k_adi" required pattern="^[a-z\d\.]{5,}$" title="Türkçe karakter içeremez ve en az 5 karakter olmalı!" placeholder="Kullanıcı Adı">
						</div>
						
						<div id="eposta" class="input-group m5bottom">
						  <span class="input-group-addon"><i class="fa fa-envelope"></i></span></span>
						  <input type="email" class="form-control" onClick="temizleeposta()" name="eposta" required placeholder="E-Mail Adresiniz">
						</div>
					
						<div class="input-group m5bottom ">
							<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
							<input class="form-control" name="cep" type="text" maxlength="11" required pattern="[0-9]{11}" title="Örnek: 05556667788" placeholder="Telefon No">
						</div>
						
						<div id="sifre" class="input-group m5bottom">
						  <span class="input-group-addon"><i class="fa fa-key"></i></span>
						  <input class="form-control" onClick="temizlesifre()" name="sifre" type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Büyük harf, küçük harf ve rakam içermelidir." required placeholder="Şifre">
						</div>
						
						<div id="sifre1" class="input-group m5bottom">
						  <span class="input-group-addon"><i class="fa fa-key"></i></span>
						  <input class="form-control" name="sifre1" onClick="temizlesifre()" type="password"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Büyük harf, küçük harf ve rakam içermelidir." required placeholder="Şifre Tekrar">
						</div>
				
			  </div>
			 
			  <div class="checkbox">
				<label>
				  <input type="checkbox" name="cb_rules_agree" id="cb_rules_agree" value="1" onClick="sozlesmebuton();"><a href="#"> Kullanıcı sözleşmesini</a> okudum ve kabul ediyorum.
				</label>
			  </div>

			  

			  <button type="submit" name="kaydet" id="myBtn" disabled="false"  class="btn btn-info btn-block">Kaydet</button>
			</form>

			
		</div>		

</div>
</div>
<?php include 'footer.php'; ?>