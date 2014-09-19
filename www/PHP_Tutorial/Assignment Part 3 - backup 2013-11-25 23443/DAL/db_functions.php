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

function selectAll($table) {
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
	return $stmt;
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

// Update a consultant
function updateConsultant($consultantID, $firstName, $lastName, $phone, $mobile, $email, $dateCommenced, $dateOfBirth, $streetAddress, $suburb, $postCode) {
	global $dbConnection, $stmt;
	connect();
	$sqlStr = "UPDATE m_consultant SET First_Name = '" . $firstName . "', ";
	$sqlStr .= " Last_Name = '" . $lastName . "', ";
	$sqlStr .= " Home_Phone = '" . $phone . "', ";
	$sqlStr .= " Mobile = '" . $mobile . "', ";
	$sqlStr .= " Email = '" . $email . "', ";
	$sqlStr .= " Date_Commenced = '" . $dateCommenced . "', ";
	$sqlStr .= " DOB = '" . $dateOfBirth . "', ";
	$sqlStr .= " Street_Address = '" . $streetAddress . "', ";
	$sqlStr .= " Suburb = '" . $suburb . "', ";
	$sqlStr .= " Post_Code = '" . $postCode . "' ";
	$sqlStr .= " WHERE Consultant_Id = '" . $consultantID . "';";
	//	execute update
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing updating: " . $sqlStr);	
		} else {
			//	success message
			echo "<p>The Consultant " . $consultantID . " has been updated in the database</p>";	
		}	
	} catch(PDOException $err) {
		echo "An error occurred in updating: " . $err->getMessage();	
	}
	$dbConnection = NULL;
}

// Select a consultant by ID
function selectConsultantByID($consultantID) {
	global $dbConnection, $stmt;
	$sqlStr = "SELECT * FROM m_consultant WHERE Consultant_Id = '" . $consultantID . "';";
	connect();
	try {
		$stmt = $dbConnection->query($sqlStr);
		if($stmt === false) {
			die("An error occurred in selectConsultantByID function: " . $sqlStr);	
		}	
	} catch(PDOException $err) {
		echo "An error occurred: " . $err->getMessage();		
	}
	$dbConnection = NULL;
	return $stmt;
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

// Insert a consultant in m_consultant table
function insertConsultant($consultantID, $firstName, $lastName, $phone, $mobile, $email, $dateCommenced, $dateOfBirth, $streetAddress, $suburb, $postCode) {
	global $dbConnection, $stmt;
	connect();
	$sqlStr = "INSERT INTO m_consultant values ('" . $consultantID . "', '" . $firstName . "', '" . $lastName . "', '" . $phone . "', '" . $mobile . "', '" . $email . "', '" . $dateCommenced . "', '" . $dateOfBirth . "', '" . $streetAddress . "', '" . $suburb . "', '" . $postCode . "');";	
	// Run insert
	try {
		$stmt = $dbConnection->exec($sqlStr);
		if($stmt === false) {
			die("Error executing the Insert: $sqlStr");	
		} else {
			// Success message
			echo "<p>The Consultant " . $consultantID . " has been added to the database</p>";	
		}
	} catch(PDOException $err) {
		//	Display error message if applicable
		echo "An error occurred: " . $err->getMessage();
	}
	// Close connection
	$dbConnection = NULL;
}

// Select single consultant
function selectSingleConsultant($table, $column, $colValue, $colType) {
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
	return $numRecords;
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

// Add a project record
function insertProject() {
	global $dbConnection, $stmt;
	global $strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo;
	//$strSql = "INSERT INTO m_project VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$strSql = "INSERT INTO m_project VALUES('" . $strProjectNo . "', ' " . $strProjectName . "', '" . $strProjectDescription . "', '" .  $strProjectManager . "', '" . $strStartDate . "', '" . $strFinishDate . "', '" . $strBudget . "', '" . $strCostToDate . "', '" . $strTrackingStatement . "', '" . $strClientNo . "');";
	connect();
	
	try {
		//$stmt = $dbConnection->prepare($strSql);
//		if($stmt === false) {
//			die("Error in PDOStatement: " . $strSql);	
//		}
//		$stmt->bindParam(1, $strProjectNo, PDO::PARAM_STR);
//		$stmt->bindParam(2, $strProjectName, PDO::PARAM_STR);
//		$stmt->bindParam(3, $strProjectDescription, PDO::PARAM_STR);
//		$stmt->bindParam(4, $strProjectManager, PDO::PARAM_STR);
//		$stmt->bindParam(5, $strStartDate, PDO::PARAM_STR);
//		$stmt->bindParam(6, $strFinishDate, PDO::PARAM_STR);
//		$stmt->bindParam(7, $strBudget, PDO::PARAM_STR);
//		$stmt->bindParam(8, $strCostToDate, PDO::PARAM_STR);
//		$stmt->bindParam(9, $strTrackingStatement, PDO::PARAM_STR);
//		$stmt->bindParam(10, $strClientNo, PDO::PARAM_STR);
//		$stmt->exec();	

		$stmt = $dbConnection->exec($strSql);
		if($stmt === false) {
			die("Error in PDOStatement: " . $strSql);	
		}
		echo "finished...";
		$dbConnection = NULL;
	} catch(PDOException $err) {
		echo "An error occurred in insertProject(): " . $err->getMessage();	
	}
	
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