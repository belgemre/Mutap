<?php include 'header.php'; ?>
<?php $sayi=1; $geneltutar=0;  ?>
<script>
 function eklebtnn(){
	 	
	var bsid = $('input[name=bsidmiz]').val();
	var musteri = $('input[name=musterimiz]').val();
	var urun = document.getElementById("verilenurun").value;
	var adet = $('input[name=verilenadet]').val();

	if(bsid!="" && musteri!="" && urun != ""  && adet != "" ){

					        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#verilenurunler').serialize(),
					success:function(data){
						if(data == 1){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Seçilen ürün zaten bu müşteriye verilmiş. Güncellemeyi deneyiniz.");
							$('#hatamodal').modal('show');
						}else if(data == 2){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Seçilen ürün araçta yok ya da bu miktarda yok!");
							$('#hatamodal').modal('show');
						}else if(data == 3){
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
 
 function kayitbtnn(){
	 	
	var bsidhesap = $('input[name=bsidhesap]').val();
	var musterihesap = $('input[name=musterihesap]').val();
	var tutar = $('input[name=tthesap]').val();
	var apara = $('input[name=apara]').val();

	if(bsidhesap!="" && musterihesap!="" && tutar != ""  && apara != "" ){

					        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#alinanpara').serialize(),
					success:function(data){
						if(data == 1){
							window.history.back(-1);
						}else{
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Beklenmedik bir hata oluştu");
							$('#hatamodal').modal('show');
							
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}
 }
 function guncellbtnn(){
	 
	var bsidd = $('input[name=bsidmiz]').val();
	var musterii = $('input[name=musterimiz]').val();
	var aparaa = $('input[name=apara]').val();
	
	if(bsidd!="" && musterii!="" && aparaa != ""){

					        $.ajax({
					type:'POST',
					url:'guncellemeler.php',
					data:{bsidd:bsidd,musteriid:musterii,aparaa:aparaa},
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text("");
							$('#hatamodal').modal('show');
							document.getElementById("basarili").classList.remove('none');
							location.reload();
						}else{
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text("Beklenmedik bir hata oluştu");
							$('#hatamodal').modal('show');
							
						}
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
		
		if(isset($_GET['bs_id'])  && isset($_GET['musteri']) ){
			
			$bs_id = trim(@$_GET['bs_id']);
			$musteri_id = trim(@$_GET['musteri']);

			$stmt = $db->prepare("SELECT * FROM yapilanservisler A JOIN serviscesit B where A.servis_id=B.servis_id and A.bs_id = $bs_id ");
			$stmt->execute();
			$serviscesit = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$stmtt = $db->prepare("SELECT * FROM musteriler where m_id = $musteri_id ");
			$stmtt->execute();
			$musteri = $stmtt->fetch(PDO::FETCH_ASSOC);
			
			$stmttt = $db->prepare("SELECT arac_id FROM yapilanservisler where bs_id = $bs_id ");
			$stmttt->execute();
			$araclar = $stmttt->fetch(PDO::FETCH_ASSOC);
			$arac_id=$araclar['arac_id'];
			
			date_default_timezone_set('Europe/Istanbul');
			$tarih =  date('d.m.Y');
			
											
		}else{
			header('Location: arabayaatilan-ayar.php');
		}
						
?>
		
	    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well" >
			<span class="f16 gri"><b class="red"><?php echo $serviscesit['servis_adi']; ?></b> Servisinde, <b class="red"><?php echo $musteri['musteri']?></b> Müşterisine Verilen Ürünler Tablosu<i class="fa fa-filter pull-right"></i></span>
		    <div style="clear:both"></div><hr class="m5top m5bottom" />		
		<form role="form" method="post" id="verilenurunler" action="" onsubmit="return false;" >

			<input type="text" class="form-control none" name="bsidmiz" id="bsidmiz" value="<?php echo $bs_id; ?>" />
			<input type="text" class="form-control none" name="musterimiz" id="musterimiz" value="<?php echo $musteri_id;?>" />

			<div class="row">
				 <div class="col-xs-12 col-sm-4 col-md-4" >
						<div class="form-group">
							<label >Ürün:</label>
									<select class="form-control form country" name="verilenurun" id="verilenurun" required >
										<option value="" >Ürün Seç</option>
										<?php
											
											$stmt = $db->prepare("SELECT * FROM urunler ");
											$stmt->execute();	
											while( $urunler = $stmt->fetch(PDO::FETCH_ASSOC) ) {
											$urun_id=$urunler['urun_id'];
											
											$urun_sorgu = $db->prepare("SELECT * FROM arabayaatilan 
												where 
												tarih='$tarih' and 
												arac_id=$arac_id and
												urun_id= $urun_id
											");
											$urun_sorgu->execute();
											if(!$urun_sorgu->rowCount()){ ?>
																						
											<?php }else{ ?>
											<option value="<?php echo $urun_id; ?>" ><?php echo $urunler['urun_adi']; ?></option>
											<?php }
											} ?>
									</select>
						</div>
								
				</div>
				 <div class="col-xs-12 col-sm-4 col-md-4" >
					<div class="form-group">
							<label >Miktar:</label>
							<input type="number" class="form-control" name="verilenadet" placeholder="250" required />
					</div>
				</div>
		
				 <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
						<button type="submit" name="ekle" id="eklebtn" onClick="eklebtnn()" class="btn btn-primary btn-lg btn-block" style="margin-top:25px">Ekle</button>
					</div>
				</div>
			</div>
		</form>	
			<?php 
			$verilen_sorgu = $db->prepare("SELECT * FROM satisdetaylari 
			where 
			bs_id=$bs_id && 
			musteri_id=$musteri_id
			");
			$verilen_sorgu->execute();

			if($verilen_sorgu->rowCount()){
						
					?>
				<div class="table-responsive">
				
					<table class="table " cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Sil</th>
								<th>Ürün Adı</th>
								<th>Birim Miktar</th>
								<th>Birim Fiyat</th>
								<th>KDV</th>
								<th>Tutar</th>
								

							</tr>
						</thead>
						<tbody >
					<?php
						
						$stmt = $db->prepare("SELECT * FROM satisdetaylari A JOIN urunler B ON A.urun_id=B.urun_id where A.tarih='$tarih' and A.bs_id=$bs_id and A.musteri_id=$musteri_id");
						$stmt->execute();
					while( $musteriyeverilen = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
					?>
							<tr class="btnDelete" data-id="<?php echo $musteriyeverilen['sd_id']; ?>">
								<td ><label ><?php echo $sayi; ?></label></td>
								<td><a class="btnDelete" href=""><i class="fa fa-trash bordo"></i></a></td>
						
								<td><label><?php echo $musteriyeverilen['urun_adi']; ?></label></td>
								<td>
									<a href="#" data-toggle='modal' data-target='.bs-example-modal-sm-guncelle<?php echo $sayi; ?>'><i class="fa fa-pencil"></i></a>
									<label><?php echo $musteriyeverilen['adet']; ?></label>
									<label><?php echo $musteriyeverilen['birimi']; ?></label>
									
								</td>
								<td><label><?php echo $musteriyeverilen['satis_fiyati']." TL"; ?></label></td>
								<td><label>%18</label></td>
								
								<?php $tutar=$musteriyeverilen['adet'] * $musteriyeverilen['satis_fiyati']; ?>
								
								<td><label><?php echo $tutar." TL"; ?></label></td>
							</tr>
					
							<!-- VERİLEN ÜRÜN MİKTAR GÜNCELLE MODAL-->
							<?php include 'modal/verilenurunguncelle.php';?>
					<?php 
					$sayi=$sayi+1; 
  
					$geneltutar=$geneltutar+$tutar; 
					} ?>
					</tbody>
					</table>
					
				</div><!--Responsive Table Son-->
				
				<div class="pull-right">
					<label class="pull-right" >Toplam:<b class="gri2 f18"> <?php echo $geneltutar-($geneltutar*0.18); ?></b> TL</label><br />
					<label class="pull-right" >Kdv:<b class="gri f18"> <?php echo $geneltutar*0.18; ?></b> TL</label><br />
					<label class="pull-right" >Genel Toplam:<b class="gri1 f18"> <?php echo $geneltutar; ?></b> TL</label><br />
					<?php 
						$alpara = $db->prepare("SELECT * FROM satishesaptakip where bs_id=$bs_id and musteri_id=$musteri_id ");
						$alpara->execute();
						$malinanpara = $alpara->fetch(PDO::FETCH_ASSOC);
						$teslim=$malinanpara['alinan'];
						if($teslim!=""){
					?>
					<label class="pull-right" >Teslim:<b class="green f18"> <?php echo $teslim; ?></b> TL</label><br />
					<label class="pull-right" >Kalan:<b class="red f18"> <?php echo $geneltutar-$teslim; ?></b> TL</label>
						<?php } ?>
				</div>
			<?php } ?>
		</div>
		<?php if($verilen_sorgu->rowCount()){
						
					?>
		<!--Alınan Para Kısmı-->	
		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well">
				
			<form role="form" method="post" id="alinanpara" action="" onsubmit="return false;" >

				<input type="text" class="form-control none" name="bsidhesap" id="bsidhesap" value="<?php echo $bs_id; ?>" />
				<input type="text" class="form-control none" name="musterihesap" id="musterihesap" value="<?php echo $musteri_id;?>" />

				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 none" >
						<div class="form-group">
								<label >Tutarlar Toplamı (TL):</label>
								<input type="number" class="form-control" name="tthesap" value="<?php echo $geneltutar; ?>" required />
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6" >
						<div class="form-group">
								<label >Alınan Para (TL):</label>
								<input type="number" class="form-control" name="apara" placeholder="<?php if($teslim!=""){echo $teslim;}else{echo 250.50;} ?>" required />
						</div>
					</div>
			
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<?php if($teslim!=""){ ?>
								<button type="submit" name="btngncl" id="btngncl" onClick="guncellbtnn()" class="btn btn-danger btn-lg btn-block" style="margin-top:25px">Teslim Güncelle</button>
							<?php }else{ ?>
								<button type="submit" name="kaydet" id="kydtbtn" onClick="kayitbtnn()" class="btn btn-success btn-lg btn-block" style="margin-top:25px">Kaydet ve Bitir</button>
							<?php } ?>
						</div>
					</div>
				</div>
			</form>
			
		</div><!--Alınan Para Kısmı Son-->
		<?php } ?>
		<?php include 'modal/arabadakiurunler.php';?><!--Arabadaki Ürünler Modal -->
		
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
											data:'VerilenUrunSilId='+id,
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
<?php include 'modal/hatamodal.php';?>
<?php include 'footer.php'; ?>
