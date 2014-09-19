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

function insertBranch() {
	global $dbConnection, $stmt, $strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $intPost_code, $strPhone, $strFax;
	connect();
	$sqlStr = "INSERT INTO m_branch values ('" . $strBranch_Code . "', '" . $strBranch_name . "', '" . $strManager . "', '" . $strBranch_Address . "', '" . $strSuburb . "', '" . $strState . "', '" . $intPost_code . "', '" . $strPhone . "', '" . $strFax . "');";	
	// Run insert
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the Insert: $sqlStr");	
		} else {
			// Success message
			echo "<p>The Branch " . $strBranch_name . " has been added to the database</p>";	
		}
	} catch(PDOException $err) {
		//	Display error message if applicable
		echo "An error occurred: " . $err->getMessage();
	}
	// Close connection
	$dbConnection = NULL;
}

function readQuerySingle($table, $column, $colValue, $colType) {
	global $numRecords, $dbConnection, $stmt;
	connect();
	$sqlStr = NULL;
	if($colType === "numeric") {
		//	data type is numeric
		$sqlStr = "SELECT * FROM " . $table . " WHERE " . $column . " = " . $colValue . ";";	
	} else {
		//	data type is string
		$sqlStr = "SELECT * FROM " . $table . " WHERE " . $column . " = '" . $colValue . "';";	
	}
	//	run query
	try {
		$stmt = $dbConnection->query($sqlStr);
		if($stmt === false) {
			die("An error occurred in retrieving data: " . $sqlStr);	
		}	
	} catch(PDOException $err) {
		echo "An error occurred: " . $err->getMessage();	
	}
	//	get records count
	$numRecords = $stmt->rowcount();
	
	//	close connection
	$dbConnection = NULL;
}

function updateBranch() {
	global $dbConnection, $stmt, $strBranch_Code, $strBranch_name, $strManager, $strBranch_Address, $strSuburb, $strState, $strPost_code, $strPhone, $strFax;
	connect();
	$sqlStr = "UPDATE m_branch SET Branch_name = '" . $strBranch_name . "', ";
	$sqlStr .= " Manager = '" . $strManager . "', ";
	$sqlStr .= " Branch_Address = '" . $strBranch_Address . "', ";
	$sqlStr .= " Suburb = '" . $strSuburb . "', ";
	$sqlStr .= " State = '" . $strState . "', ";
	$sqlStr .= " Post_code = '" . $strPost_code . "', ";
	$sqlStr .= " Phone = '" . $strPhone . "', ";
	$sqlStr .= " Fax = '" . $strFax . "' ";
	$sqlStr .= " WHERE Branch_Code = '" . $strBranch_Code . "';";
	//	execute update
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing updating: " . $sqlStr);	
		} else {
			//	success message
			echo "<p>The Branch " . $strBranch_name . " has been updated in the database</p>";	
		}	
	} catch(PDOException $err) {
		echo "An error occurred in updating: " . $err->getMessage();	
	}
	$dbConnection = NULL;
}

function deleteRecord($table, $column, $colValue, $colDataType) {
	global $dbConnection, $Branch_Code;
	connect();
	if($colDataType === "varchar" or $colDataType === "date" or $colDataType === "datetime") {
		$sqlStr = "DELETE FROM " . $table . " WHERE " . $column . " = '" . $colValue . "';";	
	} else {
		$sqlStr = "DELETE FROM " . $table . " WHERE " . $column . " = " . $colValue . ";";	
	}
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the deletion: " . $sqlStr);	
		}	
	} catch(PDOException $err) {
		echo $err->getMessage();	
	}
	$dbConnection = NULL;
}
?>
</body>
</html>