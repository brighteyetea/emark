<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>view_vehicles.php</title>
<link rel="stylesheet" href="../CSS/mavis.css" type="text/css"/>	
</head>

<body>
<h2>View Vehicle Details</h2>
<?php 
require_once("../DAL/db_functions.php");
// Run query on Branch table
//readQuery("m_branch");
// Only show this text if the submit button hasn't been pressed
if(!isset($_POST["show_vehicles"])) {
	echo "<h4>Please select a Branch</h4>";	
}
// If there are any Branches in the database then continue
if($numRecords === 0) {
	echo "<p>No Branches Found!</p>";	
} else {
	$arrRows = NULL;
	// If there are records from database, create Select Menu
	echo "<form action='view_vehicles.php' method='post'>";
	echo "<select name='select_branch'>";
	// Run query on Vehicle_Type table
	readQuery("m_branch");
	// Loop through Branch records and add Branch_Code to the list
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		// Values for options are Branch_Code
		echo "<option value=\"{$arrRows['Branch_Code']}\"";
		
		// Coming back from Add form
		if(isset($_GET["ID"])) {
			if($arrRows['Branch_Code'] === $_GET["ID"]) {
				echo "selected='" . $_GET["ID"] . "'";	
			}	
		}
		
		if(isset($_POST["show_vehicles"])) {
			// If the form is running for a second time after the show_vehicles button has pressed, this code keeps the Branch_Code that was previous selected.
			if($arrRows['Branch_Code'] === $_POST["select_branch"]) {
				echo "selected=\"selected\"";	
			}
		}
		echo ">{$arrRows['Branch_Code']} - {$arrRows['Branch_name']}</option>";
	}
	
	// Finish Select Menu
	echo "</select><input type=\"submit\" name=\"show_vehicles\" value=\"Show Vehicles\" /></form><br/><br/>";
}

// Create the table of Vehicles belonging to selected Branch
if(isset($_POST["show_vehicles"])) {
	// Run Query on Vehicle table
	readQuerySingle("m_vehicle", "Branch_Code", $_POST["select_branch"], "NonNumeric");
	// If there are any vehicle details in the  database, then continue
	if($numRecords === 0) {
		echo "<div class='error'>No Vehicles Found!</div>";	
	} else {
		$arrRows = NULL;
		// Create Table Heading
		echo "<table id='mavis'>";	
		echo "<tr>";
		echo "<th>Registration</th>";
		echo "<th>Vehicle Type</th>";
		echo "<th>Branch Code</th>";
		echo "<th>Colour</th>";
		echo "<th>Transmission</th>";
		echo "<th>Purchased</th>";
		echo "<th>Location</th>";
		echo "<th></th>";
		echo "</tr>";
		
		// Loop through vehicles and add rows to table for each record
		while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>". $arrRows['Rego_no'] . "</td>";
			echo "<td>". $arrRows['Vehicle_Type'] . "</td>";
			echo "<td>". $arrRows['Branch_Code'] . "</td>";
			echo "<td>". $arrRows['Color'] . "</td>";
			echo "<td>". $arrRows['Transmission'] . "</td>";
			echo "<td>". $arrRows['Purchased'] . "</td>";
			echo "<td>". $arrRows['Location'] . "</td>";
			
			// Add links with Branch_Code passed as variable to edit and delete page
			echo "<td><a href='edit_vehicle.php?ID=$arrRows[Rego_no]'>Edit</a>";
			echo "<br/><a href='../BLL/delete_confirm.php?ID=$arrRows[Rego_no]'>Delete</a></td></tr>";
		}
		echo "</table>";
		// Button to add new vehicle
		echo "<form action='add_vehicle.php' method='post'>";
		echo "<input type='hidden' name='strBranch_Code' value='" . $_POST["select_branch"] . "'>";
		echo "<input type='submit' value='Add New Vehicle'>";
		echo "</form>";
	}
}
?>
</body>
</html>