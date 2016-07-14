<?php include 'header.php'; ?>
<script>

function kaydetamk (){

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
					url:'arabayaatilan-denetim.php',
					data:$('#arabayaatilan').serialize(),
					success:function(data){
						if(data == 1){
							alert("İşlem Başarısız.");
						}else if(data == 2){
							alert("Boş Alan var.");
						}else{
							window.location = "servisebasla.php";
							
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}
	
	
}

</script>
<!-- Small modal -->
<div class="container ana">
	<div class="col-md-12">
		<div class="main">
			<span class="f24 gri ">Arabaya Atılan Ürün <i class="fa fa-truck pull-right"></i></span>
			<div style="clear:both"></div><hr class="m5top m5bottom" />

						<form name="form1" id="arabayaatilan" action="" onsubmit="return false;" method="post">
							<div class="form-group col-md-4">
								<label >Küçük Ayran (Koli):</label>
								<input type="number" name="kayran" id="kayran" class="form-control" required>

							</div>
						
							<div class="form-group col-md-4">
								<label >Büyük Ayran (Koli):</label>
								<input type="number" name="bayran" id="bayran" class="form-control" required>

							</div>
							
							<div class="form-group col-md-4">
								<label >Doruk (Koli):</label>
								<input type="number" name="doruk" id="doruk" class="form-control" required>

							</div>
							
							<div class="form-group col-md-4">
								<label >Kaşar (Kğ):</label>
								<input type="number" name="kasar" id="kasar" class="form-control" required>

							</div>
							
							<div class="form-group col-md-4">
								<label >Tulum Peynir (Kğ):</label>
								<input type="number" name="tulum" id="tulum" class="form-control" required>

							</div>
							
							<div class="form-group col-md-4">
								<label >Tereyağ (Kğ):</label>
								<input type="number" name="tereyag" id="tereyag" class="form-control" required>

							</div>
							<div class="form-group col-md-4">
								<label >Servis Aracı:</label>
								<select name="araba" class="form-control" >
								<option value="2"> Ford Connect </option>
								</select>
							</div>
							
							<div class="clr"></div>

					  <div class="modal-footer">
						<button type="submit" class="btn btn-default" data-dismiss="modal">KAPAT</button>
						<button type="submit" class="btn btn-primary" onClick="kaydetamk();" id="kaydet" >KAYDET ve BAŞLA</button>
						</form>
					  </div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>