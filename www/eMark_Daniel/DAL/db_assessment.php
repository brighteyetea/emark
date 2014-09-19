<?php 
include 'db_functions.php';

function readAssQuery($table){
            global $numRecords,$dbConnection,$stmt;
            global $errMessage;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT * FROM " . $table. "";
            
            //run query
            try{
                $stmt = $dbConnection->query($sqlStr);
                if($stmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $numRecords = $stmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
        }

function addAssessment() {
	global $numRecords,$dbConnection, $stmt;
	global $assessmentID, $assessmentName, $description, $subjectID;
	$sqlStr = "insert into assessment (AssessmentID, Name, Description, SubjectID) values (:assessmentID, :assessmentName, :desc, :subjectID)";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("assessmentID", $assessmentID);
		$stmt->bindParam("assessmentName", $assessmentName);
		$stmt->bindParam("desc", $description);
		$stmt->bindParam("subjectID", $subjectID);
		$stmt->execute();
		// Execute the prepared statement and return true on success or false on failure
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	// Get number of records
		$dbConnection = NULL;	// Close the database connection	
	}catch(PDOExcepetion $error) {
		// Display error if applicable and enforce disconnection of database
		echo "An Error occurred; ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}
}

function deleteAssessment() {
	global $numRecords,$dbConnection, $stmt;
	global $assessmentID;
	$sqlStr = "delete from assessment where AssessmentID = :assessmentID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("assessmentID", $assessmentID);
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

function updateAssessment() {
	global $numRecords,$dbConnection, $stmt;
	// Global variables defined previously in edit_assessment.php 
	global $assessmentID, $assessmentName, $description, $subjectID;
	
	$sqlStr = "update assessment set Name = :name, Description = :desc, SubjectID = :subjectID where AssessmentID = :assessmentID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("assessmentID", $assessmentID);
		$stmt->bindParam("name", $assessmentName);
		$stmt->bindParam("desc", $description);
		$stmt->bindParam("subjectID", $subjectID);
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
function getAllSubjectIDs() {
	global $numRecords,$dbConnection, $stmt;
	$sqlStr = "SELECT DISTINCT(SubjectID) FROM subject";
	connect();	
	try {
		$stmt = $dbConnection->prepare($sqlStr);
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

function getAssessmentByAssessmentID($assessmentID) {
	global $numRecords,$dbConnection, $stmt;
	$sqlStr = "select * from assessment where AssessmentID = :assessmentID";
	connect();	
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("assessmentID", $assessmentID);
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


function getItemsByAssessmentID($assessmentID) {
	global $numRecords,$dbConnection, $stmt;
	$sqlStr = "SELECT ai.*, ic.ItemID, ic.Name FROM assessment ai INNER JOIN assessmentitem ic ON ai.AssessmentID = ic.AssessmentID and ai.AssessmentID = :assessmentID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("assessmentID", $assessmentID);
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