<?php include 'header.php'; ?>
	<style type="text/css">
.hata{-webkit-box-shadow: 0 0 3px #FF0000;-moz-box-shadow: 0 0 3px #FF0000;box-shadow: 0 0 3px #FF0000;
-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;
}
</style>
<script src="js/ym.js" type="text/javascript"></script>



	<div class="container ana">

<form name="form1" id="yenimusteri" action="" onsubmit="return false;" method="post">

		<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="main">		
					<span class="f18 gri pull-right">Firma Bilgileri</span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />
				  <div class="form-group">
					<label >Firma Adı:</label><label class="firma-adi red m5left" ></label>
					<input type="text" onClick="temizlefirmaadi()" id="firmaadi1" name="firmaadi" required class="form-control" placeholder="Firma Adı">
				  </div>
				  <div class="form-group">
					<label >Firma'nın Sahibi:</label>
					<input type="text" name="sahibi" required class="form-control" placeholder="Firma'nın Sahibi:">
				  </div>
				  <div class="form-group">
					<label >Adres:</label>
					<input type="text" name="adres" class="form-control" placeholder="Taşpazar mah...">
				  </div>
				  <div class="form-group">
					<label >İş Tel:</label>
					<input type="number" name="istel" maxlength="11"  pattern="[0-9]{11}" title="Örnek: 03822123344" class="form-control" placeholder="03822123344">
				  </div>
					<div class="form-group">
					<label >Cep Tel:</label>
					<input type="number" name="ceptel" maxlength="11"  pattern="[0-9]{11}" title="Örnek: 05556667788" class="form-control" placeholder="05556667788">
				  </div>
					  <div class="form-group">
					<label >E-Posta:</label>
					<input type="email" class="form-control" name="mail"  placeholder="E-Mail Adresiniz">
				  </div>
				  <div class="form-group">
					<label >Hangi Listede:</label>
								<select  name="liste" id="liste" class="form-control" required>
									<option value="">Liste Seç</option>
									<option value="0">Ortak Liste</option>
									<option value="1">Servis 1 (Salih BELGE)</option>
									<option value="2">Servis 2 (Fatih BELGE)</option>
								</select>
				  </div>
				</div><!-- Main Son -->
		</div> <!-- 1. kolon Son -->

<div class="col-md-4 col-sm-6 col-xs-12">
	<div class="main">
		<span class="f18 gri pull-right"> Ürün Fiyat Bilgileri</span>
		<div style="clear:both"></div><hr class="m5top m5bottom" />
		
			<div class="form-group">
			<label >Küçük Ayran Fiyat (Koli-TL):</label>
							<select name="kayran" id="kayran" class="form-control" required>
								<option value="">Anlaşılan Fiyat</option>
								<?php 
								for($para=5; $para <= 8 ; $para=$para+0.25){
										echo	"<option value=".$para.">".$para." TL</option>";
								 }
								?>
							</select>
		  </div>
		  	<div class="form-group">
			<label >Büyük Ayran Fiyat (Koli-TL):</label>
							<select name="bayran" id="bayran" class="form-control" required>
								<option value="">Anlaşılan Fiyat</option>
								<?php 
								for($para=5; $para <= 8 ; $para=$para+0.25){
										echo	"<option value=".$para.">".$para." TL</option>";
								 }
								?>
							</select>

		  </div>
		  	<div class="form-group">
			<label >Doruk Ayran Fiyat (Koli-TL):</label>
							<select name="doruk" id="doruk" class="form-control" required>
								<option value="">Anlaşılan Fiyat</option>
								<?php 
								for($para=5; $para <= 7 ; $para=$para+0.25){
										echo	"<option value=".$para.">".$para." TL</option>";
								 }
								?>
							</select>
		  </div>
		  	<div class="form-group">
			<label >Kaşar Peynir Fiyat (Kg-TL):</label>
							<select name="kasar" id="kasar" class="form-control" required>
								<option value="">Anlaşılan Fiyat</option>
								<?php 
								for($para=14; $para <= 18 ; $para=$para+0.25){
										echo	"<option value=".$para.">".$para." TL</option>";
								 }
								?>
							</select>
		  </div>
		  	<div class="form-group">
			<label >Tulum Peynir Fiyat (Kg-TL):</label>
							<select name="tulum" id="tulum" class="form-control" required>
								<option value="">Anlaşılan Fiyat</option>
								<?php 
								for($para=17; $para <= 20 ; $para=$para+0.25){
										echo	"<option value=".$para.">".$para." TL</option>";
								 }
								?>
							</select>
		  </div>
		  <div class="form-group">
			<label >Tereyağ Fiyat (Kg-TL):</label>
							<select name="tereyag" id="tereyag" class="form-control" required>
								<option value="">Anlaşılan Fiyat</option>
								<?php 
								for($para=20; $para <= 25 ; $para=$para+0.25){
										echo	"<option value=".$para.">".$para." TL</option>";
								 }
								?>
							</select>
		  </div>
		  <div class="form-group">
			<label >Güncel Bakiye:</label>
			<input type="text" required name="bakiye" id="bakiye" class="form-control" pattern="[0-9\d\.]{1,}" title="Örnek: 185.50" placeholder="1225.50">
		  </div>

    </div>
	
 </div><!-- 2. kolon Son -->
 
 <div class="col-md-4 col-sm-12 colxs-12">
	<div class="main">
	
		<span class="f18 gri pull-right"> Kullanıcı İşlemleri</span>
	    <div style="clear:both"></div><hr class="m5top m5bottom" />
	
		  <div class="form-group">
			<label >Müşteri Kullanıcı Adı:</label><label class="kullanici-adi red m5left" ></label>
			<input type="text" id="mkadi" onClick="temizlemkadi()" name="mkadi" class="form-control" required pattern="^[a-z\d\.]{5,}$" title="Türkçe karakter içeremez ve en az 5 karakter olmalı!"  placeholder="ozcankebap">
		</div>
		  <div class="form-group">
			<label for="exampleInputEmail1">Kullanıcı Şifresi</label>
			<input type="text" name="msifre" class="form-control" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Büyük harf, küçük harf ve rakam içermelidir."   placeholder="ozcankebap123">
		  </div>

	 </div> 
	  <div class="main">
		  <div class="checkbox">
	    <p class="help-block">Bütün bilgileri eksiksiz doldurduğunuzdan emin olduktan sonra kaydedebilirsiniz.</p>
		<label>
		  <input type="checkbox" name="cb_rules_agree" id="cb_rules_agree" value="1" onClick="sozlesmebuton();"> Kontrol Ettim.
		</label>
	  </div>
	  <button type="submit"  name="gonder" disabled="false" onClick="kaydetamk();" id="kaydet" class="btn btn-success pull-right">Kaydet</button>
	  <button type="submit"  name="guncelle" disabled="false" id="guncelle" class="btn btn-info pull-right m5right">Güncelle</button>
	  <span class="basarili"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
	  <div style="clear:both"></div>
	  
	  </div>
	 
 </div>
 
 
<div style="clear:both"></div>
</form>
				
</div>

<?php include 'footer.php'; ?>
        