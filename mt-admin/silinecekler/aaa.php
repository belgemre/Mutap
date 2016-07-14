<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title></title>
<script language="JavaScript" type="text/javascript">
<!--

function ColectSel(selid,tbid){
 var sel=document.getElementById(selid);
 var tb=document.getElementById(tbid);
 tb.value='';
 for (var zxc0=0;zxc0 < sel.options.length; zxc0++ ){
  tb.value+=sel.options[zxc0].value+',';
 }
}

//-->
</script></head>

<body>
<select id="tom" >
<option value="A" >AAAAAAA</option>
<option value="B" >BBBBBBB</option>
<option value="C" >CCCCCCC</option>
<option value="D" >DDDDDDD</option>
</select>
<input id="fred" value="normally hidden" >
<input type="button" value="TEST" onclick="ColectSel('tom','fred');" >
</body>

</html>