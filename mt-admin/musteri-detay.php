<?php include 'header.php'; ?>
<script>

function temizle(){
	
$('[disabled="true"]').removeAttr("disabled");
document.getElementById("temiz").classList.add('none');
document.getElementById("kydt").classList.remove('none');

	
}
function temizmusteri(){
$('.hatamesaji').text("");
document.getElementById("musteri").classList.remove('hata');

	
}
function kaydet(){
	
	var musteri = $('input[name=musteri]').val();
	var sahibi = $('input[name=sahibi]').val();
	var liste = document.getElementById("liste").value;
	var m_id = $('input[name=m_id]').val();

	if(musteri!="" && sahibi != "" && liste != "" && m_id != "" ){

					        $.ajax({
					type:'POST',
					url:'guncellemeler.php',
					data:$('#musteriguncelle').serialize(),
					success:function(data){
						if(data == 1){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Bütün bilgiler aynı. Güncellemek için önce değişiklik yapmalısınız.");
							$('#hatamodal').modal('show');
						}else if(data == 2){
							$('.hatamesaji').text("Bu iş yeri adı kullanılıyor.");
							$('#hatamodal').modal('show');
							document.getElementById("musteri").classList.add('hata');
							
						}else if(data == 3){
							$('.hatamesaji').text("");
							document.getElementById("musteri").classList.remove('hata');
							document.getElementById("basarili").classList.remove('none');
							$('#hatamodal').modal('show');

						}else{
							$('.hatamesaji').text("Bir hata oluştu.");
							$('#hatamodal').modal('show');
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}else{
		alert("Boş alanlar var.");
	}
}

</script>
<?php
if(isset($_GET['musteri']) ){
	$musteri=@$_GET['musteri'];
	$stmt = $db->prepare("SELECT * FROM musteriler where userID=$musteri");
					$stmt->execute();	
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$musteri_id=$row['m_id'];
}else{
	header('Location: musterilerim.php');
}
?>
<div class="container ana">
		<div class="col-md-10 col-md-offset-1 well" >
  
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active"  id="fb">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Müşteri Bilgileri">
                            <span class="round-tab" >
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" id="sb">
                        <a href="#step2" data-toggle="tab"  aria-controls="step2" role="tab" title="Bakiye Bilgileri">
                            <span class="round-tab" id="maasbilgileri">
                                <i class="fa fa-credit-card"></i>
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </div>

			
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
						<form role="form" method="post" id="musteriguncelle" action="" onsubmit="return false;" >
							<input type="text" name="m_id" id="m_id" class="form-control input-lg none" value="<?php echo $row['m_id']; ?>" required  disabled="true">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<label >İş Yeri:</label>
										<input type="text" name="musteri" id="musteri" onClick="temizmusteri()" class="form-control input-lg" value="<?php echo $row['musteri']; ?>" required  disabled="true">
									</div>
								</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
									  <div class="form-group">
										<label >İş Yeri Sahibi:</label>
										<input type="text" name="sahibi" required class="form-control" value="<?php echo $row['sahibi']; ?>" disabled="true">
									  </div>
									</div>
							</div>

							
							<div class="row">
								<div class="col-xs-6 col-sm-4 col-md-4">
								  <div class="form-group">
									<label >İş Tel:</label>
									<input type="number" name="istel" maxlength="11"  pattern="[0-9]{11}" title="Örnek: 03822123344" class="form-control" value="<?php echo $row['is_tel'];  if($row['is_tel']==""){echo " İş telefonu girilmemiş.";} ?>" disabled="true">
								  </div>
								</div>
								<div class="col-xs-6 col-sm-4 col-md-4">
									<div class="form-group">
										<label >Cep Tel:</label>
										<input type="number" name="ceptel" maxlength="11"  pattern="[0-9]{11}" title="Örnek: 05556667788" class="form-control" value="<?php echo $row['cep_tel']; if($row['cep_tel']==""){echo " Cep telefonu girilmemiş.";} ?>" disabled="true">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4">
								  <div class="form-group">
										<label >Hangi Listede:</label>
										<select  name="liste" id="liste" class="form-control form" required disabled="true">
											
											<?php
												$stmt = $db->prepare("SELECT * FROM guzergahlar");
												$stmt->execute();	
												while( $liste = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
											?>
											<option value="<?php echo $liste['guzergah_id']; ?>" <?php if($liste['guzergah_id']== $row['liste']){echo "selected";} ?> ><?php echo $liste['guzergah_adi']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
								   <div class="form-group">
										<label >Adres:</label>
										<input type="text" name="adres" class="form-control" value="<?php echo $row['m_adres']; ?>" disabled="true">
								   </div>
								</div>

							</div>
						</form>
					<hr/>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<button type="submit" name="temiz" id="temiz" class="btn btn-success pull-right" onClick="temizle();" >Güncelle</button>
								<input type="submit" name="kydt"  id="kydt"  class="btn btn-success pull-right none" onClick="kaydet();" value="Kaydet" style="height:50px; margin-top:0; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 300;" />
								<a href="kullanici-detay.php?kullanici=<?php echo $row['userID']; ?>"><i class="fa fa-arrow-left"></i> Kullanıcı bilgilerine git!</a>
							</div>					
						</div>
                    </div>
                    
					<div class="tab-pane" role="tabpanel" id="step2">
						
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>	
										<th>S.N.</th>
										<th class="gri1">Tarih</th>
										<th class="darkblue">Tutar</th>
										<th class="green">Teslim</th>
										<th class="red">Kalan</th>
									</tr>
								</thead>
								<tbody >
								
						<?php		
						$yapilan_servisler = $db->prepare("SELECT * FROM satishesaptakip where musteri_id=$musteri_id order by sht_id DESC");
						$yapilan_servisler->execute();									
							$sayi=0;
							$geneltutar=0;
							$alinanparalartoplami=0;
							while( $yservis = $yapilan_servisler->fetch(PDO::FETCH_ASSOC) ) { 
							?>
							<tr>
								<td ><?php echo $sayi+=1; ?></td>
								<td class="gri1" ><?php echo $yservis['tarih']; ?></td>
								<td class="darkblue" ><?php echo $yservis['tutar']; ?></td>
								<td class="green"><?php echo $yservis['alinan']; ?></td>
								<td class="red"><?php echo $yservis['tutar']-$yservis['alinan']." TL"; ?></td>
							</tr>
							<?php 
							
								$geneltutar = $geneltutar + $yservis['tutar']; 
								$alinanparalartoplami = $alinanparalartoplami + $yservis['alinan'];
							?>
							<?php } ?>
							</tbody>
							</table>	
						</div>
						<hr/>
						<div class="row text-center">
							<div class="col-md-4 col-sd-4 col-xs-12">
								<label>Tutarlar Toplamı:<b class="darkblue f20"> <?php echo $geneltutar; ?></b> TL</label>
							</div>
							<div class="col-md-4 col-sd-4 col-xs-12">
								<label>Teslimler Toplamı:<b class="green f20"> <?php echo $alinanparalartoplami; ?></b> TL</label>
							</div>
							<div class="col-md-4 col-sd-4 col-xs-12">
								<label>Kalan Bakıye:<b class="red f20"> <?php echo $geneltutar - $alinanparalartoplami; ?></b> TL</label>
							</div>
							
							
							
						</div>
				
                    </div>

                   
                    <div class="clearfix"></div>
                </div>
            
        </div>
    </section>
	
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