<?php include 'header.php';	?>
<?php $sayi=1; ?>
<div class="container ana">
	<div class="table-responsive">
		<table class="table " cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>S.N</th>
					<th>Sil</th>
					<th>Ürün Adı</th>
					<th>Birim Miktar</th>
					

				</tr>
			</thead>
			<!-- start: Table Body -->
			<?php
						
						$stmt = $db->prepare("SELECT * FROM arabayaatilan");
						$stmt->execute();
					while( $arabayaatilan = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
					?>
							<tr class="btnDelete" data-id="<?php echo $sayi; ?>">
								<td ><label ><?php echo $sayi; ?></label></td>
								<td><button class="btnDelete" href=""><i class="fa fa-trash bordo"></i></button></td>
						
								<td><label><?php echo $arabayaatilan['urun_id']; ?></label></td>
								<td>
									<a href="#" data-toggle='modal' data-target='.bs-example-modal-sm-guncelle<?php echo $sayi; ?>'><i class="fa fa-pencil"></i></a>
									<label><?php echo $arabayaatilan['adet']; ?></label>

									
								</td>
								
							</tr>
							<?php $sayi=$sayi+1; } ?>
			</tbody>
		</table>
	</div>
</div>
<!--/table-collapse -->
<!-- start: Delete Coupon Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h3 class="modal-title" id="myModalLabel">Warning!</h3>

            </div>
            <div class="modal-body">
                 <h4> Are you sure you want to DELETE?</h4>

            </div>
            <!--/modal-body-collapse -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDelteYes" href="#">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            <!--/modal-footer-collapse -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
$('button.btnDelete').on('click', function (e) {
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    $('#myModal').data('id', id).modal('show');
});

$('#btnDelteYes').click(function () {
    var id = $('#myModal').data('id');
    $('[data-id=' + id + ']').remove();
    $('#myModal').modal('hide');
});
</script>

<?php include 'footer.php';	?>