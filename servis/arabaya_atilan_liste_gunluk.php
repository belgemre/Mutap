<?php include 'header.php'; ?>

	<div class="container ana">
		
				<div class="well">
		  <!-- Default panel contents -->
		  <span class="f18 gri">Arabaya Atılan Ürün (GÜNLÜK) <i class="fa fa-truck pull-right"></i></span>
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
					</tr>
				</thead>
				<tbody class="searchable">
			<?php
				include 'baglan.php';
				$stmt = $vt->prepare("SELECT tarih, SUM(kayran),SUM(bayran),SUM(doruk),SUM(kasar),SUM(tulum),SUM(tereyag) FROM arabayaatilan GROUP BY tarih order by tarih DESC");
				$stmt->execute();
				$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			?>
			
			<tr>
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['tarih']; ?></td>
				<td ><?php echo $row['SUM(kayran)']; ?></td>
				<td ><?php echo $row['SUM(bayran)']; ?></td>
				<td ><?php echo $row['SUM(doruk)']; ?></td>
				<td ><?php echo $row['SUM(kasar)']; ?></td>
				<td ><?php echo $row['SUM(tulum)']; ?></td>
				<td ><?php echo $row['SUM(tereyag)']; ?></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>	
			
			
		</div>
		</div>

</div>


<?php include 'footer.php'; ?>