<?php include 'header.php'; ?>

	<div class="container ana">
		
				<div class="well">
		  <!-- Default panel contents -->
		  <span class="f18 gri">Kullanıcılar <i class="fa fa-users pull-right"></i></span>
					<div style="clear:both"></div><hr class="m15top m15bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Kullanıcı Adı</th>
						<th>E-mail</th>
						<th>Rol</th>
						<th>#</th>
						
					</tr>
				</thead>
				<tbody >
			<?php
				
				$stmt = $db->prepare("SELECT * FROM members order by rol");
				$stmt->execute();
				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>
			<?php
			if($row['rol']=="1"){
				$rol="Yönetici";	
			}else if($row['rol']=="2"){
				$rol="Personel";
			}else if($row['rol']=="3"){
				$rol="Müşteri";
			}else if($row['rol']=="4"){
				$rol="Firma";
			}else{
				$rol="Rolü Yok!";
			}
			
			?>
			<tr class="btnDelete" data-id="<?php echo $row['memberID']; ?>">
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['username']; ?></td>
				<td ><?php echo $row['email']; ?></td>
				<td ><?php echo $rol; ?></td>
				<td >
					<a href="kullanici-detay.php?kullanici=<?php echo $row['memberID']; ?>"><i class="fa fa-pencil"></i></a> |
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
<?php include 'modal/silmodal.php'; ?>

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
											data:'memberSilId='+id,
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