<?php include 'header.php'; ?>

	<div class="container ana">
		
				<div class="well">
		  <!-- Default panel contents -->
		  <span class="f18 gri">Servis Sonu Raporu <i class="fa fa-pie-chart pull-right"></i></span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
				
					<tr>
						<th style="border-right:2px solid #000;">S.N</th>
						<th style="border-right:2px solid #000;">Tarih</th>
						<th>K.Ayran Atılan</th>
						<th>K.Ayran Satılan</th>
						<th style="border-right:2px solid #000; color:#f60">K.Ayran Kalan</th>
						<th>B.Ayran Atılan</th>
						<th>B.Ayran Satılan</th>
						<th style="border-right:2px solid #000; color:#f60">B.Ayran Kalan</th>
						<th>Doruk Atılan</th>
						<th>Doruk Satılan</th>
						<th style="border-right:2px solid #000; color:#f60">Doruk Kalan</th>
						<th>Kasar Atılan</th>
						<th>Kasar Satılan</th>
						<th style="border-right:2px solid #000; color:#f60">Kasar Kalan</th>
						<th>Tulum Atılan</th>
						<th>Tulum Satılan</th>
						<th style="border-right:2px solid #000; color:#f60">Tulum Kalan</th>
						<th>Tereyağ Atılan</th>
						<th>Tereyağ Satılan</th>
						<th style="border-right:2px solid #000; color:#f60">Tereyağ Kalan</th>

					</tr>
				</thead>
				<tbody class="searchable">
			<?php
				include 'baglan.php';
				$stmt = $vt->prepare("
				
				select * from 
				
				(SELECT tarih, SUM(sd_ayran),SUM(sd_bayran),SUM(sd_doruk),SUM(sd_kasar),SUM(sd_tulum),SUM(sd_tereyag) FROM satisdetay GROUP BY tarih) A
				
				JOIN 
				
				(SELECT tarih, SUM(kayran),SUM(bayran),SUM(doruk),SUM(kasar),SUM(tulum),SUM(tereyag) FROM arabayaatilan GROUP BY tarih) B 
				
				where A.tarih=B.tarih order by A.tarih DESC
				
				");
				$stmt->execute();

				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>
			
			<tr>
			
				<td style="border-right:2px solid #000;"><?php echo $sayi=$sayi+1; ?></td>
				<td style="border-right:2px solid #000;"><?php echo $row['tarih']; ?></td>
				
				<td ><?php echo $row['SUM(kayran)']; ?></td>
				<td ><?php echo $row['SUM(sd_ayran)']; ?></td>
				<td style="border-right:2px solid #000; color:#f60"><?php echo $row['SUM(kayran)']-$row['SUM(sd_ayran)']; ?></td>
				
				<td ><?php echo $row['SUM(bayran)']; ?></td>
				<td ><?php echo $row['SUM(sd_bayran)']; ?></td>
				<td style="border-right:2px solid #000; color:#f60"><?php echo $row['SUM(bayran)']-$row['SUM(sd_bayran)']; ?></td>
				
				<td ><?php echo $row['SUM(doruk)']; ?></td>
				<td ><?php echo $row['SUM(sd_doruk)']; ?></td>
				<td style="border-right:2px solid #000; color:#f60"><?php echo $row['SUM(doruk)']-$row['SUM(sd_doruk)']; ?></td>
				
				<td ><?php echo $row['SUM(kasar)']; ?></td>
				<td ><?php echo $row['SUM(sd_kasar)']; ?></td>
				<td style="border-right:2px solid #000; color:#f60"><?php echo $row['SUM(kasar)']-$row['SUM(sd_kasar)']; ?></td>
				
				<td ><?php echo $row['SUM(tulum)']; ?></td>
				<td ><?php echo $row['SUM(sd_tulum)']; ?></td>
				<td style="border-right:2px solid #000; color:#f60"><?php echo $row['SUM(tulum)']-$row['SUM(sd_tulum)']; ?></td>
				
				<td ><?php echo $row['SUM(tereyag)']; ?></td>
				<td ><?php echo $row['SUM(sd_tereyag)']; ?></td>
				<td style="border-right:2px solid #000; color:#f60"><?php echo $row['SUM(tereyag)']-$row['SUM(sd_tereyag)']; ?></td>


			</tr>
			
			<?php } ?>
			</tbody>
			</table>	
			
		</div>
		</div>

</div>


<?php include 'footer.php'; ?>