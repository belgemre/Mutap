<?php include 'header.php'; ?>

<script>
function kaydet(){
	var servisadi=$('input[name=servisadi]').val();
	var tanim=$('input[name=tanim]').val();
	
	if(servisadi!="" && tanim!="" ){

        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#serviscesit').serialize(),
					success:function(data){
						if(data == 1){
							$('.hatamesaji').text(" Bu servis türü kullanılıyor.");
							document.getElementById("servisadi").classList.add('hata');
						}else if(data == 2){
							document.getElementById("servisadi").classList.remove('hata');
							$('#kaydetbtn').hide(0);
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

function servisadiclear(){
	document.getElementById("servisadi").classList.remove('hata');
	$('.hatamesaji').text("");
}

</script>

<div class="container ana">


	    <div class="col-md-4 main" >
					<span class="f18 gri ">Yeni Servis Türü </span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="serviscesit" action="" onsubmit="return false;" >

				<div class="form-group">
					<label >Servis Türü:</label>
					<input type="text" name="servisadi" id="servisadi" onClick="servisadiclear()" class="form-control input-lg" placeholder="Sabah Servisi, Öğle Servisi vs." required  tabindex="1">
				</div>
				<div class="form-group">
					<label >Servis Tür Tanımı:</label>
					<input type="text" name="tanim" id="tanim" class="form-control input-lg" placeholder="Sabah çıkılan servis türü." required  tabindex="2">
				</div>


				<span class="basarili none" id="basarili"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
				<label class="hatamesaji red m5left" id="hatamesaji" ></label>
				<button type="submit" name="submit" onClick="kaydet();" id="kaydetbtn" class="btn btn-primary btn-lg pull-right" tabindex="6">Ekle</button>
				
				
			</form>
			

		</div>
		 <div class="col-md-7 col-md-offset-1 main" >
					<span class="f18 gri ">Servis Türleri</span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
							<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Servis Türü</th>
							<th>Servis Türü Tanımı</th>
							<th>Sil</th>

						</tr>
					</thead>
					<tbody >
				<?php
					
					$stmt = $db->prepare("SELECT * FROM serviscesit order by servis_adi");
					$stmt->execute();
					$sayi=0;
				while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
				?>

				<tr class="btnDelete" data-id="<?php echo $row['servis_id']; ?>">
					<td ><?php echo $sayi=$sayi+1; ?></td>
					<td ><?php echo $row['servis_adi']; ?></td>
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
									<h4 class="modal-title" id="myModalLabel">Servis Türü Güncelle</h4>
								  </div>
								  <div class="modal-body">
									<form role="form" method="post" id="stguncelle<?php echo $sayi; ?>" action="" onsubmit="return false;" >
									
										<input type="text" class="none" name="stGuncelId<?php echo $sayi; ?>" value="<?php echo $row['servis_id']; ?>" />
										<div class="form-group">
											<label>Servis Türü :</label>
											<input type="text" class="form-control" name="stur<?php echo $sayi; ?>" required onClick="sturtemiz<?php echo $sayi; ?>()" id="stur<?php echo $sayi; ?>" value="<?php echo $row['servis_adi']; ?>" placeholder="Sanayii Servisi, Güzergah 1 vs."/>
										</div>
										<div class="form-group">
											<label>Servis Türü Tanımı :</label>
											<input type="text" class="form-control" name="sttanim<?php echo $sayi; ?>" required onClick="sturtemiz<?php echo $sayi; ?>()" id="sttanim<?php echo $sayi; ?>" value="<?php echo $row['tanim']; ?>"  onClick="temizadet<?php echo $sayi; ?>()" placeholder="Sanayii bölgesinde çıkılan servis türü." name="adetguncel" />
										</div>
										<div class="form-group text-center">
											<label class="mesaj red"></label>
										</div>
										
									<form>
									
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-success btn-block" onClick="pguncelle<?php echo $sayi; ?>()">GÜNCELLE</button>
								  </div>
								</div>
							  </div>
							</div>	
							<script>
													
							function pguncelle<?php echo $sayi; ?>(){
								var stGuncelId<?php echo $sayi; ?> = $('input[name=stGuncelId<?php echo $sayi; ?>]').val();
								var stur<?php echo $sayi; ?> = $('input[name=stur<?php echo $sayi; ?>]').val();
								var sttanim<?php echo $sayi; ?> = $('input[name=sttanim<?php echo $sayi; ?>]').val();
								
								if(stGuncelId<?php echo $sayi; ?>!="" && stur<?php echo $sayi; ?>!="" && sttanim<?php echo $sayi; ?>!="" ){
								  $.ajax({
											type:'POST',
											url:'guncellemeler.php',
											data:{stGuncelId:stGuncelId<?php echo $sayi; ?>,stur:stur<?php echo $sayi; ?>,sttanim:sttanim<?php echo $sayi; ?>},
											success:function(data){
												if(data == 1){
													$('.mesaj').text("Güncellemek için önce değişiklik yapmalısınız!").fadeIn(0).fadeOut(3000);
												}else if(data == 2){
													
													$('.mesaj').text("Servis türü kullanılıyor!").fadeIn(0).fadeOut(3000);
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
											data:'servisturSilId='+id,
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
        