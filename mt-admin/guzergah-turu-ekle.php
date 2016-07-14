<?php include 'header.php'; ?>

<script>
function kaydet(){
	var guzergahadi=$('input[name=guzergahadi]').val();
	var guzergahtanim=$('input[name=guzergahtanim]').val();
	
	if(guzergahadi!="" && guzergahtanim!="" ){

        $.ajax({
					type:'POST',
					url:'function.php',
					data:$('#guzergahcesit').serialize(),
					success:function(data){
						if(data == 1){
							document.getElementById("basarili").classList.add('none');
							$('.hatamesaji').text(" Bu güzergah türü kullanılıyor.");
							$('#hatamodal').modal('show');
							document.getElementById("guzergahadi").classList.add('hata');
						}else if(data == 2){
							$('.hatamesaji').text("");
							document.getElementById("basarili2").classList.remove('none');
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

function guzergahadiclear(){
	document.getElementById("guzergahadi").classList.remove('hata');
}

</script>

<div class="container ana">


	    <div class="col-md-4 main" >
					<span class="f18 gri ">Yeni Güzergah Türü </span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
		
			<form role="form" method="post" id="guzergahcesit" action="" onsubmit="return false;" >

				<div class="form-group">
					<label >Güzergah Türü:</label>
					<input type="text" name="guzergahadi" id="guzergahadi" onClick="guzergahadiclear()" class="form-control input-lg" placeholder="Sanayii Servisi, Güzergah 1 vs." required  tabindex="1">
				</div>
				<div class="form-group">
					<label >Güzergah Tür Tanımı:</label>
					<input type="text" name="guzergahtanim" id="guzergahtanim" class="form-control input-lg" placeholder="Sanayii bölgesinde çıkılan servis türü." required  tabindex="2">
				</div>
				<span class="basarili none" id="basarili2"><span class="glyphicon glyphicon-ok green f24 m5right"></span>Tebrikler! Kayıt başarılı!</span>
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
							<th>Güzergah Türü</th>
							<th>Güzergah Türü Tanımı</th>
							<th>#</th>

						</tr>
					</thead>
					<tbody >
				<?php
					
					$stmt = $db->prepare("SELECT * FROM guzergahlar");
					$stmt->execute();
					$sayi=0;
				while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
				?>

				<tr class="btnDelete" data-id="<?php echo $row['guzergah_id']; ?>"> 
					<td ><?php echo $sayi=$sayi+1; ?></td>
					<td ><?php echo $row['guzergah_adi']; ?></td>
					<td ><?php echo $row['tanim']; ?></td>
					<td >
						<a href="#" data-toggle='modal' data-target='.bs-example-modal-sm-guncelle<?php echo $sayi; ?>'><i class="fa fa-pencil"></i></a> |
						<a class="btnDelete" href=""><i class="fa fa-trash bordo"></i></a>
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
									
										<input type="text" class="none" name="guzergahGuncelId<?php echo $sayi; ?>" value="<?php echo $row['guzergah_id']; ?>" />
										<div class="form-group">
											<label>Güzergah Türü :</label>
											<input type="text" class="form-control" name="gadi<?php echo $sayi; ?>" required onClick="gaditemiz<?php echo $sayi; ?>()" id="gadi<?php echo $sayi; ?>" value="<?php echo $row['guzergah_adi']; ?>" placeholder="Sanayii Servisi, Güzergah 1 vs."/>
										</div>
										<div class="form-group">
											<label>Güzergah Türü Tanımı :</label>
											<input type="text" class="form-control" name="gtanim<?php echo $sayi; ?>" required onClick="gaditemiz<?php echo $sayi; ?>()" id="gtanim<?php echo $sayi; ?>" value="<?php echo $row['tanim']; ?>"  onClick="temizadet<?php echo $sayi; ?>()" placeholder="Sanayii bölgesinde çıkılan servis türü." name="adetguncel" />
										</div>
										<div class="form-group text-center">
											<label class="mesaj red"></label>
										</div>
										
									<form>
									
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-success btn-block" onClick="aguncelle<?php echo $sayi; ?>()">GÜNCELLE</button>
								  </div>
								</div>
							  </div>
							</div>	
							<script>
													
							function aguncelle<?php echo $sayi; ?>(){
								var guzergahGuncelId<?php echo $sayi; ?> = $('input[name=guzergahGuncelId<?php echo $sayi; ?>]').val();
								var gadi<?php echo $sayi; ?> = $('input[name=gadi<?php echo $sayi; ?>]').val();
								var gtanim<?php echo $sayi; ?> = $('input[name=gtanim<?php echo $sayi; ?>]').val();
								
								if(guzergahGuncelId<?php echo $sayi; ?>!="" && gadi<?php echo $sayi; ?>!="" && gtanim<?php echo $sayi; ?>!="" ){
								  $.ajax({
											type:'POST',
											url:'guncellemeler.php',
											data:{guzergahGuncelId:guzergahGuncelId<?php echo $sayi; ?>,gadi:gadi<?php echo $sayi; ?>,gtanim:gtanim<?php echo $sayi; ?>},
											success:function(data){
												if(data == 1){
													$('.mesaj').text("Güncellemek için önce değişiklik yapmalısınız!").fadeIn(0).fadeOut(3000);
												}else if(data == 2){
													
													$('.mesaj').text("Güzergah adı kullanılıyor!").fadeIn(0).fadeOut(3000);
													document.getElementById("gadi<?php echo $sayi; ?>").classList.add('hata');
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
									document.getElementById("gadi<?php echo $sayi; ?>").classList.add('hata');
									document.getElementById("gtanim<?php echo $sayi; ?>").classList.add('hata');
								}
							}
							function gaditemiz<?php echo $sayi; ?>(){
								$('.mesaj').text("").fadeOut(0);
								document.getElementById("gadi<?php echo $sayi; ?>").classList.remove('hata');
								document.getElementById("gtanim<?php echo $sayi; ?>").classList.remove('hata');
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
											data:'guzergahSilId='+id,
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
        