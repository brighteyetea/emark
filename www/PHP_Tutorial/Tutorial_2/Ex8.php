<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//Example 8
$intA = 13;
echo '<p>$intA begins as ' . $intA . '</p>';	//13
echo '<p>$intA++ ' . $intA++ . '</p>';	//13
echo '<p>$intA is now really ' . $intA . '</p>';	//14

echo '<p>++$intA ' . ++$intA . '</p>';	//15
echo '<p>$intA-- ' . $intA-- . '</p>';	//15
echo '<p>$intA-- is now really ' . $intA . '</p>';	//14
echo '<p>--$intA ' . --$intA . '</p>';	//13
//change the data type and its value
$intA = "Hello World!";
echo '<p>Now the value of $intA is ' . $intA . '</p>';
?>
</body>
</html>