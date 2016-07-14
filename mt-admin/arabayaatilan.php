<?php include 'header.php'; ?>
<?php $sayi=1; ?>
<script>
 function eklebtnn(){
	 	
	var servistur = $('input[name=servistur]').val();
	var servisci = $('input[name=servisci]').val();
	var arac = $('input[name=arac]').val();
	var urun = document.getElementById("urun").value;
	var adet = $('input[name=adet]').val();


	
	
	
	if(servistur!="" && arac != "" && urun != ""  && adet != "" ){

					        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#arabayaatilanlar').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text("Seçilen ürün zaten seçilen arabaya atılmış. Güncellemeyi deneyiniz.").fadeIn(0).fadeOut(5000);
						}else if(data == 2){
							$('.hatamesaji').text("");
							location.reload();
						}else{
							alert("Beklenmedik bir hata oluştu!");
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}else{
		alert("Boş alanlar var.");
	} 
 }
 function guncelle(){
	var servistur = $('input[name=servistur]').val();
	var arac = $('input[name=arac]').val();
	var guncelservisci = document.getElementById("guncelservisci").value;
	
	
	if(servistur!="" && guncelservisci != "" && arac != ""){
		  $.ajax({
					type:'POST',
					url:'guncellemeler.php',
					data:$('#servisciguncelle').serialize(),
					success:function(data){
						if(data == 1){
							location.reload();
						}else{
							alert("Beklenmedik bir hata oluştu!");
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;
		
	}else{
		document.getElementById("guncelservisci").classList.add('hata');
	}
	
 }
 
 function guncelservistemiz(){
	 document.getElementById("guncelservisci").classList.remove('hata');
 }
 
 function servisbaslat(){
	var servistur = $('input[name=servis_turu]').val();
	var servisci = document.getElementById("servisci").value;
	var arac = $('input[name=arac]').val();
	var guzergah = document.getElementById("guzergahtur").value;
	if(servistur!="" && servisci!="" && arac!="" && guzergah !=""){
		
		$.ajax({
					type:'POST',
					url:'function.php',
					data:$('#servisbasladiform').serialize(),
					success:function(data){
							window.location.href = 'servis-basladi.php?bs_id='+data;
						},
					error:function(){alert("Başarısız");}
        });
		return false;
		
		
	}
	 
 }
 
</script>

<div class="container ana">
		<?php 
		date_default_timezone_set('Europe/Istanbul');
		$tarih =  date('d.m.Y');
		
		if(isset($_POST['servistur'])  && isset($_POST['arac']) ){
			
			$servisturu = trim(@$_POST['servistur']);
			$arac = trim(@$_POST['arac']);

			$stmt = $db->prepare("SELECT * FROM serviscesit where servis_id = $servisturu ");
			$stmt->execute();	
			$serviscesit = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$stmt = $db->prepare("SELECT * FROM araclar where atipi='Servis' and arac_id=$arac ");
			$stmt->execute();	
			$araclar = $stmt->fetch(PDO::FETCH_ASSOC);
											
		}else{
			header('Location: arabayaatilan-ayar.php');
		}
						
?>
		<!--Bilgi Mesajı-->
		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1" >
			<div class="alert alert-warning alert-dismissible row" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Ürünleri ekleyin, servisçinizi ve güzergahınızı seçtikten sonra bu servisi başlatın. </strong>	 
			</div>
		</div><!--Bilgi Mesajı Son-->
	    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well" >
			<span class="f16 gri"><b class="red"><?php echo $serviscesit['servis_adi']; ?></b> Servisinde, <b class="red"><?php echo $araclar['marka']." ".$araclar['model'] ; ?></b> Aracına Yüklenen Ürünler Tablosu<i class="fa fa-filter pull-right"></i></span>
		    <div style="clear:both"></div><hr class="m5top m5bottom" />		
		<form role="form" method="post" id="arabayaatilanlar" action="" onsubmit="return false;" >
			<div class="row">
				     <div class="col-xs-4 col-sm-4 col-md-4" >
						 <div class="form-group">
							<input type="text" class="form-control none" name="servistur" id="servistur" value="<?php echo $servisturu; ?>" />
						</div>
				     </div>
					 <div class="col-xs-4 col-sm-4 col-md-4" >
						<div class="form-group">

							<input type="text" class="form-control none" name="arac" id="arac" value="<?php echo $arac;?>" />
						</div>
				     </div>
			</div>
			<div class="row">
				 <div class="col-xs-4 col-sm-4 col-md-4" >
						<div class="form-group">
							<label >Ürün:</label>
									<select class="form-control form country" name="urun" id="urun" required >
										<option value="" >Ürün Seç</option>
										<?php
											$stmt = $db->prepare("SELECT * FROM urunler ");
											$stmt->execute();	
											while( $urunler = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
										?>
										<option value="<?php echo $urunler['urun_id']; ?>" ><?php echo $urunler['urun_adi']; ?></option>
										<?php } ?>
									</select>
						</div>
								
				</div>
				 <div class="col-xs-4 col-sm-4 col-md-4" >
					<div class="form-group">
							<label >Miktar:</label>
							<input type="number" class="form-control" name="adet" placeholder="250" required />
					</div>
				</div>
		
				 <div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						<button type="submit" name="ekle" id="eklebtn" onClick="eklebtnn()" class="btn btn-primary btn-lg btn-block" style="margin-top:25px">Kaydet</button>
					</div>
				</div>
			</div>
			<div class="text-center">
				<p class=""><label class="hatamesaji red m15top" id="hatamesaji" ></label></p>
			</div>
		</form>	
		
				<div class="table-responsive">
				
					<table class="table " cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Sil</th>
								<th>Ürün Adı</th>
								<th>Birim Miktar</th>
								

							</tr>
						</thead>
						<tbody >
					<?php
						
						$stmt = $db->prepare("SELECT * FROM arabayaatilan A JOIN urunler B ON A.urun_id=B.urun_id where A.tarih='$tarih' and A.servis_id=$servisturu and A.arac_id=$arac");
						$stmt->execute();
					while( $arabayaatilan = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
					?>
							<tr class="btnDelete" data-id="<?php echo $arabayaatilan['id']; ?>">
								<td ><label ><?php echo $sayi; ?></label></td>
								<td><a class="btnDelete" href=""><i class="fa fa-trash bordo"></i></a></td>
						
								<td><label><?php echo $arabayaatilan['urun_adi']; ?></label></td>
								<td>
									<a href="#" data-toggle='modal' data-target='.bs-example-modal-sm-guncelle<?php echo $sayi; ?>'><i class="fa fa-pencil"></i></a>
									<label><?php echo $arabayaatilan['adet']; ?></label>
									<label><?php echo $arabayaatilan['birimi']; ?></label>
									
								</td>
								
							</tr>
					
							<!-- ÜRÜN MİKTAR GÜNCELLE MODAL-->

							<div class="modal fade bs-example-modal-sm-guncelle<?php echo $sayi; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								   <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Ürün Güncelle</h4>
								  </div>
								  <div class="modal-body">
									<form role="form" method="post" id="aaguncelle<?php echo $sayi; ?>" action="" onsubmit="return false;" >
									
										<input type="text" class="none" name="aagid<?php echo $sayi; ?>" value="<?php echo $arabayaatilan['id']; ?>" />
										<div class="form-group">
											<label>Ürün Adı :</label>
											<input type="text" class="form-control" value="<?php echo $arabayaatilan['urun_adi']; ?>" disabled />
										</div>
										<div class="form-group">
											<label>Adet / kg / koli :</label>
											<input type="text" class="form-control" name="gadet<?php echo $sayi; ?>" id="gadet<?php echo $sayi; ?>" onClick="temizadet<?php echo $sayi; ?>()" placeholder="Adet / koli / kg" name="adetguncel" />
										</div>
									</form>
									
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-success btn-block" onClick="aguncelle<?php echo $sayi; ?>()">GÜNCELLE</button>
								  </div>
								</div>
							  </div>
							</div>	
							<script>
													
							function aguncelle<?php echo $sayi; ?>(){
								var aagid<?php echo $sayi; ?> = $('input[name=aagid<?php echo $sayi; ?>]').val();
								var gadet<?php echo $sayi; ?> = $('input[name=gadet<?php echo $sayi; ?>]').val();
								
								if(aagid<?php echo $sayi; ?>!="" && gadet<?php echo $sayi; ?>!="" ){
								  $.ajax({
											type:'POST',
											url:'guncellemeler.php',
											data:{gid:aagid<?php echo $sayi; ?>,gadet:gadet<?php echo $sayi; ?>},
											success:function(data){
												if(data == 1){
													location.reload();
												}else{
													alert("Beklenmedik bir hata oluştu!");
												}
												},
											error:function(){alert("Başarısız");}
								});
								return false;
								
								}else{
									document.getElementById("gadet<?php echo $sayi; ?>").classList.add('hata');
								}
							}
							function temizadet<?php echo $sayi; ?>(){
								document.getElementById("gadet<?php echo $sayi; ?>").classList.remove('hata');
							}
							
							
							</script>
					<?php $sayi=$sayi+1; } ?>
					</tbody>
					</table>
				</div><!--Responsive Table Son-->
		</div>
		
		<!--Servis Bilgileri Seçimi-->		
		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well" >
	
			<form role="form" method="post" id="servisbasladiform" action="" onsubmit="return false;" >	
				<div class="row">
	
					<input type="text" class="none" name="servis_turu" value="<?php echo $servisturu; ?>" />				
					<input type="text" class="none" name="arac" value="<?php echo $arac; ?>" />				

					<div class="col-xs-12 col-sm-12 col-md-4" >
							<div class="form-group">
								<label >Servisçi:</label>
								<select  name="servisci" id="servisci" class="form-control form" required>
									<option value="" >Servisçi Seç</option>
									<?php
										$stmt = $db->prepare("SELECT * FROM personel where rol=2");
										$stmt->execute();
										
										while( $personel = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
											
											$perid = $personel['userID'];
											
											$servisci_sorgu = $db->prepare("SELECT * FROM yapilanservisler 
												where 
												servisci_id=$perid and 
												durum=0
											");
											$servisci_sorgu->execute();

											if(!$servisci_sorgu->rowCount()){ ?>
												<option value="<?php echo $personel['userID']; ?>" ><?php echo $personel['adi']." ".$personel['soyadi']; ?></option>		
											<?php }else{ ?>
												<option value="" disabled ><?php echo $personel['adi']." ".$personel['soyadi']." - Serviste..."; ?></option>
												
										<?php	}		
										} ?>
								</select>
							</div>			
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4" >
							<div class="form-group">
								<label >Güzergah Türü :</label>
								<select  name="guzergahtur" id="guzergahtur" class="form-control form" required>
									<option value="" >Güzergah Türü Seç</option>
									<?php
										$stmt = $db->prepare("SELECT * FROM guzergahlar");
										$stmt->execute();	
										while( $serviscesit = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
									?>
										<option value="<?php echo $serviscesit['guzergah_id']; ?>" ><?php echo $serviscesit['guzergah_adi']." - ".$serviscesit['tanim']; ?></option>
									<?php } ?>
								</select>
							</div>			
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4" >
						<div class="form-group">
							<button type="submit" style="margin-top:25px;" onClick="servisbaslat()" class="btn btn-primary btn-lg btn-block">Bu Servisi Başlat</button>
						</div>
					</div>
				</div>

			</form>	

		</div><!--Servis Bilgileri Seçimi Son-->
	</div><!----- Container Son ---->
	
<!-- Small modal SİL-->
<?php include 'modal/silmodal.php'; ?>
					
							
<script>
$('a.btnDelete').on('click', function (e) {
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    $('#silmodal').data('id', id).modal('show');
});

$('#btnDelteYes').click(function () {
    var id = $('#silmodal').data('id');
	if(id!=""){
								  $.ajax({
											type:'POST',
											url:'sil.php',
											data:'id='+id,
											success:function(data){
												if(data == 1){
													$('#silmodal').modal('hide');
													$('[data-id=' + id + ']').animate({ backgroundColor: "#fbc7c7" }, "fast")
													.animate({ opacity: "hide" }, "slow");
												}else{
													alert("Beklenmedik bir hata oluştu!");
												}
												},
											error:function(){alert("Başarısız");}
								});
								return false;
								
							}else{
								alert("boş var");
							}
	
    
});
</script>
<?php include 'footer.php'; ?>