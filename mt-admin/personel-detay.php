<?php include 'header.php'; ?>
<script>

function temizle(){
$('[disabled="true"]').removeAttr("disabled");
document.getElementById("temiz").classList.add('none');
document.getElementById("kydt").classList.remove('none');	
}
function kaydet(){
	
	var adi = $('input[name=personeladi]').val();
	var soyadi = $('input[name=personelsoyadi]').val();
	var medenihal = document.getElementById("medenihal").value;
	var per_id = $('input[name=per_id]').val();
	var isbastar = $('input[name=isbastar]').val();
	var konum = $('input[name=konum]').val();
	var maas = $('input[name=maas]').val();

	if(adi!="" && soyadi != "" && medenihal != "" && per_id != "" && isbastar != "" && konum != "" && maas != "" ){

				$.ajax({
					type:'POST',
					url:'guncellemeler.php',
					data:$('#personelguncelle').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text("");
							$('#hatamodal').modal('show');
							document.getElementById("basarili").classList.remove('none');
						}else if(data == 2){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Bütün bilgiler aynı. Güncellemek için önce değişiklik yapmalısınız.");
							$('#hatamodal').modal('show');
							
							
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}
}
</script>
<?php
if(isset($_GET['personel']) ){
	$personel=@$_GET['personel'];
	$stmt = $db->prepare("SELECT * FROM personel where userID=$personel");
					$stmt->execute();	
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
	header('Location: personellerim.php');
}
?>
<div class="container ana">
	<div class="col-md-10 col-md-offset-1 well" >
  
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active"  id="fb">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Servisçi Bilgileri">
                            <span class="round-tab" >
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" id="sb">
                        <a href="#step2" data-toggle="tab"  aria-controls="step2" role="tab" title="İş / Maaş Bilgileri">
                            <span class="round-tab" id="maasbilgileri">
                                <i class="fa fa-credit-card"></i>
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </div>

			<form role="form" method="post" id="personelguncelle" action="" onsubmit="return false;" >
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
						<input type="text" name="per_id" id="per_id" class="none" value="<?php echo $row['per_id']; ?>">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label >Adı:</label>
									<input type="text" name="personeladi" id="personeladi" required class="form-control" value="<?php echo $row['adi']; ?>" disabled="true">
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
							  <div class="form-group">
								<label >Soyadı:</label>
								<input type="text" name="personelsoyadi" required class="form-control" value="<?php echo $row['soyadi']; ?>" disabled="true">
							  </div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
							   <div class="form-group">
									<label >Medini Hal:</label>
									<select  name="medenihal" id="medenihal" class="form-control form" required disabled="true">
										<option value="">Medeni Hal</option>
										<option value="Evli" <?php if($row['medenihal']=="Evli"){echo "selected";}?>>Evli</option>
										<option value="Bekar" <?php if($row['medenihal']=="Bekar"){echo "selected";}?>>Bekar</option>			
									</select>
							   </div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
							   <div class="form-group">
									<label >Çocuk Sayısı:</label>
									<input type="number" name="csayisi" class="form-control" placeholder="Çocuk sayısı bilgisi yok." value="<?php echo $row['csayisi']; ?>" disabled="true" >
							   </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label >Ev Tel:</label>
									<input type="number" name="evtel" maxlength="10"  pattern="[0-9]{10}" title="Örnek:3822123344" class="form-control" placeholder="Ev telefonu bilgisi yok." value="<?php echo $row['evtel']; ?>" disabled="true">
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label >Cep Tel:</label>
									<input type="number" name="ceptel" maxlength="10"  pattern="[0-9]{10}" title="Örnek:5556667788" class="form-control" placeholder="Cep telefonu bilgisi yok." value="<?php echo $row['ceptel']; ?>" disabled="true" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
							   <div class="form-group">
									<label >Adres:</label>
									<input type="text" name="adres" class="form-control" placeholder="Adres bilgisi yok." value="<?php echo $row['adres']; ?>" disabled="true">
							   </div>
							</div>
						</div>
						



                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
							   <div class="form-group">
									<label >İşe Başlama Tarihi:</label>
									<input type="date" name="isbastar" class="form-control" required value="<?php echo $row['isbastar']; ?>" disabled="true">
							   </div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label >Çalıştığı Pozisyon:</label>
									<select  name="konum" id="konum" class="form-control roller" required disabled="true">
											<option value="">Pozisyon seçin</option>
											<?php
					
												$stmt = $db->prepare("SELECT * FROM roller");
												$stmt->execute();
												
											while( $rol = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
											?>
											<option value="<?php echo $rol['rol_id']; ?>" <?php if($rol['rol_id']== $row['rol']){echo "selected";} ?>><?php echo $rol['konum']; ?></option>
											<?php } ?>
										
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label >Maaş (TL):</label>
									<input type="text" name="maas" id="maas" class="form-control" value="<?php echo $row['maas']; ?>" disabled="true" required>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label >IBAN No:</label>
									<input type="text" name="iban" class="form-control" placeholder="IBAN bilgisi yok." value="<?php echo $row['iban']; ?>" disabled="true">
								</div>
							</div>
						</div>							
				
                    </div>

                   
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
	<hr/>

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<button type="submit" name="temiz" id="temiz" class="btn btn-success pull-right" onClick="temizle();" >Güncelle</button>
			<input type="submit" name="kydt"  id="kydt"  class="btn btn-success pull-right none" onClick="kaydet();" value="Kaydet" style="height:50px; margin-top:0; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 300;" />
			<a href="kullanici-detay.php?kullanici=<?php echo $row['userID']; ?>"><i class="fa fa-arrow-left"></i> Kullanıcı bilgilerine git!</a>
		</div>
							
	</div>
  </div>

</div>

<script>
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
});


</script>
<!-- Small modal BİLGİ-->
<?php include 'modal/hatamodal.php';?>
<!-- ALT KISIM-->
<?php include 'footer.php'; ?>