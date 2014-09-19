<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Customers</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css"/>
</head>

<body>
<h2>View Customer Details</h2>
<?php 
// ViewBranch.php
// Include db function library
require_once("../DAL/db_FunctionsForCustomers.php");
// Query data from database
showCustomers();

// if records were found, continue to show them
if($numRecords === 0) {
	echo "<p>No Branches Found!</p>";	
} else {
	$arrRows = NULL;
	
	echo "<table id='mavis' border='1' width='100%'>";
	echo "<tr>";
	echo "<th>Cust ID</th>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Company</th>";
	echo "<th>Street No</th>";
	echo "<th>State Name</th>";
	echo "<th>Suburb</th>";
	echo "<th>State</th>";
	echo "<th>Post Code</th>";
	echo "<th>Phone Number</th>";
	echo "<th>Licence No</th>";
	echo "<th></th>";
	echo "</tr>";
	
	// loop through branches
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";	
		echo "<td>" . $arrRows["Cust_id"] . "</td>";
		echo "<td>" . $arrRows["First_name"] . "</td>";
		echo "<td>" . $arrRows['Last_name'] . "</td>";
		echo "<td>" . $arrRows['Company'] . "</td>";
		echo "<td>" . $arrRows['Street_name'] . "</td>";
		echo "<td>" . $arrRows['Suburb'] . "</td>";
		echo "<td>" . $arrRows['State'] . "</td>";
		echo "<td>" . $arrRows['Post_Code'] . "</td>";
		echo "<td>" . $arrRows['Phone'] . "</td>";
		echo "<td>" . $arrRows['Licence_no'] . "</td>";
		
		echo "<td><a href='edit_branch.php?ID=$arrRows[Branch_Code]' >Edit</a>";
		echo "<br/><a href='../BLL/delete_confirm.php?TYPE=Branch&amp;ID=$arrRows[Branch_Code]'>Delete</a></td></tr>";
	}
	echo "</table>";
	echo "<p></p><p>$numRecords Records</p>";
}
?>
</body>
</html>