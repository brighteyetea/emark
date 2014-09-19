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
// Select all records from a table
function readQuery($table) {
	global $numRecords, $dbConnection, $stmt;
	connect();
	$sqlStr = "SELECT * FROM " . $table . ";";
	try {
		// Use dbConnection object to execute SQL query and return a resultset stored in a PDOStatement
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

// Insert a Branch Record
function insertBranch() {
			
	global $dbConnection, $stmt;
	global $strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $intPost_code, $strPhone, $strFax;
	connect();
	$sqlStr = "INSERT INTO m_branch values('" . $strBranch_Code . "', '" . $strBranch_name . "', '" . $strManager . "', '"
		. $strBranch_Address . "', '" . $strSuburb . "', '" . $strState . "', '" . $intPost_code . "', '" . $strPhone 
		. "', '" . $strFax . "');";
	try {
		
		// Using the connection that was set up in the connect() to execute sql command
		$stmt = $dbConnection->exec($sqlStr);
		// If the execution failed, false is returned and the program is terminated  with the die statement
		if($stmt === false) {
			die("Error executing the query: $sqlStr");	
		} else {
			echo "<p>The Branch $strBranch_name has been added to the database</p>";	
		}
	} catch(PDOException $error) {
		echo "An Error occurred: " . $error->getMessage();	
	}
	// Close the database connection
	$dbConnection = NULL;
}

// Select single record from database
function readQuerySingle($table, $column, $colValue, $colType) {
	global $dbConnection, $stmt, $numRecords;
	connect();
	$sqlStr = NULL;
	if($colType === "numeric") {
		$sqlStr = "SELECT * FROM " . $table . " WHERE " . $column . " = " . $colValue . ";";	
	} else {
		$sqlStr = "SELECT * FROM ". $table . " WHERE " . $column . " = '" . $colValue . "';";	
	}
	try {
		$stmt = $dbConnection->query($sqlStr);
		if($stmt === false) {
			die("Error executing the query: $sqlStr");	
		}	
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	// Get number of rows from ResultSet stored in PDOStatement
	$numRecords = $stmt->rowcount();
	// Close the database connection
	$dbConnection = NULL;
}

// Update a Branch record
function updateBranch() {
	global $dbConnection, $stmt, $numRecords;
	global $strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $strPost_code, $strPhone, $strFax;
	connect();
	$sqlStr .= "UPDATE m_branch SET Branch_name = '" . $strBranch_name . "', Manager = '" . $strManager . "', Branch_Address = '" 
		. $strBranch_Address . "', Suburb = '" . $strSuburb . "', State = '" . $strState . "', Post_code = " . $strPost_code 
		. ", Phone = '" . $strPhone . "', Fax = '" . $strFax . "' WHERE Branch_Code = '" . $strBranch_Code . "';";
	echo $sqlStr;
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the query: $sqlStr");	
		} else {
			echo "<p>The Branch " . $strBranch_name . " has been updated in the database";	
		}
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	$dbConnection = NULL;
}

// Delete a Branch record
function deleteRecord($table, $column, $colValue, $colDataType) {
	global $dbConnection, $stmt, $numRecords;
	connect();
	if($colDataType === "varchar" or $colDataType === "data" or $colDataType === "datetime") {
		$sqlStr = "DELETE FROM " . $table . " WHERE " . $column . " = '" . $colValue . "';";	
	} else {
		$sqlStr = "DELETE FROM " . $table . " WHERE " . $column . " = " . $colValue . ";";	
	}
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the query: $sqlStr");	
		}	
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	$dbConnection = NULL;
}

// Insert a Vehicle Record
function insertVehicle() {
	global $dbConnection, $stmt, $numRecords;
	global $strRego_no, $strVehicle_Type, $strBranch_Code, $strColor, $strTransmission, $strPurchased, $strLocation;
	connect();
	$sqlStr = "INSERT INTO m_vehicle values('" . $strRego_no . "', '" . $strVehicle_Type . "', '" . $strBranch_Code . "', '"
		. $strColor . "', '" . $strTransmission . "', '" . $strPurchased . "', '" . $strLocation . "');";
	// Run insert
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the query: $sqlStr");	
		} else {
			// Show success message
			echo "<p>The Vehicle " . $strRego_no . " has been added to the database";	
		}
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	// Close the database connection
	$dbConnection = NULL;
}
?>
