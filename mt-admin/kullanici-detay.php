<?php include 'header.php'; ?>
<script>
function temizle(){
	
$('[disabled="true"]').removeAttr("disabled");
document.getElementById("temiz").classList.add('none');
document.getElementById("kydt").classList.remove('none');
}
function yeniparola () {
    var id = $('input[name=yeniparolaid]').val();
	var msifre = $('input[name=msifre]').val();
	var msifretekrar = $('input[name=msifretekrar]').val();
	if(id!="" && msifre!="" && msifretekrar!=""){
								
		if(msifre==msifretekrar){
				
				$.ajax({
					type:'POST',
					url:'guncellemeler.php',
					data:$('#yeniparolaform').serialize(),
					success:function(data){
							if(data == 1){
								$('#yeniparolamodal').modal('hide');
								$('.parolamesaj').text("Yeni parola oluşturuldu.").fadeIn(0).fadeOut(8000);
								$('input[name=msifre]').val("");
								$('input[name=msifretekrar]').val("");
							}
							else{
								alert("Beklenmedik bir hata oluştu!");
							}
						},
					error:function(){alert("Başarısız");}
					});
					return false;
				
			
		}else{
			document.getElementById("msifre").classList.add('hata');
			document.getElementById("msifretekrar").classList.add('hata');
			$('.hatamesaj').text("Şifreler aynı değil!");
		}
								
	}

    
}
function guncelle() {
	document.getElementById("musername").classList.remove('hata');	
	document.getElementById("memail").classList.remove('hata');
	
		var id = $('input[name=k_id]').val();
		var kadi = $('input[name=musername]').val();
		var eposta = $('input[name=memail]').val();
		
		if(id!="" && kadi!="" && eposta!=""){

			$.ajax({
					type:'POST',
					url:'guncellemeler.php',
					data:$('#kullaniciguncelle').serialize(),
					success:function(data){
							if(data == 1){
								document.getElementById("basarili").classList.add('none');
								$('.hatavar').text("Bütün bilgiler aynı. Lütfen önce değişiklik yapınız!").fadeIn(0).fadeOut(4000);
							}else if(data == 2){
								document.getElementById("basarili").classList.add('none');
								$('.hatavar').text("Bu kullanıcı adı kullanılıyor.").fadeIn(0).fadeOut(4000);
								document.getElementById("musername").classList.add('hata');
							}else if(data == 3){
								document.getElementById("basarili").classList.add('none');
								$('.hatavar').text("Bu e-posta adresi kullanılıyor.").fadeIn(0).fadeOut(4000);
								document.getElementById("memail").classList.add('hata');
							}else if(data == 4){
								$('#basarili').fadeIn(0);
								document.getElementById("basarili").classList.remove('none');
								$('#basarili').fadeOut(5000);
							}else{
								alert("Beklenmedik bir hata oluştu!");
							}
						},
					error:function(){alert("Başarısız");}
					});
					return false;	
		}
		
}
function passclear() {
		document.getElementById("msifre").classList.remove('hata');
		document.getElementById("msifretekrar").classList.remove('hata');
		$('.hatamesaj').text("");
	
}
function kaditemiz() {
		document.getElementById("musername").classList.remove('hata');	
}
function emailtemiz() {
		document.getElementById("memail").classList.remove('hata');	
}

</script>
<?php
if(isset($_GET['kullanici']) ){
					$kullanici=@$_GET['kullanici'];
					$stmt = $db->prepare("SELECT * FROM members where memberID='$kullanici'");
					$stmt->execute();	
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$rol = $row['rol'];
}else{
	header('Location: kullanicilar.php');
}				
				
?>
	<div class="container ana">
		
		<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4 well">
		  <!-- Default panel contents -->
			<span class="f18 gri">Kullanıcılardan <i class="fa fa-users pull-right"></i></span>
			<div style="clear:both"></div><hr class="m15top m15bottom" />
				<form role="form" method="post" id="kullaniciguncelle" action="" onsubmit="return false;" >
					<input type="text" name="k_id" id="k_id" class="form-control input-lg none" value="<?php echo $row['memberID']; ?>" required  disabled="true">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<label >Kullanıcı Adı:</label>
								<input type="text" name="musername" id="musername" onClick="kaditemiz()" class="form-control" value="<?php echo $row['username']; ?>" disabled="true">
							</div>
							
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<label >E-Posta Adresi:</label>
								<input type="email" name="memail" id="memail" class="form-control" onClick="emailtemiz()" value="<?php echo $row['email']; ?>" disabled="true">
							</div>
						</div>
						
				</form>	
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<button data-toggle="tooltip" data-placement="bottom" title="Kullanıcıların parolasını göremezsiniz ancak dilerseniz yeni parola verebilirsiniz." type="submit" class="btn btn-default btn-block btnmodal" />Yeni Parola </button>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6">
										<button type="submit" name="temiz" id="temiz" class="btn btn-success btn-block" onClick="temizle();" >Güncelle</button>
										<input  type="submit" name="kydt"  id="kydt"  class="btn btn-success btn-block none" onClick="guncelle();" value="Kaydet" style="height:50px; margin-top:0; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 300;" />
									</div>
								</div>

							</div>
							
							<?php
							if($rol!=1){
									
									$link='';
									$rol_adi='';
									if($rol==2){
										$link="personel-detay.php?personel=".$row['memberID'];
										$rol_adi='Personel';
									}else if($rol==3){
										$link="musteri-detay.php?musteri=".$row['memberID'];
										$rol_adi='Müşteri';
									}else if($rol==4){
										$link="firma-detay.php?firma=".$row['memberID'];
										$rol_adi='Firma';
									}
									
									echo "<hr/><a href=".$link."><span class='pull-right'>".$rol_adi." bilgilerine git! <i class='fa fa-arrow-right'></i></span></a>";
									
								
							}
						?>
						</div>
						
					</div>
				
				
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4 text-center m15top">
			<label class="parolamesaj green m15top" ></label>
			<label class="hatavar red m15top" ></label>
			<span class="basarili none" id="basarili"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
		</div>
</div><!-- Small modal SİL-->

<div class="modal fade bs-example-modal-sm" id="yeniparolamodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	   <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Yeni Parola</h4>
	  </div>
	  <div class="modal-body">	
		<form role="form" method="post" id="yeniparolaform" action="" onsubmit="return false;" >
			<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<input type="text" name="yeniparolaid" id="yeniparolaid" class="none" value="<?php echo $kullanici;?>" >
						<div class="form-group">
							<label >Şifre:</label>
							<input type="password" name="msifre" id="msifre" class="form-control" onClick="passclear()" placeholder="Şifre" title="Büyük harf, küçük harf ve rakam içermelidir." required  >
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label >Şifre Tekrarı:</label>
							<input type="password" name="msifretekrar" id="msifretekrar" onClick="passclear()" class="form-control" placeholder="Şifre Tekrarı" required >
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<b><span class="hatamesaj red"></span></b>
					</div>
			</div>
		
	  </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-danger btn-block" onClick="yeniparola()"  href="#">OLUŞTUR!</button>
	  </div>
	  </form>
	</div>
  </div>
</div>	
<script>
$('button.btnmodal').on('click', function (e) {
    e.preventDefault();
    $('#yeniparolamodal').modal('show');
});
</script>

<?php include 'footer.php'; ?>