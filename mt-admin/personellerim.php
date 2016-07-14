<?php include 'header.php'; ?>

	<div class="container ana">
		
				<div class="well">
		  <!-- Default panel contents -->
		  <span class="f18 gri">Personel Listesi <span class="glyphicon glyphicon-cutlery pull-right"></span></span>
					<div style="clear:both"></div><hr class="m15top m15bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Adı</th>
						<th>Soyadı</th>
						<th>Konum</th>
						<th>#</th>
						
					
					</tr>
				</thead>
				<tbody >
			<?php
				
				$stmt = $db->prepare("SELECT * FROM personel A JOIN roller B on A.rol=B.rol_id");
				$stmt->execute();
				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>

			<tr class="btnDelete" data-id="<?php echo $row['userID']; ?>">
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['adi']; ?></td>
				<td ><?php echo $row['soyadi']; ?></td>
				<td ><?php echo $row['konum']; ?></td>
				<td >
					<a href="personel-detay.php?personel=<?php echo $row['userID']; ?>"><i class="fa fa-pencil"></i></a> |
					<a class="btnDelete" href=""><i class="fa fa-trash bordo"></i></a>
				</td>
				

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