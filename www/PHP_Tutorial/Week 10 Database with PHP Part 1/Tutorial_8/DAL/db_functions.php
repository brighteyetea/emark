<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DB Functions</title>
</head>

<body>
<?php 
// Library of Database Functions

// DB Connection Variables
$localhost = "localhost";
$user = "root";
$password = "root";
$db = "mavis";
$dsn = "mysql:host=$localhost;dbname=$db";

// Declare Global Variables
$dbConnection = NULL;
$stmt = NULL;
$numRecords = NULL;

function connect() {
	// Global variables
	global $user, $password, $dsn, $dbConnection;	
	try {
		// Create a PDO connection
		$dbConnection = new PDO($dsn, $user, $password);	
	} catch(PDOException $error) {
		echo "An error occurred when connecting to DB: " . $error->getMessage();
	}
}

function readQuery($table) {
	// Global variables
	global $numRecords, $dbConnection, $stmt;
	connect();
	$sqlStr = "SELECT * FROM " . $table . ";";	
	try {
		$stmt = $dbConnection->query($sqlStr);	
		if($stmt === false) {
			die("Error executing the query: " . $sqlStr);	
		}
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	$numRecords = $stmt->rowcount();
	// Close db connection
	$dbConnection = NULL;
}
?>
</body>
</html>