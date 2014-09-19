<?php 
/* Created by Jian on 2014-8-22 */
include 'db_functions.php';

function getAllAssessmentItems() {
	global $numRecords,$dbConnection, $stmt;
	$sqlStr = "SELECT ai.*, a.Name AS AssessmentName FROM assessmentitem ai INNER JOIN assessment a ON ai.AssessmentID = a.AssessmentID ORDER BY Institute, ItemID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);		
		$stmt->execute();
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	
		$dbConnection = NULL;	
	}catch(PDOExcepetion $error) {
		print "An Error occored; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}
}

function addAssessmentItem() {
	global $numRecords,$dbConnection, $stmt;
	global $itemID, $itemName, $description, $assessmentID, $itemMark, $institute;
	$sqlStr = "insert into assessmentitem (ItemID, Name, Description, AssessmentID, ItemMark, Institute) values (:itemID, :itemName, :desc, :assessmentID, :itemMark, :institute)";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("itemID", $itemID);
		$stmt->bindParam("itemName", $itemName);
		$stmt->bindParam("desc", $description);
		$stmt->bindParam("assessmentID", $assessmentID);
		$stmt->bindParam("itemMark", $itemMark);
		$stmt->bindParam("institute", $institute);
		$stmt->execute();
		// Execute the prepared statement and return true on success or false on failure
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	// Get number of records
		$dbConnection = NULL;	// Close the database connection	
	}catch(PDOExcepetion $error) {
		// Display error if applicable and enforce disconnection of database
		echo "An Error occored; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}
}

function deleteAssessmentItem() {
	global $numRecords,$dbConnection, $stmt;
	global $itemID;
	$sqlStr = "delete from assessmentitem where ItemID = :itemID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("itemID", $itemID);
		$stmt->execute();
		// Execute the prepared statement and return true on success or false on failure
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	// Get number of records
		$dbConnection = NULL;	// Close the database connection	
	}catch(PDOExcepetion $error) {
		// Display error if applicable and enforce disconnection of database
		echo "An Error occored; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}	
}

function updateAssessmentItem() {
	global $numRecords,$dbConnection, $stmt;
	// Global variables defined previously in edit_assessmentitem.php 
	global $itemID, $itemName, $description, $assessmentID, $itemMark, $institute;
	
	$sqlStr = "update assessmentitem set Name = :name, Description = :desc, AssessmentID = :assessmentID, ItemMark = :itemMark, Institute = :institute where ItemID = :itemID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("itemID", $itemID);
		$stmt->bindParam("name", $itemName);
		$stmt->bindParam("desc", $description);
		$stmt->bindParam("assessmentID", $assessmentID);
		$stmt->bindParam("itemMark", $itemMark);
		$stmt->bindParam("institute", $institute);
		$stmt->execute();
		// Execute the prepared statement and return true on success or false on failure
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	// Get number of records
		$dbConnection = NULL;	// Close the database connection	
	}catch(PDOExcepetion $error) {
		// Display error if applicable and enforce disconnection of database
		echo "An Error occored; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}		
}

// Get unique Assessment ID from assessment table
function getAllAssessmentIDs() {
	global $numRecords,$dbConnection, $stmt;
	$sqlStr = "SELECT assessmentid, name FROM assessment ORDER BY assessmentid";
	connect();	
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->execute();
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	
		$dbConnection = NULL;	
	}catch(PDOExcepetion $error) {
		print "An Error occored; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}		
}

function getAssessmentItemByItemID($itemID) {
	global $numRecords,$dbConnection, $stmt;
	global $itemID;
	$sqlStr = "select * from assessmentitem where ItemID = :itemID";
	connect();	
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("itemID", $itemID);
		$stmt->execute();
		// Execute the prepared statement and return true on success or false on failure
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	// Get number of records
		$dbConnection = NULL;	// Close the database connection	
	}catch(PDOExcepetion $error) {
		// Display error if applicable and enforce disconnection of database
		echo "An Error occored; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}	
}

function getCommentsByAssessmentItemID($itemID) {
	global $numRecords,$dbConnection, $stmt;
	$sqlStr = "SELECT ai.*, ic.CommentID, ic.Comment FROM assessmentitem ai INNER JOIN itemcomment ic ON ai.ItemID = ic.ItemID and ai.ItemID = :itemID ORDER BY CommentID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("itemID", $itemID);
		$stmt->execute();
		// Execute the prepared statement and return true on success or false on failure
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	// Get number of records
		$dbConnection = NULL;	// Close the database connection
	} catch(PDOExcepetion $error) {
		// Display error if applicable and enforce disconnection of database
		echo "An Error occored; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}	
}
?>