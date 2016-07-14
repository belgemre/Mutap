<?php include 'header.php'; ?>
<script>
function kaydet(){
	var roller = document.getElementById("roller").value;

	if(roller != ""){window.location.replace(roller);}

}
</script>

<div class="container ana">


	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 well" >
					<span class="f18 gri "><b>Yeni</b> (Personel / Müşteri / Firma) <b>Ekle</b> <span class="glyphicon glyphicon-user pull-right"></span></span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="yenikayit" action="<?php if(isset($_POST['mevkii'])){echo $row['mevkii'];} ?>" onsubmit="return false;" >


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
				<div class="m15top">Ekleyeceğiniz personel, müşteri ya da firma bu rollere uymuyorsa buradan rol tanımlayabilirsiniz. <a href="rol-ekle.php">Rol Tanımla</a></div>
				
				
			</form>
			

		</div>
	</div><!----- Container Son ---->

<?php include 'footer.php'; ?>
        