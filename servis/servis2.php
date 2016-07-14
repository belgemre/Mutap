<?php include 'header.php'; ?>

<div class="container ana">

	<div class="col-md-4 clearfix">
	  <div class="main">
		  <span class="f18 gri ">Hatırlatılacaklar <i class="fa fa-sticky-note pull-right darkblue"></i></span>
		  <div style="clear:both"></div><hr class="m5top m5bottom" />

	  <ul>
	  <li>Merhaba De</li>
	  <li>5 kasa bırak</li>
	  </ul>
	  </div>
	</div>
	
	<div class="col-md-4 clearfix">
		<div class="main">
		  <span class="f18 gri">Siparişler <i class="fa fa-shopping-cart pull-right darkblue"></i></span>
		  <div style="clear:both"></div><hr class="m5top m5bottom" />

	  <ul>
	  <li>Saat 10'da Nimet Pide 10 Koli Ayran</li>
	  <li>Saat 15'de Aymar'a 5 kğ tulum</li>
	  </ul>
	  
	  </div>
	  
	</div>
	
	<div class="col-md-4  clearfix">
	  <div class="main">
		  <span class="f18 gri">Mesajlar <i class="fa fa-envelope pull-right darkblue"></i></span>
		  <div style="clear:both"></div><hr class="m5top m5bottom" />

	  <ul>
	  <li>Ben bırakacağım nimet Pide'ye 10 koli ayran (Salih)</li>
	  <li>Yuvam Kahvehanesine uğra akşam hesap için.</li>
	  </ul>
	  </div>
	</div>

		
	<div class="col-md-12">
		<div class="main">
			  <!-- Default panel contents -->
			  <span class="f32 gri">Müşterilerim <i class="fa fa-user-secret green pull-right"></i></span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />

					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>S.N</th>
									<th>Firma Adı</th>
									<th>Sahibi</th>
									<th>Bakiye</th>
									<th>Detay</th>
								</tr>
							</thead>
							<tbody class="searchable">
						<?php
						include 'baglan.php';
						$sth = $vt->prepare("SELECT `firma_adi`, `sahibi`,`bakiye`  FROM musteriler where liste=2 order by firma_adi");
						$sth->execute();
						$sayi=0;
						while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) { 
						?>

						<tr>
							<td ><?php echo $sayi=$sayi+1; ?></td>
							<td ><?php echo $row['firma_adi']; ?></td>
							<td ><?php echo $row['sahibi']; ?></td>
							<td ><?php echo $row['bakiye']; ?></td>
							<td ><a href="#"><span class="glyphicon glyphicon-new-window"></span></a></td>
						</tr>
						<?php } ?>
						</tbody>
						</table>
					</div>

		</div>
	</div>
</div>
<?php include 'footer.php'; ?>