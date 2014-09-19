<?php 
$name = "";
	if(isset($_GET["name"])) {
		$name = $_GET["name"];	
		echo json_encode($name);
	} else {
		echo "Sorry, no data received.";	
	}
	
?>