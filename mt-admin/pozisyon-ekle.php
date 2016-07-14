<?php include 'header.php'; ?>

<script>
function kaydet(){
	var rol=$('input[name=rol]').val();
	var tanim=$('input[name=tanim]').val();
	

	if(rol!="" 	&& tanim!="" ){

        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#roller').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text(" Bu rol adı kullanılıyor.");
							document.getElementById("rol").classList.add('hata');
						}else if(data == 2){
							document.getElementById("rol").classList.remove('hata');
							document.getElementById("basarili").classList.remove('none');
							location.reload();
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
	document.getElementById("rol").classList.remove('hata');
	$('.hatamesaji').text("");
}

</script>

<div class="container ana">


	    <div class="col-md-4 main" >
					<span class="f18 gri ">Yeni Pozisyon </span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="roller" action="" onsubmit="return false;" >

				<div class="form-group">
					<label >Pozisyon:</label>
					<input type="text" name="rol" id="rol" onClick="rolclear()" class="form-control input-lg" placeholder="Depocu, Servisçi vs." required  tabindex="1">
				</div>
				<div class="form-group">
					<label >Pozisyon Tanımı:</label>
					<input type="text" name="tanim" id="tanim" class="form-control input-lg" placeholder="Siparişleri müşterilere ulaştırır." required  tabindex="2">
				</div>


				<span class="basarili none" id="basarili"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
				<label class="hatamesaji red m5left" id="hatamesaji" ></label>
				<button type="submit" name="submit" onClick="kaydet();" id="kaydetbtn" class="btn btn-primary btn-lg pull-right" tabindex="6">Rol Ekle</button>
				<a class="btn btn-success pull-right btn-lg none" name="yenikyt" id="yeniktbtn" href="rol-ekle.php" >Yeni Rol</a>
				
				
			</form>
			

		</div>
		 <div class="col-md-7 col-md-offset-1 main" >
					<span class="f18 gri ">Personel Pozisyonları</span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
							<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Pozisyon</th>
							<th>Pozisyon Tanımı</th>
							<th>Sil</th>

						</tr>
					</thead>
					<tbody >
				<?php
					
					$stmt = $db->prepare("SELECT * FROM roller");
					$stmt->execute();
					$sayi=0;
				while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
				?>

				<tr class="btnDelete" data-id="<?php echo $row['rol_id']; ?>">
					<td ><?php echo $sayi=$sayi+1; ?></td>
					<td ><?php echo $row['konum']; ?></td>
					<td ><?php echo $row['tanim']; ?></td>
					<td >
						
						<a href="#" data-toggle='modal' data-target='.bs-example-modal-sm-guncelle<?php echo $sayi; ?>'><i class="fa fa-pencil"></i></a> |
						<?php if($row['sil']==0){echo "<a class='btnDelete' href=''><i class='fa fa-trash bordo'></i></a>";}else{
							echo "<i data-toggle='tooltip' data-placement='left' title='Bu pozisyon silinemez!' class='fa fa-trash bordo'></i>";
						} ?>
						
					</td>
				</tr>
				<!-- Small modal 2-->

							<div class="modal fade bs-example-modal-sm-guncelle<?php echo $sayi; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								   <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Güzergah Güncelle</h4>
								  </div>
								  <div class="modal-body">
									<form role="form" method="post" id="aaguncelle<?php echo $sayi; ?>" action="" onsubmit="return false;" >
									
										<input type="text" class="none" name="pozisyonGuncelId<?php echo $sayi; ?>" value="<?php echo $row['rol_id']; ?>" />
										<div class="form-group">
											<label>Güzergah Türü :</label>
											<input type="text" class="form-control" name="akonum<?php echo $sayi; ?>" required onClick="akonumtemiz<?php echo $sayi; ?>()" id="akonum<?php echo $sayi; ?>" value="<?php echo $row['konum']; ?>" placeholder="Sanayii Servisi, Güzergah 1 vs."/>
										</div>
										<div class="form-group">
											<label>Güzergah Türü Tanımı :</label>
											<input type="text" class="form-control" name="atanim<?php echo $sayi; ?>" required onClick="akonumtemiz<?php echo $sayi; ?>()" id="atanim<?php echo $sayi; ?>" value="<?php echo $row['tanim']; ?>"  onClick="temizadet<?php echo $sayi; ?>()" placeholder="Sanayii bölgesinde çıkılan servis türü." name="adetguncel" />
										</div>
										<div class="form-group text-center">
											<label class="mesaj red"></label>
										</div>
										
									</form>
									
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-success btn-block" onClick="pguncelle<?php echo $sayi; ?>()">GÜNCELLE</button>
								  </div>
								</div>
							  </div>
							</div>	
							<script>
													
							function pguncelle<?php echo $sayi; ?>(){
								var pozisyonGuncelId<?php echo $sayi; ?> = $('input[name=pozisyonGuncelId<?php echo $sayi; ?>]').val();
								var akonum<?php echo $sayi; ?> = $('input[name=akonum<?php echo $sayi; ?>]').val();
								var atanim<?php echo $sayi; ?> = $('input[name=atanim<?php echo $sayi; ?>]').val();
								
								if(pozisyonGuncelId<?php echo $sayi; ?>!="" && akonum<?php echo $sayi; ?>!="" && atanim<?php echo $sayi; ?>!="" ){
								  $.ajax({
											type:'POST',
											url:'guncellemeler.php',
											data:{pozisyonGuncelId:pozisyonGuncelId<?php echo $sayi; ?>,akonum:akonum<?php echo $sayi; ?>,atanim:atanim<?php echo $sayi; ?>},
											success:function(data){
												if(data == 1){
													$('.mesaj').text("Güncellemek için önce değişiklik yapmalısınız!").fadeIn(0).fadeOut(3000);
												}else if(data == 2){
													
													$('.mesaj').text("Güzergah adı kullanılıyor!").fadeIn(0).fadeOut(3000);
													document.getElementById("akonum<?php echo $sayi; ?>").classList.add('hata');
												}else if(data == 3){
													location.reload();
												}else{
													alert("Beklenmedik bir hata oluştu!");
												}
												},
											error:function(){alert("Başarısız");}
								});
								return false;
								
								}else{
									$('.mesaj').text("Boş alanlar var!").fadeIn(0).fadeOut(3000);
									document.getElementById("akonum<?php echo $sayi; ?>").classList.add('hata');
									document.getElementById("atanim<?php echo $sayi; ?>").classList.add('hata');
								}
							}
							function akonumtemiz<?php echo $sayi; ?>(){
								$('.mesaj').text("").fadeOut(0);
								document.getElementById("akonum<?php echo $sayi; ?>").classList.remove('hata');
								document.getElementById("atanim<?php echo $sayi; ?>").classList.remove('hata');
							}
							
							
							</script>
				<?php } ?>
				</tbody>
				</table>	
			</div>
		
		 </div>

	</div><!----- Container Son ---->
<!-- Small modal SİL-->
<?php include 'modal/silmodal.php';?>
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
											data:'pozisyonSilId='+id,
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
<!-- Small modal BİLGİ-->
<?php include 'modal/hatamodal.php';?>
<?php include 'footer.php'; ?>
        