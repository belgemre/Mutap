<?php include 'header.php'; ?>
<?php
if(isset($_GET['bs_id'])  ){
	$bs_id=@$_GET['bs_id'];
}else{
	header('Location: arabayaatilan-ayar.php');
}
?>
<div class="container ana">
	<div class="col-md-10 col-md-offset-1" >
	
		<input type="text" name="LastID" value="<?php if(isset($bs_id)){echo $bs_id;}else{echo "gelmedi";}?>" class="none" />
		
		<?php
			$sayi=1;
			$stmt = $db->prepare("SELECT * FROM musteriler A JOIN yapilanservisler B ON A.liste=B.guzergah_id where B.bs_id=$bs_id order by sira ");
			$stmt->execute();

			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
			$m_id=$row['m_id'];
			
			$verilenurun_sorgu = $db->prepare("SELECT * FROM satishesaptakip 
				where 
				bs_id= $bs_id &&
				musteri_id = $m_id
				");
			$verilenurun_sorgu->execute();	
		?>
		
		<div class="well" style="cursor: pointer;  <?php if($verilenurun_sorgu->rowCount()){ echo "opacity:0.2;";} ?>" data-toggle='modal' data-target='.bs-example-modal-sm-musteri<?php echo $sayi; ?>' >
			<?php echo $row['musteri']; ?>
		</div>
		
		<?php include 'modal/musterikolaybilgi.php';?>	<!-- MÜŞTERİ KOLAY BİLGİ MODAL -->
		
		<?php $sayi=$sayi+1; } ?>
			
	</div>
</div>

<?php include 'modal/servisbitir.php';?><!--Servis Bitir Modal -->
<?php include 'modal/arabadakiurunler.php';?><!--Arabadaki Ürünler Modal -->
<?php include 'modal/hatamodal.php';?><!-- Small modal BİLGİ-->
<?php include 'footer.php'; ?><!-- ALT KISIM-->