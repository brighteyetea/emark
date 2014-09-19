<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<?php 
$user = "billk";
$pwd = "password";
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$hash = md5($pwd);
$hash_md5 = md5($salt . $pwd);
echo "Original password: " . $pwd . "<br/>";
echo "Original salt: " . $salt . "<br/>";
echo "Md5 of password: " . $hash . "<br/>";
echo "Md5 of password with salt: " . $hash_md5; 

echo "<br/>=====================<br/>";
echo "tafe123: " . md5("tafe123");
echo "<br/>";
echo "Tafe123: " . md5("Tafe123");

?>
</body>
</html>