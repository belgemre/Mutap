<?php include 'header.php'; ?>

<script>
function kaydet(){
	var marka=$('input[name=marka]').val();
	var urunadi=$('input[name=urunadi]').val();
	var maaliyet=$('input[name=maaliyet]').val();
	var satisfiyati=$('input[name=satisfiyati]').val();
	var barkodno=$('input[name=barkodno]').val();
	var birimi=$('input[name=birimi]').val();
	
	
	
	if(marka!="" 
	&& urunadi!="" 
	&& maaliyet != "" 
	&& satisfiyati != ""
	&& barkodno != ""
	&& birimi != ""	
	){

        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#yeniurun').serialize(),
					success:function(data){
						if(data == 1){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text(" Bu ürün adı kullanılıyor.");
							$('#hatamodal').modal('show');
							document.getElementById("urunadi").classList.add('hata');
						}else if(data == 2){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Bu barkod numarası kullanılıyor.");
							$('#hatamodal').modal('show');
							document.getElementById("barkodno").classList.add('hata');
							
						}else if(data == 3){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Barkod numarası 13 basamaklı olmalı!.");
							$('#hatamodal').modal('show');
							document.getElementById("barkodno").classList.add('hata');
							
						}else if(data == 4){
							document.getElementById("urunadi").classList.remove('hata');
							document.getElementById("barkodno").classList.remove('hata');
							$('#kaydetbtn').hide(0);
							document.getElementById("yeniktbtn").classList.remove('none');
							$('.hatamesaji').text("");
							$('#hatamodal').modal('show');
							document.getElementById("basarili").classList.remove('none');
							

						}else{
							alert("Kayıt sırasında bir hata oluştu!.");
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}
	
	
}

function urunadiclear(){
	document.getElementById("urunadi").classList.remove('hata');
	$('.hatamesaji').text("");
}
function barkodnoclear(){
	document.getElementById("barkodno").classList.remove('hata');
	$('.hatamesaji').text("");
}

</script>

<div class="container ana">


	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 well" >
					<span class="f18 gri ">Yeni Ürün <span class="glyphicon glyphicon-cutlery pull-right"></span></span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="yeniurun" action="" onsubmit="return false;" >

				<div class="form-group">
					<label >Üretici Marka:</label>
					<input type="text" name="marka" id="marka" class="form-control input-lg" placeholder="BELGEM" required  tabindex="1">
				</div>
				<div class="form-group">
						<label >Ürün Adı, Cinsi ve Miktarı:</label>
						<input type="text" onClick="urunadiclear()" name="urunadi" id="urunadi" class="form-control input-lg" placeholder="Belgem Tulum Peyniri 1'lik Çörek Otlu" required  tabindex="2">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Maaliyet / Alış Fiyatı (TL):</label>
							<input type="text" name="maaliyet" id="maaliyet"  class="form-control input-lg"  pattern="[0-9\d\.]{1,}" title="Örnek: 185.50" placeholder="19.90" required tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Satış Fiyatı (TL):</label>
							<input type="text" name="satisfiyati" id="satisfiyati" class="form-control input-lg"  pattern="[0-9\d\.]{1,}" title="Örnek: 185.50" placeholder="25.00" required tabindex="4">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Barkod No:</label>
							<input type="number" name="barkodno" id="barkodno" onClick="barkodnoclear()" class="form-control input-lg" placeholder="849919586811" required tabindex="5">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Birimi (kğ/lt/koli...):</label>
							<input type="text" name="birimi" id="birimi" class="form-control input-lg" placeholder="kğ" required tabindex="5">
						</div>
					</div>
				</div>

				<button type="submit" name="submit" onClick="kaydet();" id="kaydetbtn" class="btn btn-primary btn-lg pull-right" tabindex="6">Kaydet</button>
				<a class="btn btn-success pull-right btn-lg none" name="yenikyt" id="yeniktbtn" href="urun-ekle.php" >Yeni Kayıt</a>
				
				
			</form>
			

		</div>

	</div><!----- Container Son ---->
<!-- Small modal BİLGİ-->
<?php include 'modal/hatamodal.php';?>
<?php include 'footer.php'; ?>
        