<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Question 6</title>
</head>

<body>
<?php
	$veg = "Tomato";
	if($veg == "Carrot" || $veg == "carrot") {
		echo $veg . 's are orange';
	} else if($veg == "Bean" || $veg == "bean") {
		echo $veg . 's are green';
	} else if($veg == "Tomato" || $veg == "tomato") {
		echo $veg . 'es are red';
	} else {
		echo 'No matches!';
	}
?>
</body>
</html>
