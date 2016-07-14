<?php include 'header.php'; ?>
<?php
include 'baglan.php';
	$sorgu = $vt->prepare("select * from servisciler where s_id=?");
	$sorgu->execute(array("$id"));
	$islem = $sorgu->fetch();
	$adsoyad = $islem["adsoyad"];
?>
	<div class="container ana">
		
		<div style="margin:20px;">
			
			<h3>Sayın <strong><?php echo $adsoyad;?></strong></h3>
			
		</div>
	</div>
	

<?php include 'footer.php'; ?>