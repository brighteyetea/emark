<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
/*
Do some research and find out how you would handle storing a value such as Wilson’s in a variable. Write a script to demonstrate. 
(hint: It involves escape characters). Include this aspect in a script to show how it works.
*/

//two ways of defining string including '
$str1 = 'Hello, Wilson\'s';
echo $str1, '<br/>';

$str2 = "Hello, Wilson's";
echo $str2,'<br />';

//two ways of defing string including "
$str3 = "\"Hello, Wilson's\"";
echo $str3, '<br/>';
$str4 = '"Hello, Wilson\'s"';
echo $str4, '<br/>';
?>
</body>
</html>