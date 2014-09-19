<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//Example 6
$intA = 5;
$intB = 4;
$intA += $intB;
echo "<p>5 + $intB = $intA</p>";
$intA = 5;
$intA -= $intB;
echo "<p>5 - $intB = $intA</p>";
$intA = 5;
$intA *= $intB;
echo "<p>5 * $intB = $intA</p>";
$intA = 5;
$intA /= $intB;
echo "<p>5 / $intB = $intA</p>";
$intA = 5;
$intA %= $intB;
echo "<p>5 % $intB = $intA</p>";
?>
</body>
</html>