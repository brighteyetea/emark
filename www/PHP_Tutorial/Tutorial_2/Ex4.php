<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//Example 4
define("AUTHOR", "James West");
define("AUTHOR2", "Janet Munro");
define("BOOK_NAME", "HTML5 and CSS");


/* when accessing to a constant, DO NOT use $ symbo and quotation marks */
echo "<p>";
echo AUTHOR2;
echo "</p>";
echo "<p>";
echo BOOK_NAME;
echo "</p>";
echo '<p>';
echo AUTHOR;
echo '</p>';

//or we can using . operator to concatenate strings and variables
echo "=======================";
echo "<p>" . AUTHOR2 . "<p>";
echo "<p>" . BOOK_NAME . "</p>";
echo "<p>" . AUTHOR . "</p>";

?>
</body>
</html>