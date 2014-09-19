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
$db = "mcmillan";
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

// Update a record 
function updateProject() {
	global $dbConnection, $stmt, $numRecords;
	global $strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo;
	$strSql = "UPDATE m_project set Project_Name = '" . $strProjectName . "', Project_Description = '" . $strProjectDescription . "', Project_Manager = '" . $strProjectManager . "', Start_Date = '" . $strStartDate . "', Finish_Date = '" . $strFinishDate . "', Budget = '" . $strBudget . "', Cost_To_Date = '" . $strCostToDate . "', Tracking_Statement = '" . $strTrackingStatement . "', Client_No = '" . $strClientNo . "' WHERE Project_No = '" . $strProjectNo . "';";
	connect();
	try{
		$numRecords = $dbConnection->exec($strSql);
		if($numRecords == 0) {
			echo "No records were updated!";	
		} else if($numRecords == 1){
			echo "One record has been updated!";
		} else {
			echo "$numRecords records have been updated!";	
		}
		$dbConnection = NULL;
	} catch(PDOException $err) {
		echo "An error occurred in updateProject(): " . $err->getMessage();
	}
}


// Delete a record
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
	// Close database connection
	$dbConnection = NULL;
}

// Delete a record using combined primary keys
function deleteProjectConsultant($table, $column1, $colValue1, $colType1, $column2, $colValue2, $colType2) {
	global $dbConnection, $stmt, $numRecords;	
	if($colType1 === "numeric" ) {
		$sqlStr = "DELETE FROM {$table} WHERE {$column1} = {$colValue1}";
	} else {
		$sqlStr = "DELETE FROM {$table} WHERE {$column1} = '{$colValue1}'";
	}
	if($colType2 === "numeric") {
		$sqlStr .= " AND {$column2} = {$colValue2}";	
	} else {
		$sqlStr .= " AND {$column2} = '{$colValue2}'";	
	}
	//echo $sqlStr;
	connect();
	try {
		$stmt = $dbConnection->exec($sqlStr);	
		if($stmt === false) {
			die("Error executing the deleting: $sqlStr");	
		} else {
			$numRecords = $stmt;
			//echo "<p>$numRecords Project_Consultant record(s) has been deleted</p>";
		}
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	$dbConnection = NULL;
	//header("Location: ../PHP/view_projects_consultant.php");
}

// Add a project_consultant record
function insertProjectConsultant() {
	//echo "in DAL insertProjectConsultant()...";
	global $dbConnection, $stmt, $numRecords;
	global $strConsultant_Id, $strProject_No, $strDate_Assigned, $strDate_Completed, $strRole, $strHours_Worked;
	$sqlStr = "INSERT INTO m_project_consultant values('" . $strConsultant_Id . "', '" . $strProject_No . "', '" . $strDate_Assigned 
	. "', '" . $strDate_Completed . "', '" . $strRole . "', " . $strHours_Worked . ")";
	connect();
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the inserting: $sqlStr");	
		} else {
			echo "<p>A Consultant has been added to a Project</p>";	
		}
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	$dbConnection = NULL;
}

// Update a project_consultant
function updateProjectConsultant() {
	global $dbConnection, $stmt, $numRecords;
	global $strConsultant_Id, $strProject_No, $strDate_Assigned, $strDate_Completed, $strRole, $strHours_Worked;
	
	$sqlStr = "UPDATE m_project_consultant SET Consultant_Id = '{$strConsultant_Id}', Date_Assigned = '{$strDate_Assigned}', "
		. "Date_Completed = '{$strDate_Completed}', Role = '{$strRole}', Hours_Worked = {$strHours_Worked} "
		. "WHERE Project_No = '{$strProject_No}';";
	echo $sqlStr;
	connect();
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the updating: $sqlStr");	
		} else if(($numRecords = $stmt->rowcount()) > 0){
			echo "<p>This record has been updated</p>";	
		} else {
			echo "<p>There is an error in updating</p>";	
		}
	} catch(PDOException $error) {
		echo "An error occurred: " . $error->getMessage();	
	}
	$dbConnection = NULL;
}

// Select single record from database using combined conditions
function selectSingleRecord($table, $column1, $colValue1, $colType1, $column2, $colValue2, $colType2) {
	global $dbConnection, $stmt, $numRecords;
	connect();
	$sqlStr = NULL;
	if($colType1 === "numeric") {
		$sqlStr = "SELECT * FROM " . $table . " WHERE " . $column1 . " = " . $colValue1;	
	} else {
		$sqlStr = "SELECT * FROM ". $table . " WHERE " . $column1 . " = '" . $colValue1 . "'";	
	}
	if($colType2 === "numeric") {
		$sqlStr .= " AND " . $column2 . " = " . $colValue2;	
	} else {
		$sqlStr .= " AND " . $column2 . " = '" . $colValue2 . "';";	
	}
	//echo $sqlStr;
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
?>
</body>
</html>