<!-- VERİLEN ÜRÜN MİKTAR GÜNCELLE MODAL-->

							<div class="modal fade bs-example-modal-sm-guncelle<?php echo $sayi; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								   <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Verilen Ürün Güncelle</h4>
								  </div>
								  <div class="modal-body">
									<form role="form" method="post" id="aaguncelle<?php echo $sayi; ?>" action="" onsubmit="return false;" >
									
										<input type="text" class="none" name="aagid<?php echo $sayi; ?>" value="<?php echo $musteriyeverilen['sd_id']; ?>" />
										<input type="text" class="none" name="bsid" value="<?php echo $musteriyeverilen['bs_id']; ?>" />
										<input type="text" class="none" name="urunid<?php echo $sayi; ?>" value="<?php echo $musteriyeverilen['urun_id']; ?>" disabled />
										
										<div class="form-group">
											<label>Ürün Adı :</label>
											<input type="text" class="form-control" value="<?php echo $musteriyeverilen['urun_adi']; ?>" disabled />
										</div>
										<div class="form-group">
											<label>Adet / kg / koli :</label>
											<input type="text" class="form-control" name="gadet<?php echo $sayi; ?>" onClick="temizadet<?php echo $sayi; ?>()" placeholder="Adet / koli / kg" name="adetguncel" />
										</div>
									</form>
									
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-success btn-block" onClick="aguncelle<?php echo $sayi; ?>()">GÜNCELLE</button>
								  </div>
								</div>
							  </div>
							</div>	
							<script>
													
							function aguncelle<?php echo $sayi; ?>(){
								var aagid<?php echo $sayi; ?> = $('input[name=aagid<?php echo $sayi; ?>]').val();
								var gadet<?php echo $sayi; ?> = $('input[name=gadet<?php echo $sayi; ?>]').val();
								var bsid = $('input[name=bsid]').val();
								var urunid<?php echo $sayi; ?> = $('input[name=urunid<?php echo $sayi; ?>]').val();
								
								if(aagid<?php echo $sayi; ?>!="" && gadet<?php echo $sayi; ?>!="" && bsid!="" && urunid<?php echo $sayi; ?>!="" ){
								  $.ajax({
											type:'POST',
											url:'guncellemeler.php',
											data:{gidd:aagid<?php echo $sayi; ?>,gadett:gadet<?php echo $sayi; ?>,bsid:bsid,urunid:urunid<?php echo $sayi; ?>},
											success:function(data){
												if(data == 1){
													location.reload();
												}else if(data == 2){
													document.getElementById("basarili").classList.add('none');
													$('.hatamesaji').text("Seçilen ürün araçta yok ya da bu miktarda yok!");
													$('#hatamodal').modal('show');
												}else{
													alert("Beklenmedik bir hata oluştu!");
												}
												},
											error:function(){alert("Başarısız");}
								});
								return false;
								
								}else{
									document.getElementById("gadet<?php echo $sayi; ?>").classList.add('hata');
								}
							}
							function temizadet<?php echo $sayi; ?>(){
								document.getElementById("gadet<?php echo $sayi; ?>").classList.remove('hata');
							}
							
							
							</script>