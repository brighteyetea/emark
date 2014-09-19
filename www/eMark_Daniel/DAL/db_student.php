<?php 
//require_once 'db_functions.php';

include 'db_functions.php';

		// Get all students from Student table with detailed information from other tables
		function getAllStudents() {
			global $numRecords,$dbConnection, $stmt;
			connect();
			$sqlStr = "select * from students";
			try {
				$stmt = $dbConnection->prepare($sqlStr);
				$stmt->execute();
				// Execute the prepared statement and return true on success or false on failure
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
				$numRecords = $stmt->rowcount();	// Get number of records
				$dbConnection = NULL;	// Close the database connection
			} catch(PDOExcepetion $error) {
				// Display error if applicable and enforce disconnection of database
				print "An Error occored when retrieving all students: " . $error->getMessage();
				
				if($dbConnection != NULL) {
					$dbConnection = NULL;	
				}
			}
		}

		// Get single record from Students table by StudentID and ResultID
		function getStudentByID(){
			global $numRecords,$dbConnection, $stmt;
			global $stuID;
			connect(); 
			$sqlStr = "select * from students where StudentID = :stuID";
			try{
				$stmt = $dbConnection->prepare($sqlStr);
				$stmt->bindParam("stuID", $stuID);
				$stmt->execute();
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
				$numRecords = $stmt->rowcount();	
				$dbConnection = NULL;	
			} catch(PDOExcepetion $error) {
				print "An error occurred when retrieving a student from database: " . $error->getMessage();
				if($dbConnection != NULL) {
					$dbConnection = NULL;	
				}
			}
		}
		
		// Update single record from Students table by StudentID 
		function updateStudentByID(){
			global $numRecords,$dbConnection, $stmt;
			global $stuID, $fname, $lname;
			connect(); 
			$sqlStr = "update students set FirstName = :fname, LastName = :lname where StudentID = :stuID";
			try{
				$stmt = $dbConnection->prepare($sqlStr);
				$stmt->bindParam("stuID", $stuID);
				$stmt->bindParam("fname", $fname);
				$stmt->bindParam("lname", $lname);
				$stmt->execute();
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
				$numRecords = $stmt->rowcount();
				$dbConnection = NULL;
			} catch(PDOExcepetion $error) {
				print "An error occurred when updating a student: " . $error->getMessage();
				if($dbConnection != NULL) {
					$dbConnection = NULL;	
				}
			}
		}
		
		
		// Add a student
		function addStudent() {
			global $numRecords,$dbConnection, $stmt;	
			global $stuID, $fname, $lname;
			$sqlStr = "insert into students(StudentID, FirstName, LastName) values(:stuID, :firstName, :lastName)";
			connect();	
			try {
				$stmt = $dbConnection->prepare($sqlStr);
				$stmt->bindParam("stuID", $stuID);
				$stmt->bindParam("firstName", $fname);
				$stmt->bindParam("lastName", $lname);
				$stmt->execute();
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
				$numRecords = $stmt->rowcount();
				$dbConnection = NULL;
			} catch(PDOException $error) {
				print "An error occurred when adding a student:" . $error->getMessage();
				if($dbConnection != NULL) {
					$dbConnection = NULL;	
				}	
			}
			
		}
		
		// Delete a record from Students table
		function deleteStudentByID() {
			global $numRecords,$dbConnection, $stmt;	
			global $stuID;
			$sqlStr = "delete from students where StudentID = :stuID";
			connect();
			try {
				$stmt = $dbConnection->prepare($sqlStr);
				$stmt->bindParam("stuID", $stuID);
				$stmt->execute();
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
				$numRecords = $stmt->rowcount();
				$dbConnection = NULL;
			} catch(PDOException $error) {
				print "An Error occored when deleting a student: " . $error->getMessage();
				if($dbConnection != NULL) {
					$dbConnection = NULL;	
				}
			}	
		}
		
		// Search student
		function searchStudent() {
			global $numRecords,$dbConnection, $stmt;	
			global $searchStr;
			$sqlStr = "select * from Students where StudentID like :stuID or FirstName like :fname or LastName like :lname";
			connect();
			try {
				$stmt = $dbConnection->prepare($sqlStr);
				$searchStr = '%' . $searchStr . '%';
				$stmt->bindParam("stuID", $searchStr);
				$stmt->bindParam("fname", $searchStr);
				$stmt->bindParam("lname", $searchStr);
				$stmt->execute();
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
				$numRecords = $stmt->rowcount();
				$dbConnection = NULL;
			} catch(PDOException $error) {
				print "An Error occored when deleting a student: " . $error->getMessage();
				if($dbConnection != NULL) {
					$dbConnection = NULL;	
				}
			}	
		}
		
		
?>