<?php include 'header.php'; ?>
<script>
function kaydet(){
	var musterisec = document.getElementById("musterisec").value;
	var urunsec = document.getElementById("urunsec").value;
	var fiyatver = $('input[name=fiyatver]').val();
	var tarih = $('input[name=tarih]').val();
	
	
	if(musterisec!="" 
	&& urunsec!="" 
	&& fiyatver != "" 
	&& tarih != "" 
	){
		 $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#ozelfiyat').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text(" Bu müşteriye bu ürün bugün zaten tanımlanmış. Dilerseniz aşağıdaki tablodan güncelleyebilirsiniz!");
						}else if(data == 2){
							$('.hatamesaji').text("");
							document.getElementById("basarili").classList.remove('none');
							setTimeout(function (){
												window.location.replace("ozel-fiyat.php");
							},2000);

						}else{
							alert("Kayıt sırasında bir hata oluştu!.");
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;
       
	}
	
	
}
</script>

<div class="container ana">


	    <div class="col-xs-12 col-sm-12 col-md-12 well" >
					<span class="f18 gri "><b>Müşteri - Ürün - Fiyat </b> Belirle <b class="red">|</b> <small> Müşterilerinize herhangi bir ürün için <b class="red">özel fiyat</b> verebilirsiniz.</small> <i class="fa fa-try pull-right"></i></span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="ozelfiyat" action="" onsubmit="return false;" >


				<div class="row">
					<div class="col-xs-12 col-md-3 col-sm-3 m5bottom">
						<label >Müşteri:</label>
						<select  name="musterisec" id="musterisec" class="form-control form" required tabindex="1">
							<option value="">Müşteri Seç</option>
							<?php
		
									$stmt = $db->prepare("SELECT * FROM musteriler");
									$stmt->execute();
									
								while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
								?>
								<option value="<?php echo $row['m_id']; ?>"><?php echo $row['musteri']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-xs-12 col-md-3 col-sm-3 m5bottom">
						<label >Ürün:</label>
						<select  name="urunsec" id="urunsec" class="form-control form" required tabindex="1">
							<option value="">Ürün Seç</option>
							<?php
		
									$stmt = $db->prepare("SELECT * FROM urunler");
									$stmt->execute();
									
								while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
								?>
								<option value="<?php echo $row['urun_id']; ?>"><?php echo $row['urun_adi']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-xs-12 col-md-2 col-sm-2 m5bottom">
						<label >Fiyat (TL):</label>
						<input type="text" class="form-control" name="fiyatver" placeholder="18.75" required />
					</div>
					<div class="col-xs-12 col-md-2 col-sm-2 m5bottom">
						<label >Başlangıç Tarihi:</label>
						<input type="date"  class="form-control" name="tarih" required />
					</div>
					<div class="col-xs-12 col-md-2 col-sm-2 m5bottom">
						<button type="submit" onClick="kaydet();" name="submit" id="kaydetbtn" class="btn btn-primary btn-block btn-lg" style="margin-top:25px;" tabindex="5">Tanımla!</button>
					</div>
					
				
				</div>

			</form>
			

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 text-center m15top">
			<span class="basarili none" id="basarili"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
			<p class=""><label class="hatamesaji red m5left" id="hatamesaji" ></label></p>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-12 well" >
					<span class="f18 gri ">Son tanımlanan Müşteri - Ürün - Fiyat Tablosu</span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
							<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Müşteri Adı</th>
							<th>Ürün Adı</th>
							<th>Fiyat</th>
							<th title="Başlangıç Tarihi">Başlama Tarihi</th>
							<th>Sil</th>

						</tr>
					</thead>
					<tbody >
				<?php
					
					$stmt = $db->prepare("SELECT A.fiyat,A.tarih,B.musteri,C.urun_adi FROM ozelfiyat A, musteriler B, urunler C where A.musteri_id=B.m_id and A.urun_id=C.urun_id order by ozelfiyat_id DESC");
					$stmt->execute();
					$sayi=0;
				while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
				?>

				<tr>
					<td ><?php echo $sayi=$sayi+1; ?></td>
					<td ><?php echo $row['musteri']; ?></td>
					<td ><?php echo $row['urun_adi']; ?></td>
					<td ><?php echo $row['fiyat']; ?></td>
					<td ><?php echo $row['tarih']; ?></td>
					<td >Sil</td>
					

				</tr>
				<?php } ?>
				</tbody>
				</table>	
			</div>
		
		 </div>
		
	</div><!----- Container Son ---->

<?php include 'footer.php'; ?>
        