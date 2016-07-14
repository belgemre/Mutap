<?php include 'header.php'; ?>
	<style type="text/css">
.hata{-webkit-box-shadow: 0 0 3px #8BC34A;-moz-box-shadow: 0 0 3px #8BC34A;box-shadow: 0 0 3px #8BC34A;
-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;
}
</style>
<?php //veritabanına bağlandık.
							include 'baglan.php';
							$sth = $vt->prepare("SELECT `m_id`,`firma_adi`, `sahibi`  FROM musteriler where liste=2");
							$sth->execute();
							$sayi=0;
							while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) { 
							$sayi=$sayi+1;
				?>
<script>
function kaydet<?php echo $sayi; ?>(){

	var kayran = document.getElementById("kayran").value;
	var bayran = document.getElementById("bayran").value;
	var doruk = document.getElementById("doruk").value;
	var kasar = document.getElementById("kasar").value;
	var tulum = document.getElementById("tulum").value;
	var tereyag = document.getElementById("tereyag").value;

	
	if(kayran != "" 
	&& bayran != "" 
	&& doruk != "" 
	&& kasar != "" 
	&& tulum != "" 
	&& tereyag != ""){

        $.ajax({
					type:'POST',
					url:'servisebasla-denetim.php',
					data:$('#satis<?php echo $sayi; ?>').serialize(),
					success:function(data){
						if(data == 1){
							alert("İşlem Başarısız!");
						}else if(data == 2){
							alert("Boş Alan var.");
						}else{
							document.getElementById("firmaadi<?php echo $sayi; ?>").classList.add('hata');
							$('#kaydetbtn<?php echo $sayi; ?>').hide(0);
							
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}
	
	
}

</script>
	
<div class="container ana">
		
			<div>
				

				<div  class="col-md-4 col-sm-4 col-xs-12 ">
					<div id="firmaadi<?php echo $sayi; ?>" class="well">
						
						<form name="form1" id="satis<?php echo $sayi; ?>" action="" onsubmit="return false;" method="post">
						
								<h3><input type="text" name="id" value="<?php echo $row['m_id']; ?>" style="display:none;" > <?php echo $row['firma_adi']; ?></h3>
								<div class="form-group">
									<label >Küçük Ayran (Koli):</label>
									<input type="number" name="kayran" id="kayran" class="form-control" required>

								</div>
							
								<div class="form-group">
									<label >Büyük Ayran (Koli):</label>
									<input type="number" name="bayran" id="bayran" class="form-control" required>

								</div>
								
								<div class="form-group">
									<label >Doruk (Koli):</label>
									<input type="number" name="doruk" id="doruk" class="form-control" required>

								</div>
								
								<div class="form-group">
									<label >Kaşar (Kğ):</label>
									<input type="number" name="kasar" id="kasar" class="form-control" required>

								</div>
								
								<div class="form-group">
									<label >Tulum Peynir (Kğ):</label>
									<input type="number" name="tulum" id="tulum" class="form-control" required>

								</div>
								
								<div class="form-group">
									<label >Tereyağ (Kğ):</label>
									<input type="number" name="tereyag" id="tereyag" class="form-control" required>

								</div>
								
								<div class="form-group">
									<label >Alınan Para (TL):</label>
									<input type="number" name="nakit" id="nakit" class="form-control" required>
								</div>

						  <div>
						  
							<button type="submit" class="btn btn-default block m5bottom" data-dismiss="modal">ATLA</button>
							<button type="submit" class="btn btn-primary block" id="kaydetbtn<?php echo $sayi; ?>"  onClick="kaydet<?php echo $sayi; ?>();" >KAYDET</button>
						  
						  </div>
						</form>
					</div>	
				</div>
		
<?php } ?>


				
				
			</div>
</div>
	

<?php include 'footer.php'; ?>
        