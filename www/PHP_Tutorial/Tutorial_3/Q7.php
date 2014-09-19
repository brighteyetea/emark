<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Question 7</title>
</head>

<body>
<?php
	$veg = "Tomato";
	switch($veg) {
		case "carrot":
		case "Carrot": 
			echo '<p>' . $veg . 's are orange</p>';
			break;
		case "bean":
		case "Bean":
			echo '<p>' . $veg . 's are green</p>';
			break;
		case "tomato":
		case "Tomato":
			echo '<p>' . $veg . 'es are red</p>';
			break;
		default:
			echo "<p>No matches!</p>";
			break;
	}
	
?>
</body>
</html>
