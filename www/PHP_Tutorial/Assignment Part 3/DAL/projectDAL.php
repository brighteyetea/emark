<?php 
// Library of Database Functions
require_once("db_functions.php");


function insertProject($strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo) {
	global $dbConnection, $stmt;
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

function deleteProject($table, $column, $value, $dataType) {
	global $dbConnection, $stmt, $numRecords;
	if($dataType == "numeric") {
		$strSql = "DELETE FROM $table WHERE $column = " . $value . ";";	
	} else {
		$strSql = "DELETE FROM $table WHERE $column = '" . $value . "';";	
	}
	connect();
	try {
		$numRecords = $dbConnection->exec($strSql);
		if($numRecords == 0) {
			echo "No records were deleted!";	
		} else if($numRecords == 1){
			echo "One record has been deleted!";
		} else {
			echo "$numRecords records have been deleted!";	
		}
		$dbConnection = NULL;
	} catch(PDOException $err) {
		echo "An error occurred in deleteProject(): " . $err->getMessage();		
	}
}

function updateProject($strProjectNo, $strProjectName, $strProjectDescription, $strProjectManager, $strStartDate, $strFinishDate, $strBudget, $strCostToDate, $strTrackingStatement, $strClientNo) {
	global $dbConnection, $stmt, $numRecords;
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

?>
