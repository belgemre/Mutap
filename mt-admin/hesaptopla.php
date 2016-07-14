<?php include 'header.php'; ?>
 
<script src="../js/jquery-ui.js"></script>

<script>
$(document).ready(function() {
	var guzergah = $.map($('.guzergah option:selected'), function(ele) {
	return ele.value; 
	});

	if(guzergah!=""){
		
		$.ajax({
					type:'POST',
					url:'function.php',
					data:{guzergahHesap: guzergah},
					beforeSend: function() { $('#wait').show(); },
					success:function(data){
						$('#liste').html(data);
						},
					error:function(){alert("Başarısız");}
        });
		return false;
		
	}else{
		
		$('#liste').html('Boş geçilemez alanı boş geçtiniz!');
		
	}
});
 function bakalimin(){

	var guzergah = $.map($('.guzergah option:selected'), function(ele) {
	return ele.value; 
	});

	if(guzergah!=""){
		
		$.ajax({
					type:'POST',
					url:'function.php',
					data:{guzergahHesap: guzergah},
					beforeSend: function() { $('#wait').show(); },
					success:function(data){
						$('#liste').html(data);
						},
					error:function(){alert("Başarısız");}
        });
		return false;
		
	}else{
		
		$('#liste').html('Boş geçilemez alanı boş geçtiniz!');
		
	}
	
	
	
 }
 </script>
<div class="container ana">
	<div class="col-md-3 col-sm-3 col-xs-12">
		<div class="well">
		<span class="f18 gri">Listelenen Güzergah <i class="fa fa-filter pull-right"></i></span>
		<div style="clear:both"></div><hr class="m5top m5bottom" />
				
			<form role="form" method="post" id="guzergahcesit" action="" onsubmit="return false;" >
				<div class="form-group">
							<select  name="guzergahsec" id="guzergahsec" onChange="bakalimin()" class="form-control form guzergah">
									
									<?php
				
											$stmt = $db->prepare("SELECT * FROM guzergahlar");
											$stmt->execute();
											
										while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
										?>
										<option value="<?php echo $row['guzergah_id']; ?>"><?php echo $row['guzergah_adi']; ?></option>
									<?php } ?>
							</select>
						</div>

				
			</form>
		
				
		</div>
	</div>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<!--Bilgi Mesajı-->
		<div class="col-md-12" >
			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 Hesap toplamaya çıkacağınız müşterileri seçin ve ardından  <strong>kaydet</strong>	  butonuna basın. 
			</div>
		</div><!--Bilgi Mesajı Son-->
		<div class="col-md-12">
			<div class="well dell">
				<div id="liste">
					
					<!--İçerik buraya geliyor!-->
					<div id="wait" class="text-center"><img src="../images/loading.gif" /></div>
				</div>
			   <div style="clear:both;"></div>
			</div>
		</div>
		<div class="col-md-12" >
			<input id="select-result" type="text" class="form-control none" name="secilenid" />
			<button class="btn btn-success m15top pull-right">Kaydet ve Devam Et <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
		</div>
	</div>

</div>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php include 'modal/hatamodal.php';?><!-- Small modal BİLGİ-->
<?php include 'footer.php'; ?><!-- ALT KISIM-->       

	


