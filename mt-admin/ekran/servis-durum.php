<div class="panel-heading " role="tab" >
		  <h2 class="panel-title uptext row">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#servisdurum" aria-expanded="true" aria-controls="sozon">
			 <div class="row"> 
				<div class="col-md-12 gri">
					<b>Devam Eden</b> Servisler <i class="fa fa-truck pull-right"></i>
				</div>
			 </div>
			 <div class="clear"></div>
			 
			</a>
		  </h2>
</div>
<div id="servisdurum" class="panel-collapse collapse" role="tabpanel" aria-labelledby="onsoz">
	<hr class="m15top m15bottom" />

	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>S.N</th>
					<th>Servis Türü</th>
					<th>Güzergah</th>
					<th>Araç</th>
					<th>Servisçi</th>
					<th>Tarih</th>
					<th>Başlangıç</th>
					<th>Durum</th>
				</tr>
			</thead>
			<tbody >
		<?php
			
			$stmt = $db->prepare("SELECT * FROM yapilanservisler A JOIN guzergahlar B JOIN araclar C JOIN personel D JOIN serviscesit E 
			where 
			A.servis_id=E.servis_id and
			A.guzergah_id=B.guzergah_id and
			A.arac_id=C.arac_id and
			A.servisci_id=D.userID and
			durum=0	");
			$stmt->execute();
			$sayi=0;
		while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
		?>

		<tr>
			<td ><?php echo $sayi=$sayi+1; ?></td>
			<td ><?php echo $row['servis_adi']; ?></td>
			<td ><?php echo $row['guzergah_adi']; ?></td>
			<td ><?php echo $row['marka']." - ".$row['model']; ?></td>
			<td ><?php echo $row['adi']." ".$row['soyadi']; ?></td>
			<td ><?php echo $row['tarih']; ?></td>
			<td ><?php echo $row['baslangic_saati']; ?></td>
			<td ><?php if($row['durum']==0){?>
				<a class="btn btn-xs btn-success"href="servis-basladi.php?
					bs_id=<?php echo $row['bs_id'];?>">Devam ediyor... <i class="fa fa-arrow-right"></i></a>
			<?php	}else{
					echo $row['bitis_saati']; 
					} ?>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		</table>	
	</div>	
</div>