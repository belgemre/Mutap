<?php include 'header.php'; ?>


<div class="container ana">

		
		<div class="col-xs-12 col-sm-12 col-md-12 well" >
					<span class="f18 gri ">Son tanımlanan Müşteri - Ürün - Fiyat Tablosu</span>
					<div style="clear:both"></div>
					<hr class="m15top m15bottom" />
							<div class="table-responsive">
			
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Fiyat</th>
							<th>Tarih</th>
							<th>id</th>
						</tr>
					</thead>
					<tbody >
				<?php
					$sayfa=@$_GET['kullanici'];
					if(empty($sayfa) || !is_numeric($sayfa)){$sayfa=1;}
					$sql="SELECT * FROM ozelfiyat where ozelfiyat_id = $sayfa";
					
					
					$stmt = $db->prepare($sql);
					$stmt->execute();
					$sayi=0;
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
					
				
				
				?>
					
				<tr>
					<td ><?php echo $row['fiyat']; ?></td>
					<td ><?php echo $row['tarih']; ?></td>
					<td ><?php $id=$row['ozelfiyat_id'];echo $id; ?></td>
					
		

				</tr>
				
				</tbody>
				</table>	
				<?php 
$onceki=$db->prepare("select ozelfiyat_id from ozelfiyat where ozelfiyat_id > '$id' order by ozelfiyat_id LIMIT 1");
$onceki->execute();
$veri = $onceki->fetch(PDO::FETCH_ASSOC);
$onceki_id = $veri['ozelfiyat_id'] ;   

?>
	<a href="servis-baslat.php?kullanici=<?php echo $onceki_id; ?>" >İleri</a>		
	<?php if($_GET){
		echo $onceki_id;
		$sayfa=@$_GET['kullanici'];
		echo $sayfa;
	} ?>
			</div>
		
		 </div>
		
	</div><!----- Container Son ---->

<?php include 'footer.php'; ?>
        