<?php 
include 'db_functions.php';

// Add an item comment	
function addItemComment() {
	global $numRecords,$dbConnection, $stmt;
	global $commentID, $comment, $itemID;
	$sqlStr = "insert into itemcomment (CommentID, Comment, ItemID) values (:commentID, :comment, :itemID)";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("commentID", $commentID);
		$stmt->bindParam("comment", $comment);
		$stmt->bindParam("itemID", $itemID);		
		$stmt->execute();
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	
		$dbConnection = NULL;	
	}catch(PDOExcepetion $error) {
		print "An Error occored when adding item comment: ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}	
}

// Get item comment by comment id
function getCommentByID() {
	global $numRecords,$dbConnection, $stmt;
	global $commentID;
	$sqlStr = "select * from itemcomment where CommentID = :commentID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("commentID", $commentID);
		$stmt->execute();
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	
		$dbConnection = NULL;	
	}catch(PDOExcepetion $error) {
		print "An Error occored when getting comment by ID: ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}
}

// Delete an item comment
function deleteCommentByID() {
	global $numRecords,$dbConnection, $stmt;
	global $commentID;
	$sqlStr = "delete from itemcomment where CommentID = :commentID";
	connect();
	try {
		$stmt = $dbConnection->prepare($sqlStr);
		$stmt->bindParam("commentID", $commentID);
		$stmt->execute();
		if($stmt === false){
			die("Error executing the query: $sqlStr");
		}
		$numRecords = $stmt->rowcount();	
		$dbConnection = NULL;	
	}catch(PDOExcepetion $error) {
		print "An Error occored when deleting comment by ID: ".$error->getMessage();
		if($dbConnection != NULL) {
			$dbConnection = NULL;	
		}
	}
}


?>