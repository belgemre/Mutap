<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="tr-TR">
<head profile="http://gmpg.org/xfn/11">
<meta name="distribution" content="global" />
<meta name="language" content="tr" />
<meta name="robots" content="index,follow" />	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="tr" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>BELGEM | Yönetici Paneli</title>


<!-- Include Twitter Bootstrap and jQuery: -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>




<body>
<!-- Initialize the plugin: -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect({
            includeSelectAllOption: true
        });
    });
</script>

<!-- Build your select: -->
<select id="example-getting-started" multiple="multiple">
    <option value="cheese">Cheese</option>
    <option value="tomatoes">Tomatoes</option>
    <option value="mozarella">Mozzarella</option>
    <option value="mushrooms">Mushrooms</option>
    <option value="pepperoni">Pepperoni</option>
    <option value="onions">Onions</option>
</select>
</body>
</html>