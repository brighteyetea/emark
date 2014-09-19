<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$hostname = "localhost";
$dbname = "slimtest";
$uname = "root";
$pwd = "root";
try {
	$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $uname, $pwd);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sth = $dbh->prepare("select * from articles");
	$sth->execute();
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	while($row = $sth->fetch()) {
		echo $row['id'] . ", " . $row['title'] . ", " . $row['date'] . "<br/>";	
	}
	
} catch(PDOExcpetion $err) {}

?>
</body>
</html>