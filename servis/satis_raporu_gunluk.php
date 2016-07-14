<?php include 'header.php'; ?>

	<div class="container ana">
		
				<div class="well">
		  <!-- Default panel contents -->
		  <span class="f18 gri">Satış Raporu (GÜNLÜK) <i class="fa fa-bar-chart  pull-right"></i></span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Tarih</th>
						<th>K.Ayran</th>
						<th>B.Ayran</th>
						<th>Doruk</th>
						<th>Kaşar </th>
						<th>Tulum</th>
						<th>Tereyağ</th>
						<th>Nakit</th>
					</tr>
				</thead>
				<tbody >
			<?php
				include 'baglan.php';
				$stmt = $vt->prepare("SELECT tarih, SUM(sd_ayran),SUM(sd_bayran),SUM(sd_doruk),SUM(sd_kasar),SUM(sd_tulum),SUM(sd_tereyag),SUM(nakit) FROM satisdetay GROUP BY tarih order by tarih DESC");
				$stmt->execute();
				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>
			
			<tr>
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['tarih']; ?></td>
				<td ><?php echo $row['SUM(sd_ayran)']; ?></td>
				<td ><?php echo $row['SUM(sd_bayran)']; ?></td>
				<td ><?php echo $row['SUM(sd_doruk)']; ?></td>
				<td ><?php echo $row['SUM(sd_kasar)']; ?></td>
				<td ><?php echo $row['SUM(sd_tulum)']; ?></td>
				<td ><?php echo $row['SUM(sd_tereyag)']; ?></td>
				<td ><?php echo $row['SUM(nakit)']; ?></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>	
		</div>
		</div>

</div>


<?php include 'footer.php'; ?>