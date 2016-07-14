<?php include 'header.php'; ?>
<div class="container ana" >
    <div class="well">
			<span class="f18 gri ">Servis Çizelgesi <i class="fa fa-sticky-note pull-right"></i></span>
					<div style="clear:both"></div><hr class="m5top m5bottom" />
			<div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Tarih</th>
						<th>Saat</th>
						<th>Müşteri</th>
						<th>K.Ayran</th>
						<th>B.Ayran</th>
						<th>Doruk</th>
						<th>Kaşar </th>
						<th>Tulum</th>
						<th>Tereyağ</th>
						<th>Alınan Para (TL)</th>
					</tr>
				</thead>
                <tbody>
              <?php
			include 'baglan.php';
			$sth = $vt->prepare("SELECT *  FROM satisdetay LEFT JOIN musteriler ON (satisdetay.m_id=musteriler.m_id) order by tarih DESC, saat DESC ");
			$sth->execute();
			$sayi=0;
			while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) { 
			?>
			

			<tr>
				<td ><?php echo $sayi=$sayi+1; ?></td>
				<td ><?php echo $row['tarih']; ?></td>
				<td ><?php echo $row['saat']; ?></td>
				<td ><?php echo $row['firma_adi']; ?></td>
				<td ><?php echo $row['sd_ayran']; ?></td>
				<td ><?php echo $row['sd_bayran']; ?></td>
				<td ><?php echo $row['sd_doruk']; ?></td>
				<td ><?php echo $row['sd_kasar']; ?></td>
				<td ><?php echo $row['sd_tulum']; ?></td>
				<td ><?php echo $row['sd_tereyag']; ?></td>
				<td ><?php echo $row['nakit']; ?></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			</div>
        </div>
</div>




<?php include 'footer.php'; ?>