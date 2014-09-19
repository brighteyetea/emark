<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>add_vehicle.php</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css"/>
</head>

<body>
<h2>Add Vehicle Details</h2>
<?php 
// Include database function library
require_once("../DAL/db_functions.php");
// A variable to keep track of when to clear the form
$blnblankForm = 0;
if(isset($_POST["submit"])) {
	$strRego_no = $_POST["strRego_no"];
	$strVehicle_Type = $_POST["strVehicle_Type"];	
	$strBranch_Code = $_POST["strBranch_Code"];
	$strColor = $_POST["strColor"];
	$strTransmission = $_POST["strTransmission"];
	$strPurchased = $_POST["strPurchased"];
	$strLocation = $_POST["strLocation"];
	insertVehicle();
	// Setting to value of 1 to indicate we want a clear page
	$blnblankForm = 1;
}
if(!isset($_POST["submit"]) or $blnblankForm = 1) {
	// Reset variables so form will be blank
	$strRego_no = "";
	$strVehicle_Type = "";
	// If it is the first the page has run or if we indicate we want to clear the page reset the variables, with the exception of the branch code which we want keep the same.
	$strBranch_Code = $_POST['strBranch_Code'];
	$strColor = "";
	$strTransmission = "";
	$strPurchased = "";
	$strLocation = "";
	$blnblankForm = 0;
	echo "<form action='add_vehicle.php' method='post'><table id='mavis'>";
	echo "<tr><th>Registration No</th><td><input type='text' name='strRego_no' size='20' value='" . $strRego_no . "'/></td></tr>";
	
	echo "<tr><th>Vehicle type</th><td>";
	// Create and populate option list from the database
	readQuery("m_type");
	echo "<select name='strVehicle_Type'>";
	while($arrRows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		// Loop through the database values
		echo "<option value=\"{$arrRows['Vehicle_type']}\">{$arrRows['Vehicle_type']} - {$arrRows['Make']} {$arrRows['Model']}";
		echo "{$arrRows['Body_style']}</option>";	
	}
	echo "</select></td></tr>";
	
	echo "<tr><th>Branch Code</th><td><input type='text' name='strBranch_Code' size='30' value='" . $strBranch_Code . "' /></td></tr>";
	
	echo "<tr><th>Color</th><td><input type='text' name='strColor' size='20' value='" . $strColor . "' /></td></tr>";
	// Create and populate a list with fixed values
	echo "<tr><th>Transmission</th><td>";
	echo "<select name='strTransmission'><option value='Auto'>Auto</option><option value='Manual'>Manual</option></select>";
	echo "</td></tr>";
	
	echo "<tr><th>Purchased</th><td><input type='text' name='strPurchased' size='5' value='" . $strPurchased . "' /></td></tr>";
	
	echo "<tr><th>Location</th><td><input type='text' name='strLocation' size='15' value='" . $strLocation . "' /></td></tr>";
	
	echo "<tr><td></td><td><input type='submit' name='submit' value='Add New Vehicle' /></td></tr></table></form>";
	echo "<br/><a href='view_vehicles.php?ID=$strBranch_Code'>Return to View Vehicles</a></td></tr>";
}
?>
</body>
</html>