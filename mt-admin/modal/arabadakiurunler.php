<button class="btn btn-success arabadakiler-buton btnCar" name="btn-arabadakiler" id="btn-arabadakiler" data-toggle="tooltip" data-placement="top" title="Araçtaki Ürünleri Göster!" /><i class="fa fa-truck"></i></button>
<!--Arabadaki Ürünler Modal -->
<div class="modal fade" id="arabadakiurunler" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog">
	<div class="modal-content">
	   <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><i class="fa fa-truck"></i>
		<?php
			$stmt = $db->prepare("SELECT * FROM yapilanservisler A JOIN araclar B ON A.arac_id=B.arac_id where A.bs_id=$bs_id");
			$stmt->execute();
			$araclar = $stmt->fetch(PDO::FETCH_ASSOC);
			$aracadi = $araclar['marka']." ".$araclar['model'];
		?>
		<b class="red"><?php echo $aracadi;?></b> Aracında Yüklü Ürünler Tablosu
		</h4>
	  </div>
	  <div class="modal-body">
		
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							
							<th>Ürün / Mal</th>
							<th class="darkblue">Yüklenen</th>
							<th class="red">Satılan</th>
							<th class="green">Kalan</th>
							
						
						</tr>
					</thead>
					<tbody >
					
			<?php
					
			$stmt = $db->prepare("SELECT * FROM yapilanservisler where bs_id=$bs_id");
			$stmt->execute();
			$ys = $stmt->fetch(PDO::FETCH_ASSOC);
			$arac_id = $ys['arac_id'];
			$servis_id = $ys['servis_id'];
			$servisci_id = $ys['servisci_id'];
			$tarihh = $ys['tarih'];
			
				$aa = $db->prepare("SELECT * FROM 
				(SELECT * FROM arabayaatilan where tarih='$tarihh' and arac_id=$arac_id and servis_id=$servis_id) A 
				
				LEFT JOIN
				
				(SELECT sum(adet),urun_id FROM satisdetaylari where bs_id=$bs_id group by urun_id ) B ON
				A.urun_id=B.urun_id
				
				left JOIN
				
				(SELECT urun_id,urun_adi,birimi FROM urunler) C
				 ON A.urun_id=C.urun_id
	 
				");
				$aa->execute();
				$sayi=0;
				while( $aracc = $aa->fetch(PDO::FETCH_ASSOC) ) { 
				?>

				<tr>
					
					<td ><?php echo $aracc['urun_adi']; ?></td>
					<td class="darkblue" ><?php echo $aracc['adet']; ?></td>
					<td class="red" ><?php if($aracc['sum(adet)']==""){echo 0;}else{echo $aracc['sum(adet)'];} ?></td>
					<?php $kalan=$aracc['adet']-$aracc['sum(adet)']; ?>
					<td class="green"><?php if($kalan==0){echo "<i class='fa fa-exclamation red f18' aria-hidden='true'></i>"." ".$kalan; }else{echo $kalan;} echo " ".$aracc['birimi']; ?></td>
					
				</tr>
				<?php } ?>
				</tbody>
				</table>	
			</div>

		
		
	  </div>
	  <div class="modal-footer">
		
			<div class="col-md-3 pull-right">
				<button type="button" class="btn btn-default btn-block" data-dismiss="modal">TAMAM</button>
			</div>

	  </div>
	</div>
  </div>
</div>	<!--Arabadaki Ürünler Modal Son-->
<script>
$('button.btnCar').on('click', function (e) {
    $('#arabadakiurunler').modal('show');
});
</script>