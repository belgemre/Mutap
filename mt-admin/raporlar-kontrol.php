<?php
require('../includes/config.php'); 
////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  ARABAYA ATILAN 
if(isset($_POST['urunler']) && isset($_POST['servisturleri']) ){
	

	$urunlist = implode(',', $_POST['urunler']);
	$servislist = implode(',', $_POST['servisturleri']);
	$araclist = implode(',', $_POST['araclar']);
	
	
	$trh = $_POST['trh'];
	function tarihDuzenle($trh){
		return implode('.',array_reverse(explode('-',$trh)));
	}
	$tarih=tarihDuzenle($trh);
	
	
	
	
	$ta_sorgu = $db->prepare("SELECT * FROM arabayaatilan where tarih=?");
	$ta_sorgu->execute(array($tarih));
	
	if($ta_sorgu->rowCount()){
		echo "<span class='f18 gri'><b class='red'>".$tarih."</b> Tarihinde Araçlara Yüklenen Ürünler <i class='fa fa-truck pull-right'></i></span>
			<div style='clear:both'></div><hr class='m5top m5bottom' />
				<div class='table-responsive'>
					<table id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>
						<thead>
							<tr>
								<th>S.N</th>
								<th>Ürünler</th>
								<th>Birim Miktar</th>
								
							</tr>
						</thead>
						<tbody class='searchable'>";
						
		$stmt = $db->prepare("SELECT tarih,urun_adi,sum(adet),birimi FROM arabayaatilan A JOIN urunler B ON A.urun_id=B.urun_id  
		where 
		A.tarih='$tarih' and 
		A.urun_id in ($urunlist) and
		A.servis_id in ($servislist) and
		A.arac_id in ($araclist)
		group by A.urun_id ");
		$stmt->execute(); 
		$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {  

				echo "<tr><td>".$sayi=1+$sayi."</td><td >".$row['urun_adi']."</td><td >".$row['sum(adet)']." ".$row['birimi']."</td></tr>";
			}
		echo "</tbody></table></div>";	
		echo "<script>
    $(document).ready( function () {

    $('#example').DataTable();

    });
</script>";
	}else{
		echo "<div><b class='red f18'>".$tarih."</b> tarihinde ürün çıkışı olmamış ya da kaydedilmemiş! <i class='fa fa-warning fa-2x pull-right red'></i></div>";
	}
	
	
}
//Araçlara yüklenen ürünler (saat'li)
if(isset($_POST['urunler2']) && isset($_POST['servisturleri2']) ){
	$urunlist   = implode(',', $_POST['urunler2']);
	$servislist = implode(',', $_POST['servisturleri2']);
	$araclist   = implode(',', $_POST['araclar2']);
	$trh = $_POST['trh2'];
	
	function tarihDuzenle($trh){
		return implode('.',array_reverse(explode('-',$trh)));
	}
	$tarih=tarihDuzenle($trh);
	
	$arac_sorgu = $db->prepare("SELECT marka,model FROM araclar where arac_id='$araclist'");
	$arac_sorgu->execute(); 
	$arac = $arac_sorgu->fetch(PDO::FETCH_ASSOC);
	
	$servis_sorgu = $db->prepare("SELECT servis_adi FROM serviscesit where servis_id='$servislist'");
	$servis_sorgu->execute(); 
	$servis = $servis_sorgu->fetch(PDO::FETCH_ASSOC);
	
	
	$ta_sorgu = $db->prepare("SELECT * FROM arabayaatilan where tarih=? and arac_id=? and servis_id=?");
	$ta_sorgu->execute(array($tarih,$araclist,$servislist));
	
	if($ta_sorgu->rowCount()){
		echo "<span class='f14 gri'><b class='red'>".$tarih."</b> Tarihinde <b class='red'>".$arac['marka']." ".$arac['model']."</b> Aracına <b class='red'>".$servis['servis_adi']."</b> Servisinde Yüklenen Ürünler <i class='fa fa-truck pull-right'></i></span>
			<div style='clear:both'></div><hr class='m5top m5bottom' />
				<div class='table-responsive'>
					<table id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>
						<thead>
							<tr>
								<th>S.N</th>
								<th>Yüklenme Saati</th>
								<th>Ürünler</th>
								<th>Birim Miktar</th>
								
							</tr>
						</thead>
						<tbody class='searchable'>";
						
		$stmt = $db->prepare("SELECT tarih,urun_adi,sum(adet),birimi,saat FROM arabayaatilan A JOIN urunler B ON A.urun_id=B.urun_id  
		where 
		A.tarih='$tarih' and 
		A.urun_id in ($urunlist) and
		A.servis_id in ($servislist) and
		A.arac_id in ($araclist)
		group by A.urun_id ");
		$stmt->execute(); 
		$sayi=0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {  

				echo "<tr><td>".$sayi=1+$sayi."</td><td >".$row['saat']."</td><td >".$row['urun_adi']."</td><td >".$row['sum(adet)']." ".$row['birimi']."</td></tr>";
				
			}
		echo "</tbody></table></div>";	
			
		//	$servisciler = $db->prepare("SELECT adi,soyadi FROM personel where userID=$servisciid");
		//	$servisciler->execute();
		//	$servisci = $servisciler->fetch(PDO::FETCH_ASSOC);
			
		// echo "<hr /><b>Servis Personeli: </b><b class='red'>".$servisci['adi']." ".$servisci['soyadi']."</b>";
		echo "<script>
    $(document).ready( function () {

    $('#example').DataTable();

    });
</script>";
	}else{
		echo "<div><b class='red f14'>".$tarih."</b> tarihinde <b class='red f14'>".$arac['marka']." ".$arac['model']."</b> aracına <b class='red f14'>".$servis['servis_adi']."</b> servisinde ürün yüklenmemiş yada kaydedilmemiş! <i class='fa fa-warning fa-2x pull-right red'></i></div>";
	}
	
}
?>