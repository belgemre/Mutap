<?php include 'header.php'; ?>

	<div class="container ana">
		
				<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well">
		  <!-- Default panel contents -->
					<span class="f18 gri">Servisler Listesi <i class="fa fa-truck pull-right fa-2x"></i></span>
					<div style="clear:both"></div><hr class="m15top m15bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Servis Türü</th>
						<th>Güzergah</th>
						<th>Araç</th>
						<th>Servisçi</th>
						<th>Tarih</th>
						<th>Başlangıç</th>
						<th>Bitiş</th>
					</tr>
				</thead>
				<tbody >
			<?php
				
				$stmt = $db->prepare("SELECT * FROM yapilanservisler A JOIN guzergahlar B JOIN araclar C JOIN personel D JOIN serviscesit E 
				where 
				A.servis_id=E.servis_id and
				A.guzergah_id=B.guzergah_id and
				A.arac_id=C.arac_id and
				A.servisci_id=D.userID order by bs_id DESC");
				$stmt->execute();
				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>

			<tr>
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['servis_adi']; ?></td>
				<td ><?php echo $row['guzergah_adi']; ?></td>
				<td ><?php echo $row['marka']." - ".$row['model']; ?></td>
				<td ><?php echo $row['adi']." ".$row['soyadi']; ?></td>
				<td ><?php echo $row['tarih']; ?></td>
				<td ><?php echo $row['baslangic_saati']; ?></td>
				<td ><?php if($row['durum']==0){
					echo "<a class='btn btn-xs btn-success' href='servis-basladi.php?
					bs_id=".$row['bs_id']."'>Devam ediyor... <i class='fa fa-arrow-right'></i></a";
					}else{ echo $row['bitis_saati']; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>	
		</div>
		</div>

</div>
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
											data:'perSilId='+id,
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

<?php include 'footer.php'; ?>