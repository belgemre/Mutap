<?php include 'header.php'; ?>

<script>
function kaydet(){
	var marka=$('input[name=marka]').val();
	var model=$('input[name=model]').val();
	var uretimyili=document.getElementById("uretimyili").value;
	var plaka=$('input[name=plaka]').val();
	var ytipi=document.getElementById("ytipi").value;
	var atipi=document.getElementById("atipi").value;
	
	
	
	if(marka!="" 
	&& model!="" 
	&& uretimyili != "" 
	&& plaka != ""
	&& ytipi != ""
	&& atipi != ""	
	){

        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#aracekle').serialize(),
					success:function(data){
						if(data == 1){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text(" Plaka kullanılıyor.");
							$('#hatamodal').modal('show');
							document.getElementById("plaka").classList.add('hata');
						}else if(data == 2){
							document.getElementById("plaka").classList.remove('hata');
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

function plakaclear(){
	document.getElementById("plaka").classList.remove('hata');
	$('.hatamesaji').text("");
}


</script>

<div class="container ana">


	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 well" >
					<span class="f18 gri ">Araç Ekle <i class="fa fa-car pull-right fa-2x"></i><i class="fa fa-truck pull-right fa-2x"></i></span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="aracekle" action="" onsubmit="return false;" >
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Marka:</label>
							<input type="text" name="marka" id="marka" class="form-control input-lg" placeholder="FORD" required  tabindex="1">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
								<label >Model:</label>
								<input type="text" name="model" id="model" class="form-control input-lg" placeholder="Transit T120" required  tabindex="2">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Yıl:</label>
							<select name="uretimyili" id="uretimyili" class="form-control form" required>
							<option value="" >Üretim Yılı Seç</option>
								<?php 
								for($yil=1990; $yil <= 2020 ;$yil++){
										echo	"<option value=".$yil.">".$yil."</option>";
								 }
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Plaka:</label>
							<input type="text" name="plaka" id="plaka" onClick="plakaclear()" class="form-control input-lg" placeholder="68 HE 541" required tabindex="4">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Yakıt Tipi:</label>
							<select name="ytipi" id="ytipi" class="form-control form" required>
							<option value="" >Yakıt Tipi Seç</option>
							<option value="Benzin" >Benzin</option>
							<option value="Benzin & LPG" >Benzin & LPG</option>
							<option value="Dizel" >Dizel</option>
								
							</select>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Araç Tipi:</label>
							<select name="atipi" id="atipi" class="form-control form" required>
								<option value="" >Araç Tipi Seç</option>
								<option value="Binek" >Binek</option>
								<option value="Servis" >Servis</option>
							</select>
						</div>
					</div>

				</div>
				<button type="submit" onClick="kaydet();" id="kaydetbtn" class="btn btn-success btn-lg pull-right" tabindex="6">Kaydet</button>
				<a class="btn btn-success pull-right btn-lg none" name="yenikyt" id="yeniktbtn" href="arac-ekle.php" >Yeni Kayıt</a>
				
				
			</form>
			

		</div>

	</div><!----- Container Son ---->
<!-- Small modal BİLGİ-->
<?php include 'modal/hatamodal.php';?>
<?php include 'footer.php'; ?>
        