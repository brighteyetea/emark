<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>1.php</title>
</head>

<body>
<?php 
if(isset($_POST["tijiao"])) {
	$uname = $_REQUEST["username"];
	$upwd = $_REQUEST["pwd"];
	echo "Welcome, $uname, your password is: $upwd";
} else {
	echo "The form hasn't been submitted!";	
}
echo "<br/>=======================<br/>";
echo $username;
echo "<br/>$pwd<br/>";

echo $_GET["first"] . ", " . $first;
echo $_GET["second"] . ", " . $second;

phpinfo();
echo $_SERVER["REMOTE_ADDR"] . "<br/>";
echo $_SERVER["DOCUMENT_ROOT"] . "<br/>";
echo $_ENV["REMOTE_ADDR"];
?>

	
    
    
    
</form>
</body>
</html>