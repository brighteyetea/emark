<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="text" name="str1" />
<input type="submit" name="submit" />
</form>

<?php
//$str1 = $_GET["str1"];
$str1 = "\t\r\n";
$mode = "/\s/";
if(isset($_GET["submit"])) {
	echo "done";	
	if(preg_match($mode, $str1, $arr)) {
		echo "Your input: " . $str1 . " matches mode: " . $mode . ", the content is: " . $arr[0];
	} else {
		echo "Matching failed: " . $arr[0];	
	}
} else {
	echo "not done";	
}
echo "<br/>Your Input: " . $str1;


?>
</body>
</html>