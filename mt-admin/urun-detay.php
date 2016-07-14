<?php include 'header.php'; ?>
<script>
function temizle(){
$('[disabled="true"]').removeAttr("disabled");
document.getElementById("temiz").classList.add('none');
document.getElementById("kydt").classList.remove('none');	

}
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
					url:'guncellemeler.php',
					data:$('#guncelurun').serialize(),
					success:function(data){
						if(data == 1){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Bütün bilgiler aynı. Güncellemek için önce değişiklik yapmalısınız.");
							$('#hatamodal').modal('show');
						}else if(data == 2){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Barkod numarası 13 basamaklı olmalı!");
							$('#hatamodal').modal('show');
							document.getElementById("barkodno").classList.add('hata');
							
						}else if(data == 3){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Bu ürün adı kullanılıyor!");
							$('#hatamodal').modal('show');
							document.getElementById("urunadi").classList.add('hata');
						}else if(data == 4){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Barkod numarası kullanılıyor!");
							$('#hatamodal').modal('show');
							document.getElementById("barkodno").classList.add('hata');
						}else if(data == 5){
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
<?php
if(isset($_GET['urun']) ){
	$urun=@$_GET['urun'];
	$stmt = $db->prepare("SELECT * FROM urunler where urun_id=$urun");
					$stmt->execute();	
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
	header('Location: personellerim.php');
}
?>
<div class="container ana">


	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 well" >
					<span class="f18 gri ">Ürün Detay <span class="glyphicon glyphicon-cutlery pull-right"></span></span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="guncelurun" action="" onsubmit="return false;" >
				<input type="text" name="urunid" id="urunid" class="none" value="<?php echo $row['urun_id']; ?>">
				<div class="form-group">
					<label >Üretici Marka:</label>
					<input type="text" name="marka" id="marka" class="form-control input-lg" value="<?php echo $row['marka']; ?>" disabled="true" required  tabindex="1">
				</div>
				<div class="form-group">
						<label >Ürün Adı, Cinsi ve Miktarı:</label>
						<input type="text" onClick="urunadiclear()" name="urunadi" id="urunadi" class="form-control input-lg" value="<?php echo $row['urun_adi']; ?>" disabled="true" required  tabindex="2">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Maaliyet / Alış Fiyatı (TL):</label>
							<input type="text" name="maaliyet" id="maaliyet"  class="form-control input-lg"  pattern="[0-9\d\.]{1,}" title="Örnek: 185.50" value="<?php echo $row['maliyet']; ?>" disabled="true" required tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Satış Fiyatı (TL):</label>
							<input type="text" name="satisfiyati" id="satisfiyati" class="form-control input-lg"  pattern="[0-9\d\.]{1,}" title="Örnek: 185.50" value="<?php echo $row['satis_fiyati']; ?>" disabled="true" required tabindex="4">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Barkod No:</label>
							<input type="number" name="barkodno" id="barkodno" onClick="barkodnoclear()" class="form-control input-lg" value="<?php echo $row['barkod_no']; ?>" disabled="true" required tabindex="5">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Birimi (kğ/lt/koli...):</label>
							<input type="text" name="birimi" id="birimi" class="form-control input-lg" value="<?php echo $row['birimi']; ?>" disabled="true" required tabindex="5">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<button type="submit" name="temiz" id="temiz" class="btn btn-success pull-right" onClick="temizle();" >Güncelle</button>
						<input type="submit" name="kydt"  id="kydt"  class="btn btn-success pull-right none" onClick="kaydet();" value="Kaydet" style="height:50px; margin-top:0; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 300;" />
					</div>
				</div>
				
			</form>
			

		</div>

	</div><!----- Container Son ---->
<!-- Small modal BİLGİ-->
<?php include 'modal/hatamodal.php';?>
<?php include 'footer.php'; ?>
        