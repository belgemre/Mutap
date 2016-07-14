<HTML>
<HEAD>
<TITLE>Dinamik Olarak Textbox Ekleme, Silme ve Yazma</TITLE>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
var a = 0;
 
function Ekleme() {
    a++;
    var dinamicDiv = document.createElement("div");
    dinamicDiv.id = "div"+a;
    dinamicDiv.style.height = "40px";
    dinamicDiv.style.width = "300px";
    document.body.appendChild(dinamicDiv);     
 
    var element = document.createElement("input");
    element.setAttribute("type", "text");
    element.setAttribute("value", "text"+a);
    element.setAttribute("name", "text"+a);
    element.setAttribute("id", "text"+a);     
 
    var divId = document.getElementById("div"+a);
    divId.appendChild(element);
}
 
function Silme() {
    var divsil = document.getElementById("div"+a);
    document.body.removeChild(divsil);
    a--;
}
 
function Yazma() {
    var veriler = new Array();
 
    for (i=1;i<a+1;i++){
    veriler[i-1] = document.getElementById("text"+i).value;
    yazim = document.getElementById('yazimyeri');
    }
    gonderimler = veriler.join('-');
    yazim.innerHTML = gonderimler;
    Gonderme(gonderimler);
}
 
function Gonderme(verim) {
    $.ajax({
    type:'POST',
        url:"veri.php?veri="+verim,
        success: function (msg) {
        $('div#sonuc').html(msg);
       }
     });
   }
</SCRIPT>
</HEAD>
<BODY>
<FORM>
<INPUT type="button" value="Ekleme" onclick="Ekleme()" />
<INPUT type="button" value="Silme" onclick="Silme()" />
<INPUT type="button" value="Yazma" onclick="Yazma()" />
<div id="yazimyeri"> </div>
<div id="sonuc"> </div>
</FORM>
</BODY>
</HTML>