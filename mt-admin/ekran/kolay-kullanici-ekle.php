<script>
function kaydet(){
	var roller = document.getElementById("roller").value;

	if(roller != ""){window.location.replace(roller);}

}
</script>
<div class="panel-heading " role="tab" id="onsoz">
		  <h2 class="panel-title uptext row">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#sozon" aria-expanded="true" aria-controls="sozon">
			 <div class="row"> 
				<div class="col-md-12 gri">
					Kolay <b>Kullanıcı</b> Ekle <span class="glyphicon glyphicon-user pull-right"></span>
				</div>
			 </div>
			 <div class="clear"></div>
			 
			</a>
		  </h2>
		</div>
		<div id="sozon" class="panel-collapse collapse" role="tabpanel" aria-labelledby="onsoz">
				<hr class="m15top m15bottom" />
				<form role="form" method="post" id="yenikayit" action="" onsubmit="return false;" >

					<div class="row">
						<div class="col-xs-6 col-md-6">

									<select  name="roller" id="roller" class="form-control roller" style="height:50px;" required tabindex="6">
										<option value="">Kullanıcı Türü Seçiniz</option>
										<option value="yonetici-ekle.php">Yönetici</option>
										<option value="personel-ekle.php">Personel</option>
										<option value="musteri-ekle.php">Müşteri</option>
										<option value="firma-ekle.php">Firma</option>
									
								</select>
						</div>
						<div class="col-xs-6 col-md-6">
						<button type="submit" onClick="kaydet();" name="submit" id="kaydetbtn" class="btn btn-primary btn-block btn-lg" tabindex="5">Devam Et!</button>
						</div>
						
					
					</div>
					
				</form>
		</div>