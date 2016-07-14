<!-- MÜŞTERİ KOLAY BİLGİ MODAL -->
<div class="modal fade bs-example-modal-sm-musteri<?php echo $sayi; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
	<div class="modal-content" >
	   <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><?php echo $row['musteri']; ?></h4>
	  </div>
	  <div class="modal-body">
			<a class="btn btn-lg btn-primary btn-block"href="urunver.php?
				bs_id=<?php echo $bs_id;?>&musteri=<?php echo $row['m_id'];?>">
				<i class="fa fa-shopping-cart pull-left m5top"></i>
				<?php 
					$musteri_id=$row['m_id'];
					$verilen_sorgu = $db->prepare("SELECT * FROM satisdetaylari 
					where 
					bs_id=$bs_id && 
					musteri_id=$musteri_id
					");
					$verilen_sorgu->execute();

					if($verilen_sorgu->rowCount()){ echo "Verilen Ürünler";}else{
						echo "Ürün Ver";
					}
				?>
				<i class="fa fa-arrow-right pull-right"></i>
			</a>					
			<a class="btn btn-lg btn-success btn-block"href="musteri-detay.php?musteri=<?php echo $row['userID']; ?>">
				<i class="fa fa-briefcase pull-left m5top"></i> Müşteri Bakiye Bilgileri <i class="fa fa-arrow-right pull-right"></i>
			</a>
			<a class="btn btn-lg btn-info btn-block"href="kullanici-detay.php?kullanici=<?php echo $row['userID']; ?>">
				<span class="glyphicon glyphicon-user pull-left"></span> Kullanıcı Bilgileri <i class="fa fa-arrow-right pull-right"></i>
			</a>

	  </div>
	 
	</div>
  </div>
</div>	