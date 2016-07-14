<?php include 'header.php'; ?>
<script>
function ilerii(){
	var adi = $('input[name=adi]').val();
	var soyadi = $('input[name=soyadi]').val();
	var medenihal = document.getElementById("medenihal").value;
	var isbastar = $('input[name=isbastar]').val();
	if(adi != "" && soyadi != "" && medenihal != "" ){
		
		var $active = $('.wizard .nav-tabs li.active');
							$active.next().removeClass('disabled');
							nextTab($active);
	}
}
function ilerii2(){
	var maas = $('input[name=maas]').val();
	if(maas != ""){
		
		var $active = $('.wizard .nav-tabs li.active');
							$active.next().removeClass('disabled');
							nextTab($active);
	}
}
function kaydet(){
	var adi = $('input[name=adi]').val();
	var soyadi = $('input[name=soyadi]').val();
	var susername=$('input[name=susername]').val();
	var semail=$('input[name=semail]').val();
	var password=$('input[name=password]').val();
	var passwordcon=$('input[name=passwordConfirm]').val();
	var medenihal = document.getElementById("medenihal").value;
	
	
	
	if(susername!="" 
	&& semail!="" 
	&& password != "" 
	&& passwordcon != ""
	&& adi != ""
	&& soyadi != ""
	&& medenihal != ""){

			        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#serviselemaniekle').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text(" Bu kullanıcı adı kullanılıyor.");
							document.getElementById("susername").classList.add('hata');
						}else if(data == 2){
							
							$('.hatamesaji').text("Bu mail adresi kullanılıyor.");
							document.getElementById("semail").classList.add('hata');
							
						}else if(data == 3){
							
							$('.hatamesaji').text("Şifreler uyuşmuyor.");
							document.getElementById("password").classList.add('hata');
							document.getElementById("passwordConfirm").classList.add('hata');
							
						}else{
							
							document.getElementById("semail").classList.remove('hata');
							document.getElementById("password").classList.remove('hata');
							document.getElementById("passwordConfirm").classList.remove('hata');
							$('.hatamesaji').text("");


							var $active = $('.wizard .nav-tabs li.active');
							$active.next().removeClass('disabled');
							nextTab($active);
							
							document.getElementById("fb").classList.add('disabled');
							document.getElementById("sb").classList.add('disabled');
							document.getElementById("kb").classList.add('disabled');
							
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;
		
	}else{
		
		alert("Boş alan ya da alanlar var.");
		
		
	}
	
	
}

function susernameclear(){
	document.getElementById("susername").classList.remove('hata');
	$('.hatamesaji').text("");
}
function semailclear(){
	document.getElementById("semail").classList.remove('hata');
	$('.hatamesaji').text("");
}
function passclear(){
	document.getElementById("password").classList.remove('hata');
	document.getElementById("passwordConfirm").classList.remove('hata');
	$('.hatamesaji').text("");
}
function firmaadiclear(){
	document.getElementById("adi").classList.remove('hata');
	document.getElementById("firmabilgileri").classList.remove('hata');
	$('.hatamesaji').text("");
}

</script>
<div class="container ana">

	<div class="col-md-10 col-md-offset-1 main" >
  
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active" id="fb">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Servisçi Bilgileri">
                            <span class="round-tab" >
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled" id="sb">
                        <a href="#step2" data-toggle="tab"  aria-controls="step2" role="tab" title="Banka / Maaş Bilgileri">
                            <span class="round-tab" id="maasbilgileri">
                                <i class="fa fa-credit-card"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled" id="kb">
                        <a href="#step3" data-toggle="tab"  aria-controls="step3" role="tab" title="Kullanıcı Bilgileri">
                            <span class="round-tab">
                                <i class="fa fa-key"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Son">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

			<form role="form" method="post" id="serviselemaniekle" action="" onsubmit="return false;" >
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
							<input type="text" name="rol" id="rol" class="none" value="2">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label >Adı:</label>
									<input type="text" name="adi" id="adi" required class="form-control" placeholder="Servis Personeli'nin Adı">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
							  <div class="form-group">
								<label >Soyadı:</label>
								<input type="text" name="soyadi" required class="form-control" placeholder="Servis Personeli'nin Soyadı">
							  </div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label >Ev Tel:</label>
									<input type="number" name="evtel" maxlength="11"  pattern="[0-9]{11}" title="Örnek: 03822123344" class="form-control" placeholder="03822123344">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label >Cep Tel:</label>
									<input type="number" name="ceptel" maxlength="11"  pattern="[0-9]{11}" title="Örnek: 05556667788" class="form-control" placeholder="05556667788">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
							   <div class="form-group">
									<label >Adres:</label>
									<input type="text" name="adres" class="form-control" placeholder="Taşpazar mah...">
							   </div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
							   <div class="form-group">
									<label >İşe Başlama Tarihi:</label>
									<input type="date" name="isbastar" class="form-control" required >
							   </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
							   <div class="form-group">
									<label >Medini Hal:</label>
									<select  name="medenihal" id="medenihal" class="form-control form" required>
										<option value="">Medeni Hal</option>
										<option value="Evli">Evli</option>
										<option value="Bekar">Bekar</option>			
									</select>
							   </div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
							   <div class="form-group">
									<label >Çocuk Sayısı:</label>
									<input type="number" name="csayisi" class="form-control" placeholder="2" >
							   </div>
							</div>
						</div>

							<ul class="list-inline pull-right">
								<li><button type="submit" onClick="ilerii()" id="ileri1" class="btn btn-primary">İleri</button></li>
							</ul>



                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								
								<div class="form-group">
									<label >Maaş (TL):</label>
									<input type="text" required name="maas" id="maas" class="form-control" pattern="[0-9\d\.]{1,}" title="Örnek: 185.50" placeholder="1225.50">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label >IBAN No:</label>
									<input type="text" name="iban" class="form-control" placeholder="TR98665555666688884444">
								</div>
							</div>

						</div>

										
					
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Geri</button></li>
							<li><button type="submit" class="btn btn-primary next-step">Atla</button></li>
                            <li><button type="submit" onClick="ilerii2()" id="ileri2" class="btn btn-primary">İleri</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label >Kullanıcı Adı:</label>
										<input type="text" name="susername" id="susername" onClick="susernameclear()" class="form-control input-lg" placeholder="Kullanıcı Adı..." required pattern="^[a-z\d\.]{5,}$" title="Türkçe karakter içeremez ve en az 5 karakter olmalı!" required  tabindex="1">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label >E-Posta Adresi:</label>
										<input type="email" name="semail" id="semail" onClick="semailclear()" class="form-control input-lg" placeholder="Email Adresi..." required tabindex="2">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label >Şifre:</label>
										<input type="password" name="password" id="password"  class="form-control input-lg" placeholder="Şifre" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Büyük harf, küçük harf ve rakam içermelidir." required tabindex="3">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label >Şifre Tekrarı:</label>
										<input type="password" name="passwordConfirm" id="passwordConfirm" onClick="passclear()"  class="form-control input-lg" placeholder="Şifre Tekrarı" required tabindex="4">
									</div>
								</div>
							</div>	
						
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Geri</button></li>
                          
                            <li><button type="button" onClick="kaydet()" id="kydt" name ="kydtt" class="btn btn-primary btn-info-full">Kaydet!</button></li>
                        </ul>

                    </div>
                    <div class="tab-pane text-center" role="tabpanel" id="complete">
                        <span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
						<a href="servis-elemani-ekle.php" class="btn btn-success pull-right">Yeni Kayıt</a>
						
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
   		 <div class="col-md-10 col-md-offset-1 text-center m15top">
			<p class=""><label class="hatamesaji red m5left" id="hatamesaji" ></label></p>
		 </div>
</div>



<script>
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>
<?php include 'footer.php'; ?>