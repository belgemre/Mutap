function sozlesmebuton()
{
	if (document.forms[0].cb_rules_agree.checked){
	document.forms[0].gonder.disabled = false;
	}else{
		document.forms[0].gonder.disabled = true;
	     }
}

$(document).ready(function(){
	$('#guncelle').hide(0);
	$('.basarili').hide(0);
  
});

function kaydetamk (){
	var firmaadi=$('input[name=firmaadi]').val();
	var sahibi=$('input[name=sahibi]').val();
	var liste = document.getElementById("liste").value;
	var kayran = document.getElementById("kayran").value;
	var bayran = document.getElementById("bayran").value;
	var doruk = document.getElementById("doruk").value;
	var kasar = document.getElementById("kasar").value;
	var tulum = document.getElementById("tulum").value;
	var tereyag = document.getElementById("tereyag").value;
	var bakiye=$('input[name=bakiye]').val();
	var mkadi=$('input[name=mkadi]').val();
	var msifre=$('input[name=msifre]').val();
	
	
	
	if(firmaadi!="" 
	&& sahibi!="" 
	&& liste != "" 
	&& kayran != "" 
	&& bayran != "" 
	&& doruk != "" 
	&& kasar != "" 
	&& tulum != "" 
	&& tereyag != "" 
	&& bakiye != ""
	&& mkadi != ""
	&& msifre != ""){

        $.ajax({
					type:'POST',
					url:'yenimusteri-denetim.php',
					data:$('#yenimusteri').serialize(),
					success:function(data){
						if(data == 1){

							$('.firma-adi').text("Kullanılıyor.");
							document.getElementById("firmaadi1").classList.add('hata');
						}else if(data == 2){
							$('.kullanici-adi').text("Kullanılıyor.");
							document.getElementById("mkadi").classList.add('hata');
						}else if(data == 4){
							alert("Boş Alan var.");
						}else if(data == 3){
							alert("Kayıt sırasında bir hata oluştu.");
						}else{
							$('#kaydet').hide(0);
							$('#guncelle').delay(4000).fadeIn(1000);
						$('.basarili').fadeIn(1000).delay(3000).fadeOut(1000);
						
						document.forms[0].guncelle.disabled = false;
						}
						},
					error:function(){alert("Başarısız");}
        });
		return false;

		
	}
	
	
}



function temizlefirmaadi (){
	document.getElementById("firmaadi1").classList.remove('hata');
	$('.firma-adi').text("");
}
function temizlemkadi (){
	document.getElementById("mkadi").classList.remove('hata');
	$('.kullanici-adi').text("");
}

 $('.selectpicker').selectpicker();
  $('.selectpicker').selectpicker({
      style: 'btn-info',
      size: 4
  });