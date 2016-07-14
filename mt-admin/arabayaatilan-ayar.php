<?php include 'header.php'; ?>

<div class="container ana">


	<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well" >
					<span class="f18 gri ">Servis Başlat <i class="fa fa-sign-in pull-right"></i></span>
					<div style="clear:both"></div><hr class="m15top m15bottom" />
		<form role="form" method="post" id="yeniurun" action="arabayaatilan.php" >	
			<div class="row">
				     <div class="col-xs-12 col-sm-12 col-md-4" >
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
					 <div class="col-xs-12 col-sm-12 col-md-4" >
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
					 <div class="col-xs-12 col-sm-12 col-md-4" >
						<div class="form-group">
							<button type="submit" name="kydt" style="margin-top:25px;" class="btn btn-primary btn-lg btn-block">Başlat</button>
						</div>
				     </div>
			</div>

		</form>	

	</div>
	<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well" >
		<span class="f18 gri">Devam Eden Servisler <i class="fa fa-truck pull-right"></i></span>
					<div style="clear:both"></div><hr class="m15top m15bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Servis Türü</th>
						<th>Araç</th>
						<th>Tarih</th>
						<th>Başlangıç</th>
						<th>Durum</th>
					</tr>
				</thead>
				<tbody >
			<?php
				
				$stmt = $db->prepare("SELECT * FROM yapilanservisler A JOIN araclar C JOIN serviscesit E 
				where 
				A.servis_id=E.servis_id and
				A.arac_id=C.arac_id and
				durum=0");
				$stmt->execute();
				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>

			<tr>
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['servis_adi']; ?></td>
				<td ><?php echo $row['marka']." - ".$row['model']; ?></td>
				<td ><?php echo $row['tarih']; ?></td>
				<td ><?php echo $row['baslangic_saati']; ?></td>
				<td >
					<a class="btn btn-xs btn-success"href="servis-basladi.php?
					bs_id=<?php echo $row['bs_id']; ?>">Bu Servise Git <i class="fa fa-arrow-right"></i></a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
			</table>	
		</div>	
	</div>

	</div><!----- Container Son ---->
<?php include 'footer.php'; ?>