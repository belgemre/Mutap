<?php include 'header.php'; ?>
<script>
function ilerii(){
	var firmaadi = $('input[name=firmaadi]').val();
	var sahibi = $('input[name=sahibi]').val();
	if(firmaadi != "" && sahibi != ""){
		
		var $active = $('.wizard .nav-tabs li.active');
							$active.next().removeClass('disabled');
							nextTab($active);
	}
}
function ilerii2(){
	var liste = document.getElementById("liste").value;
	var bakiye = $('input[name=bakiye]').val();
	if(liste != "" && bakiye != ""){
		
		var $active = $('.wizard .nav-tabs li.active');
							$active.next().removeClass('disabled');
							nextTab($active);
	}
}
function kaydet(){
	var firmaadi = $('input[name=firmaadi]').val();
	var sahibi = $('input[name=sahibi]').val();
	var musername=$('input[name=musername]').val();
	var memail=$('input[name=memail]').val();
	var password=$('input[name=password]').val();
	var passwordcon=$('input[name=passwordConfirm]').val();
	var liste = document.getElementById("liste").value;
	
	
	
	if(musername!="" 
	&& memail!="" 
	&& password != "" 
	&& passwordcon != ""
	&& firmaadi != ""
	&& sahibi != ""
	&& liste != ""){

			        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#musteriekle').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text(" Bu kullanıcı adı kullanılıyor.");
							document.getElementById("musername").classList.add('hata');
						}else if(data == 2){
							
							$('.hatamesaji').text("Bu mail adresi kullanılıyor.");
							document.getElementById("memail").classList.add('hata');
							
						}else if(data == 3){
							
							$('.hatamesaji').text("Şifreler uyuşmuyor.");
							document.getElementById("password").classList.add('hata');
							document.getElementById("passwordConfirm").classList.add('hata');
							
						}else if(data == 4){
							
							$('.hatamesaji').text("Firma adı zaten var.");
							document.getElementById("firmaadi").classList.add('hata');
							document.getElementById("firmabilgileri").classList.add('hata');
							
						}else{
							
							document.getElementById("musername").classList.remove('hata');
							document.getElementById("memail").classList.remove('hata');
							document.getElementById("password").classList.remove('hata');
							document.getElementById("passwordConfirm").classList.remove('hata');


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

function musernameclear(){
	document.getElementById("musername").classList.remove('hata');
	$('.hatamesaji').text("");
}
function memailclear(){
	document.getElementById("memail").classList.remove('hata');
	$('.hatamesaji').text("");
}
function passclear(){
	document.getElementById("password").classList.remove('hata');
	document.getElementById("passwordConfirm").classList.remove('hata');
	$('.hatamesaji').text("");
}
function firmaadiclear(){
	document.getElementById("firmaadi").classList.remove('hata');
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
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Firma Bilgileri">
                            <span class="round-tab" id="firmabilgileri">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled" id="sb">
                        <a href="#step2" data-toggle="tab"  aria-controls="step2" role="tab" title="Servis Bilgileri">
                            <span class="round-tab">
                                <i class="fa fa-truck"></i>
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

			<form role="form" method="post" id="musteriekle" action="" onsubmit="return false;" >
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
					
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label >İş Yeri Adı:</label>
									<input type="text" name="firmaadi" id="firmaadi" onClick="firmaadiclear()" required class="form-control" placeholder="İş Yeri  Adı">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
							  <div class="form-group">
								<label >İş Yeri Sahibi:</label>
								<input type="text" name="sahibi" required class="form-control" placeholder="İş Yerinin Sahibi:">
							  </div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
							  <div class="form-group">
								<label >İş Tel:</label>
								<input type="number" name="istel" maxlength="11"  pattern="[0-9]{11}" title="Örnek: 03822123344" class="form-control" placeholder="03822123344">
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
							<div class="col-xs-12 col-sm-12 col-md-12">
							   <div class="form-group">
									<label >Adres:</label>
									<input type="text" name="adres" class="form-control" placeholder="Taşpazar mah...">
							   </div>
							</div>
						</div>

							<ul class="list-inline pull-right">
								<li><button type="submit" onClick="ilerii()" id="ileri1" class="btn btn-primary">İleri</button></li>
							</ul>



                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">

								<div class="form-group">
									<label >Hangi Listede:</label>
									<select  name="liste" id="liste" class="form-control form" required>
										<option value="">Liste / Güzergah Seç</option>
										
										<?php
				
											$stmt = $db->prepare("SELECT * FROM guzergahlar");
											$stmt->execute();
											
										while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
										?>
										
										
										<option value="<?php echo $row['guzergah_id']; ?>"><?php echo $row['guzergah_adi']." - ".$row['tanim']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label >Listedeki Sırası:</label>
									<input type="number" name="sira" maxlength="3"  pattern="[0-9]{3}" title="Örnek: 11" class="form-control" placeholder="11">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label >Mevcut Bakiye (TL):</label>
									<input type="text" required name="bakiye" id="bakiye" class="form-control" pattern="[0-9\d\.]{1,}" title="Örnek: 185.50" placeholder="1225.50">
								</div>
							</div>
						</div>
								
					
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Geri</button></li>
                            <li><button type="submit" onClick="ilerii2()" id="ileri2" class="btn btn-primary">İleri</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label >Kullanıcı Adı:</label>
										<input type="text" name="musername" id="musername" onClick="musernameclear()" class="form-control input-lg" placeholder="Kullanıcı Adı..." required pattern="^[a-z\d\.]{5,}$" title="Türkçe karakter içeremez ve en az 5 karakter olmalı!" required  tabindex="1">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label >E-Posta Adresi:</label>
										<input type="email" name="memail" id="memail" onClick="memailclear()" class="form-control input-lg" placeholder="Email Adresi..." required tabindex="2">
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
                       <span><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span><br>
						<a href="mt-admin/musteriekle.php" class="btn btn-success">Yeni Kayıt</a>
						
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