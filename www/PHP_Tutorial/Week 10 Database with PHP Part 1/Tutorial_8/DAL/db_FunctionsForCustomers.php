<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Customers</title>
</head>

<body>
<?php 
//	Declare global variables
$dsn = "mysql:host=localhost;dbname=mavis";
$user = "root";
$pwd = "root";

$dbConn = NULL;
$stmt = NULL;
$numRecords = 0;

function connect() {
	global $dsn, $user, $pwd, $dbConn;
	//	Create connection
	try {
		$dbConn = new PDO($dsn, $user, $pwd);	
	} catch(PDOException $error) {
		echo "An error occurred when connecting to database: " + $error->getMessage();
	}
	
}
function showCustomers() {
	global $dbConn, $stmt, $numRecords;
	$sqlStr = "select * from m_customer;";
	connect();
	try {
		$stmt = $dbConn->query($sqlStr);
		if($stmt === false) {
			die("Error executing the query: " . $sqlStr);		
		}	
		$numRecords = $stmt->rowcount();
		echo "Number of Records: ". $numRecords;
		$dbConn = NULL;
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();		
	}
}
?>
</body>
</html>