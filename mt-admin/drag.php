<?php include 'header.php'; ?>

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 	<script type="text/javascript">
	$(document).ready(function(){ 
		$("#liste ul").sortable({opacity: 0.5, update: function(){
			var siralama = $(this).sortable("serialize");
			$.post("db/db.php", siralama);											 
		}});
	});	
	</script>

	<style>
		ul {margin: 5px; padding: 5px; list-style-type: none;}
		#liste {float: left;}
		#liste li {cursor: move; margin: 3px 0; padding: 5px; 
		background-color:#abe; border: #ccc solid 1px; color:#fff;}
	</style>
</head>
<body>
 <div class="container ana">
		<div id="liste">
			<ul>
				<li id="listeId_guncelle" style="display: none;"></li>
				<?php
					$veriler = $db->prepare('SELECT m_id,musteri,m_adres FROM musteriler where liste=1 Order By sira Asc');
					$veriler->execute();
					while( $lst = $veriler->fetch(PDO::FETCH_ASSOC) ) { 
					?>
						<li id="listeId_<?php echo $lst['m_id']; ?>">
						<?php echo $lst['musteri']." - ".$lst['m_adres']; ?>
						</li>
					<?php } ?>
			</ul>
		</div>
</div>
<?php include 'footer.php'; ?>