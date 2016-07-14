<?php include 'header.php'; ?>
<script>
function kaydet(){
	var username = $('input[name=username]').val();
	var email = $('input[name=email]').val();
	var pass1 = $('input[name=password]').val();
	var pass2 = $('input[name=passwordConfirm]').val();
	if(username!="" && email!="" && pass1!="" && pass2!=""){
								
		if(pass1==pass2){
				
				$.ajax({
					type:'POST',
					url:'function.php',
					data:$('#yoneticikayit').serialize(),
					success:function(data){
							if(data == 1){
								$('.hatavar').text("Bu kullanıcı adı kullanılıyor!");
								document.getElementById("username").classList.add('hata');
							}else if(data == 2){
								$('.hatavar').text("Bu e-posta adresi kullanılıyor!");
								document.getElementById("email").classList.add('hata');
							}else if(data == 3){
								document.getElementById("username").classList.remove('hata');
								document.getElementById("email").classList.remove('hata');
								document.getElementById("basarili").classList.remove('none');
							}else{
								alert("Beklenmedik bir hata oluştu!");
							}
						},
					error:function(){alert("Başarısız");}
					});
					return false;
				
			
		}else{
			document.getElementById("password").classList.add('hata');
			document.getElementById("passwordConfirm").classList.add('hata');
			$('.hatavar').text("Şifreler aynı değil!");
		}
								
	}
	
}
function sifretemiz(){
			document.getElementById("password").classList.remove('hata');
			document.getElementById("passwordConfirm").classList.remove('hata');
			$('.hatavar').text("");
}
function usernametemiz(){
			document.getElementById("username").classList.remove('hata');
			$('.hatavar').text("");
}
function emailtemiz(){
			document.getElementById("email").classList.remove('hata');
			$('.hatavar').text("");
}
</script>


<div class="container ana">

	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4 well">
					<span class="f18 gri">Yönetici Ekle <i class="fa fa-users pull-right"></i></span>
					<div style="clear:both"></div><hr class="m15top m15bottom" />
		
			<div >
				<form role="form" method="post" action="" id="yoneticikayit" onsubmit="return false;" autocomplete="off">

					<div class="form-group">
						<input type="text" name="username" id="username" onClick="usernametemiz()" class="form-control input-lg" required placeholder="Kullanıcı Adı" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
					</div>
					<div class="form-group">
						<input type="email" name="email" id="email" onClick="emailtemiz()" class="form-control input-lg" required placeholder="Email Adres" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" onClick="sifretemiz()" required class="form-control input-lg" placeholder="Şifre" tabindex="3">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" onClick="sifretemiz()" required class="form-control input-lg" placeholder="Şifre Tekrarı" tabindex="4">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12"><button type="submit" name="submit" onClick="kaydet()" class="btn btn-primary btn-lg pull-right" tabindex="5">Kaydet!</button></div>
					</div>
				</form>
			</div>
		
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4 text-center m15top">
			<label class="hatavar red m15top" ></label>
			<span class="basarili none" id="basarili"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
	</div>

</div>

<?php
//include footer template
include 'footer.php';
?>
