<?php include 'header.php'; ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well" >
					
		<form role="form" method="post" id="servisbasladiform" action="servis-basladi.php" >	
			<div class="row">
				     <div class="col-xs-6 col-sm-6 col-md-6" >
						 <div class="form-group">
							<select  name="guzergahtur" id="guzergahtur" class="form-control form" required>
								<option value="" >Güzergah Türü Seç</option>
								<?php
									$stmt = $db->prepare("SELECT * FROM guzergahlar");
									$stmt->execute();	
									while( $serviscesit = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
								?>
									<option value="<?php echo $serviscesit['guzergah_id']; ?>" ><?php echo $serviscesit['guzergah_adi']; ?></option>
								<?php } ?>
							</select>
						</div>
				     </div>
					 <div class="col-xs-6 col-sm-6 col-md-6" >
						<div class="form-group">
							<button type="submit" name="kydt" id="kydtbtn" onClick="kaydet()" class="btn btn-primary btn-lg btn-block">Bu Servisi Başlat</button>
						</div>
				     </div>
			</div>

		</form>	

		</div>
<?php include 'footer.php'; ?>