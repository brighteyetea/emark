<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//Example 3
$strName = 'Jonathon';
$intAge = 27;
$strCity = 'Brisbane';

echo "<p>$strName</p>";
echo "<p>$intAge</p>";
echo "<p>$strCity</p>";

$strName = 'Wendy';
$intAge = 24;
$strCity = 'Melbourne';

echo '<p>The details have been changed - they are now</p>';
echo "<p>$strName</p>";
echo "<p>$intAge</p>";
echo "<p>$strCity</p>";

echo '===================<br/>';
echo $strName . '<br/>';
echo $intAge . '<br/>';
echo $strCity . '<br/>';

?>

</body>
</html>