<?php 

include 'db_itemcomment.php';

$commentID = "";

if(isset($_GET["opt"])) {
	if($_GET["opt"] == "checkCommentID") {
		$commentID = $_GET["commentID"];
		getCommentByID();
		echo '{"rowsAffected":"' . $numRecords . '"}';
	} 	
} else if(isset($_POST["opt"])) {
	if($_POST["opt"] == "deleteComment") {
		$commentID = $_POST["commentID"];
		deleteCommentByID();
		echo '{"rowsAffected":"' . $numRecords . '"}';
	}	
}
	
?>