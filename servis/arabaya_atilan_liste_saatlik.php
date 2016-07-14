<?php include 'header.php'; ?>

	<div class="container ana">
		
		<div class="well">
		  <!-- Default panel contents -->
		  <span class="f18 gri">Arabaya Atılan Ürün (SAATLİK)<i class="fa fa-truck pull-right"></i></span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />

			<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Tarih</th>
						<th>Saat</th>
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
			$sth = $vt->prepare("SELECT *  FROM arabayaatilan where araba=2 order by tarih DESC, saat DESC");
			$sth->execute();
			$sayi=0;
			while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) { 
			?>
			
			<tr>
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['tarih']; ?></td>
				<td ><?php echo $row['saat']; ?></td>
				<td ><?php echo $row['kayran']; ?></td>
				<td ><?php echo $row['bayran']; ?></td>
				<td ><?php echo $row['doruk']; ?></td>
				<td ><?php echo $row['kasar']; ?></td>
				<td ><?php echo $row['tulum']; ?></td>
				<td ><?php echo $row['tereyag']; ?></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>	
			</div>
		</div>
</div>


<?php include 'footer.php'; ?>