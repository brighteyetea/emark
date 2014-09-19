<?php
// Library of Database Functions

// Database Connection Variables
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
	global $user, $password, $db, $dsn, $dbConnection;
	try {
		// Create a PDO connection with the configuration data
		$dbConnection = new PDO($dsn, $user, $password);
	} catch(PDOException $error) {
		// Display error message if applicable
		echo "An error occurred: " . $error->getMessage();	
	}
		
}
// Selecting all records from a table
function readyQuery($table) {
	global $numRecords, $dbConnection, $stmt;
	connect();
	$sqlStr = "SELECT * FROM " . $table . ";";
	try {
		// Use dbConnection object to execute SQL query and return a result as a PDOStatement
		$stmt = $dbConnection->query($sqlStr);
		// If the query failed, false is returned and the program will be terminated with die statement
		if($stmt === false) {
			die("Error executing the query: $sqlStr");	
		}	
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	$numRecords = $stmt->rowcount();
	// Close database connection
	$dbConnection = NULL;
}

?>
