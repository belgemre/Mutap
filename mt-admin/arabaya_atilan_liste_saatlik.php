<?php include 'header.php'; ?>
<?php 
	
	date_default_timezone_set('Europe/Istanbul'); 
	$tarih =  date('d.m.Y');
	
	if(isset($_POST['bas'])){
		$trh=trim(@$_POST['trh']);	
		function tarihDuzenle($trh){
			return implode('.',array_reverse(explode('-',$trh)));
		}
		$tarih=tarihDuzenle($trh);
		
	}
	
	
 ?>
 <script>
$(document).ready(function() {
		$('#wait').hide();
        $('#urunlerid').multiselect({
			nonSelectedText: 'Ürün Seç',
			allSelectedText: 'Bütün Ürünler',
			buttonWidth: '100%',
			enableCaseInsensitiveFiltering: true,
            includeSelectAllOption: true
        });
		$("#urunlerid").multiselect('selectAll', false);
		$("#urunlerid").multiselect('updateButtonText');

		var urunler = $.map($('.urunler option:selected'), function(ele) {
			return ele.value; 
		});
		var servisturleri = $.map($('.servisturleri option:selected'), function(ele) {
			return ele.value; 
		});
		var araclar = $.map($('.araclar option:selected'), function(ele) {
			return ele.value; 
		});
		var tarih = $('input[name=trhdetay]').val();

		if(urunler!="" && servisturleri!="" && araclar!="" && tarih!=""){
			
			$.ajax({
						type:'POST',
						url:'raporlar-kontrol.php',
						data:{urunler2: urunler, servisturleri2: servisturleri, araclar2:araclar, trh2:tarih },
						beforeSend: function() { $('#wait').show(); },
						success:function(data){
							$('.dell').html(data);
							},
						error:function(){alert("Başarısız");}
			});
			return false;
			
		}else{
			
			document.getElementById("hatamesaj").classList.remove('none');
		}
});

 function bakalimin(){
	 
	var urunler = $.map($('.urunler option:selected'), function(ele) {
	return ele.value; 
	});
	var servisturleri = $.map($('.servisturleri option:selected'), function(ele) {
	return ele.value; 
	});
	var araclar = $.map($('.araclar option:selected'), function(ele) {
	return ele.value; 
	});
	var tarih = $('input[name=trhdetay]').val();
	
	
	
	if(urunler!="" && servisturleri!="" && araclar!="" && tarih!=""){
		
		$.ajax({
					type:'POST',
					url:'raporlar-kontrol.php',
					data:{urunler2: urunler, servisturleri2: servisturleri, araclar2:araclar, trh2:tarih },
					beforeSend: function() { $('#wait').show(); },
					success:function(data){
						$('.dell').html(data);
						},
					error:function(){alert("Başarısız");}
        });
		return false;
		
	}else{
		
		$('.dell').html('Boş geçilemez alanı boş geçtiniz!');
		
	}
	
	
	
 }
 </script>
<div class="container ana">
	<div class="col-md-3 col-sm-3 col-xs-12">
		<div class="well">
		<span class="f18 gri">Listelenen Kriterler <i class="fa fa-filter pull-right"></i></span>
		<div style="clear:both"></div><hr class="m5top m5bottom" />
				
					<form action="" method="post" onsubmit="return false;">
						<div class="form-group">
							<label >Ürün:</label>
							<select  name="urunsec" id="urunlerid" onChange="bakalimin()" multiple="multiple"  class="urunler">
									
									<?php
				
											$stmt = $db->prepare("SELECT * FROM urunler");
											$stmt->execute();
											
										while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
										?>
										<option value="<?php echo $row['urun_id']; ?>"><?php echo $row['urun_adi']; ?></option>
									<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label >Servis Türü:</label>
							<select  name="servissec" id="servisid" onChange="bakalimin()" class="servisturleri form-control form">
								
								<?php
			
										$stmt = $db->prepare("SELECT * FROM serviscesit");
										$stmt->execute();
										
									while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
									?>
									<option value="<?php echo $row['servis_id']; ?>"><?php echo $row['servis_adi']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label >Araç:</label>
							<select  name="aracsec" id="araclarid" onChange="bakalimin()" class="araclar form-control form">
								
								<?php
			
										$stmt = $db->prepare("SELECT * FROM araclar where atipi='Servis'");
										$stmt->execute();
										$say= $stmt->rowCount();
										while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
									?>
									
									<option value="<?php echo $row['arac_id']; ?>"><?php echo $row['marka']." ".$row['model']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label >Tarih:</label>
							<input type="date" id="trhdetay" onChange="bakalimin()"  class="form-control" name="trhdetay" value="<?php if(isset($_POST['trhdetay'])){ echo $_POST['trhdetay'];  }else{ echo date('Y-m-d'); } ?>" required />
						</div>
					</form>	
		
				
		</div>
	</div>
	
	<div class="col-md-9 col-sm-9 col-xs-12">
		<div class="well dell">
	       
		   <!--İçerik buraya geliyor!-->
			<div id="wait" class="text-center"><img src="../images/loading.gif" /></div>
		</div>

	</div>

</div>

<?php include 'footer.php'; ?>