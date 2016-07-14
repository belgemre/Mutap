		<div class="panel-heading " role="tab" >
		  <h2 class="panel-title uptext row">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#servisbaslat" aria-expanded="true" aria-controls="sozon">
			 <div class="row"> 
				<div class="col-md-12 gri">
					Kolay <b>Servis</b> Başlat <i class="fa fa-sign-in pull-right"></i>
				</div>
			 </div>
			 <div class="clear"></div>
			 
			</a>
		  </h2>
		</div>
		<div id="servisbaslat" class="panel-collapse collapse" role="tabpanel" aria-labelledby="kolayservis">
			 <hr class="m15top m15bottom" />
				<form role="form" method="post" id="yeniurun" action="arabayaatilan.php" >	
					<div class="row">
							 <div class="col-xs-12 col-sm-12 col-md-12" >
								 <div class="form-group">
									<label >Servis Türü:</label>
									<select  name="servistur" id="servistur" class="form-control form" required>
										<option value="" >Servis Türü</option>
										<?php
											$stmt = $db->prepare("SELECT * FROM serviscesit");
											$stmt->execute();	
											while( $serviscesit = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
										?>
										<option value="<?php echo $serviscesit['servis_id']; ?>" ><?php echo $serviscesit['servis_adi']; ?></option>
										<?php } ?>
									</select>
								</div>
							 </div>
							 <div class="col-xs-12 col-sm-12 col-md-12" >
								<div class="form-group">
									<label >Servis Aracı:</label>
									<select  name="arac" id="arac" class="form-control form" required>
										<option value="" >Araç Seç</option>
									<?php
											$stmt = $db->prepare("SELECT * FROM araclar where atipi='Servis' ");
											$stmt->execute();	
											while( $araclar = $stmt->fetch(PDO::FETCH_ASSOC) ) {
													
													$aracid = $araclar['arac_id'];
													
													$servisci_sorgu = $db->prepare("SELECT * FROM yapilanservisler 
														where 
														arac_id=$aracid and 
														durum=0
													");
													$servisci_sorgu->execute();

													if(!$servisci_sorgu->rowCount()){ ?>
														<option value="<?php echo $araclar['arac_id']; ?>"><?php echo $araclar['marka']." ".$araclar['model']; ?></option>		
													<?php }else{ ?>
														<option value="" disabled><?php echo $araclar['marka']." ".$araclar['model']." - Serviste..."; ?></option>
														
												<?php	}		
												} ?>
									</select>
								</div>
							 </div>
							 <div class="col-xs-12 col-sm-12 col-md-12" >
								<div class="form-group">
									<button type="submit" name="kydt" class="btn btn-primary btn-lg btn-block">Devam Et</button>
								</div>
							 </div>
					</div>

				</form>	
		</div>
		
		