<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Consultants</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
</head>

<body>
	
    <?php 
		require_once("../BLL/consultantBLL.php");
		$strConsultantID = "";
		$strFirstName = "";
		$strLastName = "";
		$strPhone = "";
		$strMobile = "";
		$strEmail = "";
		$strDateCommenced;
		$strDateOfBirth = "";
		$strStreetAddress = "";
		$strSuburb = "";
		$strPostCode = "";
		// Get ConsultantID from link and query the consultant
		if(isset($_GET["consultantID"])) {
			$strConsultantID = $_GET["consultantID"];	
			//echo "Already got ID...#$consultantID#<br/>";
			$resultSet = queryConsultantByID($strConsultantID);
			$arrRows = $resultSet->fetch(PDO::FETCH_ASSOC);
			$strFirstName = $arrRows["First_Name"];
			$strLastName = $arrRows["Last_Name"];
			$strPhone = $arrRows["Home_Phone"];
			$strMobile = $arrRows["Mobile"];
			$strEmail = $arrRows["Email"];
			$strDateCommenced = $arrRows["Date_Commenced"];
			$strDateOfBirth = $arrRows["DOB"];
			$strStreetAddress = $arrRows["Street_Address"];
			$strSuburb = $arrRows["Suburb"];
			$strPostCode = $arrRows["Post_Code"];
		}
		if(isset($_POST["submit"])) {
			$strConsultantID = $_POST["strConsultantID"];
			$strFirstName = $_POST["strFirstName"];
			$strLastName = $_POST["strLastName"];
			$strPhone = $_POST["strPhone"];
			$strMobile = $_POST["strMobile"];
			$strEmail = $_POST["strEmail"];
			$strDateCommenced = $_POST["strDateCommenced"];
			$strDateOfBirth = $_POST["strDateOfBirth"];
			$strStreetAddress = $_POST["strStreetAddress"];
			$strSuburb = $_POST["strSuburb"];
			$strPostCode = $_POST["strPostCode"];
			//echo $strConsultantID;
			editConsultant($strConsultantID, $strFirstName, $strLastName, $strPhone, $strMobile, $strEmail, $strDateCommenced, $strDateOfBirth, $strStreetAddress, $strSuburb, $strPostCode);
			header("Location: view_consultants.php");
		}
		//	Create table and populate it with data
echo "<h2>Edit Consultant</h2>";
echo "Consultant Details: <br/><br/>";
echo "<form action='edit_consultant.php' method='post'><table id='mavis'>";
echo "<tr><th>First Name</th><td><input type='text' name='strFirstName' size='20' value='$strFirstName' /></td>";
echo "</tr><tr><th>Last Name</th><td><input type='text' name='strLastName' size='20' value='$strLastName' /></td>";
echo "</tr><tr><th>Home Phone</th><td><input type='text' name='strPhone' size='30' value='$strPhone' /></td>";
echo "</tr><tr><th>Mobile</th><td><input type='text' name='strMobile' size='20' value='$strMobile' /></td>";
echo "</tr><tr><th>Email</th><td><input type='text' name='strEmail' size='20' value='$strEmail' /></td>";
echo "</tr><tr><th>Date Commenced</th><td><input type='text' name='strDateCommenced' size='20' value='$strDateCommenced' /></td>";
echo "</tr><tr><th>Date Of Birth</th><td><input type='text' name='strDateOfBirth' size='20' value='$strDateOfBirth' /></td>";
echo "</tr><tr><th>Street Address</th><td><input type='text' name='strStreetAddress' size='20' value='$strStreetAddress' /></td>";
echo "</tr><tr><th>Suburb</th><td><input type='text' name='strSuburb' size='20' value='$strSuburb' /></td>";
echo "</tr><tr><th>Post Code</th><td><input type='text' name='strPostCode' size='20' value='$strPostCode' /></td>";

echo "<tr><td><input type='hidden' name='strConsultantID' value='$strConsultantID' /></td></tr>";
echo "<tr><td></td><td><input type='submit' name='submit' value='Submit New Details' /></td></tr></table></form>";
		
	?>
</body>
</html>