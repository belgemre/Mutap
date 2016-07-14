<?php include 'header.php'; ?>

	<div class="container ana">
		
		<div class="col-md-6 col-sm-6 col-xs-12"><!----- Firmaları Çekiyoruz ---->
		   <div class="main">
			<span class="f18 gri pull-right">Müşterilerim</span>
			<div style="clear:both"></div><hr class="m5top m5bottom" />
				<div class="table-responsive">
				  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Firma Adı</th>
								<th>Sahibi</th>
								<th>Cep</th>
								<th>Detay</th>
							</tr>
						</thead>
						<tbody class="searchable">
						
							<?php //veritabanına bağlandık.
							$sth = $db->prepare("SELECT * FROM musteriler");
							$sth->execute();
							$sayi=0;
							while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) { 
							?>

							<tr>
								<td ><?php echo $sayi=$sayi+1; ?></td>
								<td ><?php echo $row['firma_adi']; ?></td>
								<td ><?php echo $row['sahibi']; ?></td>
								<td ><?php echo $row['cep_tel']; ?></td>
								<td ><a href="#"><span class="glyphicon glyphicon-new-window"></span></a></td>
								
								
							</tr>
							
							<?php } ?>
						</tbody>
					</table>
				</div><!----- Responsive Son ---->
					
			</div><!----- Main Son ---->
			
		</div><!----- Firmaları Çekiyoruz Son ---->
		
		<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="main">
					<span class="f18 gri pull-right">Servisçilerim</span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />
					
									<div class="table-responsive">
				  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Adı</th>
								<th>Soyadı</th>
								<th>Cep</th>
								<th>Detay</th>
							</tr>
						</thead>
						<tbody class="searchable">
						
							<?php //veritabanına bağlandık.
							$sth = $db->prepare("SELECT * FROM personel where rol=2");
							$sth->execute();
							$sayi=0;
							while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) { 
							?>

							<tr>
								<td ><?php echo $sayi=$sayi+1; ?></td>
								<td ><?php echo $row['adi']; ?></td>
								<td ><?php echo $row['soyadi']; ?></td>
								<td ><?php echo $row['ceptel']; ?></td>
								<td ><a href="#"><span class="glyphicon glyphicon-new-window"></span></a></td>
								
								
							</tr>
							
							<?php } ?>
						</tbody>
					</table>
				</div><!----- Responsive Son ---->
					
				</div><!----- Main Son ---->
				
		</div><!----- Gelen Mesajlar Son ---->
		
	</div><!----- Container Son ---->
	



<?php include 'footer.php'; ?>
        