<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>view_branch.php</title>
<link rel="stylesheet" href="../CSS/mavis.css" type="text/css"/>
</head>

<body>

<h2>View Branch Details</h2>
<?php 
// Include database function library
require_once("../DAL/db_functions.php");
// Run Query on Branch table
readyQuery("m_branch");

if($numRecords === 0) {
	echo "<p>No Branches Found!</p>";
} else {
	$arrRows = NULL;
	echo "<table id='mavis' border='1' width='100%'>";
	echo "<tr>";
	echo "<th>Branch Code</th>";
	echo "<th>Branch Name</th>";
	echo "<th>Manager</th>";
	echo "<th>Branch Address</th>";
	echo "<th>Suburb</th>";
	echo "<th>State</th>";
	echo "<th>Post Code</th>";
	echo "<th>Phone Number</th>";
	echo "<th>Fax Number</th>";
	echo "<th></th>";
	echo "<tr>";
	
	// Loop through Branches and add rows to table 
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";
		echo "<td>" . $arrRows['Branch_Code'] . "</td>";	
		echo "<td>" . $arrRows['Branch_name'] . "</td>";
		echo "<td>" . $arrRows['Manager'] . "</td>";
		echo "<td>" . $arrRows['Branch_Address'] . "</td>";
		echo "<td>" . $arrRows['Suburb'] . "</td>";
		echo "<td>" . $arrRows['State'] . "</td>";
		echo "<td>" . $arrRows['Post_code'] . "</td>";
		echo "<td>" . $arrRows['Phone'] . "</td>";
		echo "<td>" . $arrRows['Fax'] . "</td>";
		echo "<td><a href=''>Edit</a><br/><a href=''>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<p></p><p>$numRecords Records Returned</p>";
}
?>
</body>
</html>