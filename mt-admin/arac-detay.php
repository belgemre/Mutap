<?php include 'header.php'; ?>

<script>
function temizle(){
$('[disabled="true"]').removeAttr("disabled");
document.getElementById("temiz").classList.add('none');
document.getElementById("kydt").classList.remove('none');	
}
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
					url:'guncellemeler.php',
					data:$('#aracguncelle').serialize(),
					success:function(data){
						if(data == 1){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text(" Bütün bilgiler aynı. Güncellemek için önce değişiklik yapmalısınız.");
							$('#hatamodal').modal('show');

						}else if(data == 2){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text(" Plaka kullanılıyor.");
							$('#hatamodal').modal('show');
							document.getElementById("plaka").classList.add('hata');	
						}else if(data == 3){
							document.getElementById("plaka").classList.remove('hata');
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
<?php
if(isset($_GET['arac']) ){
	$arac=@$_GET['arac'];
	$stmt = $db->prepare("SELECT * FROM araclar where arac_id=$arac");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
	header('Location: personellerim.php');
}
?>
<div class="container ana">


	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 well" >
					<span class="f18 gri ">Araç Detay <i class="fa fa-car pull-right fa-2x"></i><i class="fa fa-truck pull-right fa-2x"></i></span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="aracguncelle" action="" onsubmit="return false;" >
				<input type="text" name="arac_id" id="arac_id" class="none" value="<?php echo $row['arac_id']; ?>">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Marka:</label>
							<input type="text" name="marka" id="marka" class="form-control input-lg" value="<?php echo $row['marka']; ?>" disabled="true" required  >
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
								<label >Model:</label>
								<input type="text" name="model" id="model" class="form-control input-lg" value="<?php echo $row['model']; ?>" disabled="true" required >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Yıl:</label>
							<select name="uretimyili" id="uretimyili" class="form-control form" disabled="true" required>
							<option value="" >Üretim Yılı Seç</option>
								<?php 
								for($yil=1990; $yil <= 2020 ;$yil++){ ?>
										<option <?php if($row['yil']==$yil){echo "selected";} ?> value="<?php echo $yil; ?>"> <?php echo $yil; ?> </option>
							 <?php	 }
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Plaka:</label>
							<input type="text" name="plaka" id="plaka" onClick="plakaclear()" class="form-control input-lg" value="<?php echo $row['plaka']; ?>" disabled="true" required >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Yakıt Tipi:</label>
							<select name="ytipi" id="ytipi" class="form-control form" disabled="true" required>
							<option value="" >Yakıt Tipi Seç</option>
							<option value="Benzin" <?php if($row['ytipi']=="Benzin"){echo "selected";}?>>Benzin</option>
							<option value="Benzin & LPG" <?php if($row['ytipi']=="Benzin & LPG"){echo "selected";}?>>Benzin & LPG</option>
							<option value="Dizel" <?php if($row['ytipi']=="Dizel"){echo "selected";}?> >Dizel</option>
								
							</select>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<label >Araç Tipi:</label>
							<select name="atipi" id="atipi" class="form-control form" disabled="true" required>
								<option value="" >Araç Tipi Seç</option>
								<option value="Binek" <?php if($row['atipi']=="Binek"){echo "selected";}?> >Binek</option>
								<option value="Servis" <?php if($row['atipi']=="Servis"){echo "selected";}?> >Servis</option>
							</select>
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
        