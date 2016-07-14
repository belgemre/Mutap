<?php include 'header.php'; ?>

	<div class="container ana">
		
				<div class="main">
		  <!-- Default panel contents -->
		  <span class="f18 gri pull-right">Servis Sonu Raporu</span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Tarih</th>
						<th>K.Ayran Atılan</th>
						<th >K.Ayran Satılan</th>
						<th style="color:#f60">K.Ayran Kalan</th>
						<th>B.Ayran Atılan</th>
						<th>B.Ayran Satılan</th>
						<th style="color:#f60">B.Ayran Kalan</th>



						

					</tr>
				</thead>
				<tbody >
			<?php
				include 'baglan.php';
				$stmt = $vt->prepare("
				select * from (SELECT tarih, SUM(sd_ayran),SUM(sd_bayran) FROM satisdetay GROUP BY tarih) A
				JOIN (SELECT tarih, SUM(kayran),SUM(bayran) FROM arabayaatilan GROUP BY tarih) B where A.tarih=B.tarih 
				;");
				$stmt->execute();

				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>
			
			<tr>
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['tarih']; ?></td>
				<td ><?php echo $row['SUM(kayran)']; ?></td>
				<td ><?php echo $row['SUM(sd_ayran)']; ?></td>
				<td style="color:#f60"><?php echo $row['SUM(kayran)']-$row['SUM(sd_ayran)']; ?></td>
				
				<td ><?php echo $row['SUM(bayran)']; ?></td>
				<td ><?php echo $row['SUM(sd_bayran)']; ?></td>
				<td style="color:#f60"><?php echo $row['SUM(bayran)']-$row['SUM(sd_bayran)']; ?></td>


				

				
				


			</tr>
			
			<?php } ?>
			</tbody>
			</table>	
			
		</div>
		</div>

</div>


<?php include 'footer.php'; ?>