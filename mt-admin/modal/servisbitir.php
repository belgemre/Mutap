<button class="btn btn-danger bitir-buton btnDelete" name="btn-bitir" onClick="bitir()" id="btn-bitir" data-toggle="tooltip" data-placement="top" title="Bu Servisi Bitir!" /><i class="fa fa-sign-out"></i></button>
<!--Servis Bitir Modal -->
<div class="modal fade bs-example-modal-sm" id="servisbitirmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	   <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">UYARI!</h4>
	  </div>
	  <div class="modal-body">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<i class="fa fa-sign-out bordo fa-4x m15left"></i>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<h4 class="m15left"> Bu servisi bitirmek istediğinizden emin misiniz?</h4>
			</div>
		</div>
	  </div>
	  <div class="modal-footer">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<button type="button" class="btn btn-danger btn-block" id="btnDelteYes" href="#">EVET</button>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<button type="button" class="btn btn-default btn-block" data-dismiss="modal">HAYIR</button>
			</div>
		</div>
			
			
	  </div>
	</div>
  </div>
</div>	<!--Servis Bitir Modal Son-->
<script>
$('button.btnDelete').on('click', function (e) {
    e.preventDefault();
   var id = $('input[name=LastID]').val();
    $('#servisbitirmodal').data('id', id).modal('show');
});

$('#btnDelteYes').click(function () {
    var id = $('#servisbitirmodal').data('id');
	if(id!=""){
					 $.ajax({
					type:'POST',
					url:'guncellemeler.php',
					data:{ServisBitirid:id},
					success:function(data){
						if(data == 1){
							window.location.href = '../index.php';
						}else{
							alert("Beklenmedik bir hata oluştu!");
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}else{
		alert("Id bilgisi gelmedi.");
	} 
	
    
});
</script>