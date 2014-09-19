<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//Associative Arrays (non-numerical keys)
	echo "<h3>Associative Arrays:</h3>";
	$myBook = array(
		"Title" => "10th Aniversary", 
		"Author" => "James Patterson", 
		"PubYear" => 2010);
	foreach($myBook as $key => $value) {
		echo "<p>The $key is $value</p>";	
	}


?>

</body>
</html>