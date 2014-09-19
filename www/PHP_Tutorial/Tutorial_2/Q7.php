<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
/*
Develop a script that creates variables and assigns suitable values for the float and Boolean types and then displays them on the screen.
*/
$f_bookPrice = 19.99;
$f_fruitPrice = '12.99';
$b_flag = $f_bookPrice > $f_fruitPrice;

echo '<p>The book price is: ' . "$f_bookPrice" . '</p>';
echo '<p>The fruit price is: ' . "$f_fruitPrice" . '</p>';
echo '<p>book price > fruit price? ' . $b_flag . '</p>';

?>
</body>
</html>