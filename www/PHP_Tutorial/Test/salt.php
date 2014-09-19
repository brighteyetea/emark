<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php 
$user = 'billk';
$pass = 'simple'; // password
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$hash_md5 = md5($salt.$pass.$user); // md5 hash with salt
// echo now
echo 'Original Password: '.$pass.'<br><br>'; 
echo 'Original Salt: '.$salt.'<br><br>'; 
echo 'Username: '.$user.'<br><br>'; 
echo 'Salt.Password.Username: '.$salt.$pass.$user.'<br><br>'; 
echo 'MD5 of Password with Username and Salt: '.$hash_md5.'<br><br>';
?>
</body>
</html>