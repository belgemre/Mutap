<?php include 'header.php'; ?>

<script>
function kaydet(){
	var hizmet=$('input[name=hizmet]').val();
	var hizmettanim=$('input[name=hizmettanim]').val();
	

	if(hizmet!="" 	&& hizmettanim!="" ){

        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#hizmetler').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text(" Bu hizmet adı kullanılıyor.");
							document.getElementById("hizmet").classList.add('hata');
						}else if(data == 2){
							document.getElementById("hizmet").classList.remove('hata');
							$('#kaydetbtn').hide(0);
							document.getElementById("yeniktbtn").classList.remove('none');
							document.getElementById("basarili").classList.remove('none');

						}else{
							alert("Kayıt sırasında bir hata oluştu!.");
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}
}

function rolclear(){
	document.getElementById("hizmet").classList.remove('hata');
	$('.hatamesaji').text("");
}

</script>

<div class="container ana">


	    <div class="col-md-4 main" >
					<span class="f18 gri ">Yeni Hizmet Şekli (Dolap, tabela vs.) </span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="hizmetler" action="" onsubmit="return false;" >

				<div class="form-group">
					<label >Hizmet Şekli:</label>
					<input type="text" name="hizmet" id="hizmet" onClick="rolclear()" class="form-control input-lg" placeholder="İşçi, Servisçi, Müşteri vs." required  tabindex="1">
				</div>
				<div class="form-group">
					<label >Hizmet'in Tanımı:</label>
					<input type="text" name="hizmettanim" id="hizmettanim" class="form-control input-lg" placeholder="Siparişleri müşterilere ulaştırır." required  tabindex="2">
				</div>

				<span class="basarili none" id="basarili"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Kayıt başarılı!</span>
				<label class="hatamesaji red m5left" id="hatamesaji" ></label>
				<button type="submit" name="submit" onClick="kaydet();" id="kaydetbtn" class="btn btn-primary btn-lg pull-right" tabindex="6">Hizmet Ekle</button>
				<a class="btn btn-success pull-right btn-lg none" name="yenikyt" id="yeniktbtn" href="hizmet-ekle.php" >Yeni Hizmet Şekli</a>
			</form>
			

		</div>
		 <div class="col-md-7 col-md-offset-1 main" >
					<span class="f18 gri ">Hizmetler</span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
							<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Hizmet Adı</th>
							<th>Hizmet'in Tanımı</th>
							<th>Sil</th>

						</tr>
					</thead>
					<tbody >
				<?php
					
					$stmt = $db->prepare("SELECT * FROM hizmetler");
					$stmt->execute();
					$sayi=0;
				while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
				?>

				<tr>
					<td ><?php echo $sayi=$sayi+1; ?></td>
					<td ><?php echo $row['hizmet']; ?></td>
					<td ><?php echo $row['tanim']; ?></td>
					<td >Sil</td>
					

				</tr>
				<?php } ?>
				</tbody>
				</table>	
			</div>
		
		 </div>

	</div><!----- Container Son ---->

<?php include 'footer.php'; ?>
        