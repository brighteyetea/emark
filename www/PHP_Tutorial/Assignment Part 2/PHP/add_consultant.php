<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Consultant</title>
</head>

<body>
<?php
require_once("../BLL/consultantBLL.php");
echo "starting to validate data...<br/>";
$consultantID = $_POST["strConsultantID"];
if($consultantID == "" or $consultantID == NULL) {
	echo "There is NO value for Consultant ID!<br/>";	
}
$firstName = $_POST["strFirstName"];
if($firstName == "" or $firstName == NULL) {
	echo "There is NO value for First Name!<br/>";	
}
$lastName = $_POST["strLastName"];
if($lastName == "" or $lastName == NULL) {
	echo "There is NO value for Last Name!<br/>";	
}
$phone = $_POST["strPhone"];
if($phone == "" or $phone == NULL) {
	echo "There is NO value for Phone!<br/>";	
}
$mobile = $_POST["strMobile"];
if($mobile == "" or $mobile == NULL) {
	echo "There is NO value for Mobile!<br/>";	
}
$email = $_POST["strEmail"];
if($email == "" or $email == NULL) {
	echo "There is NO value for Email!<br/>";	
}
$dateCommenced = $_POST["strDateCommenced"]; 
if($dateCommenced == "" or $dateCommenced == NULL) {
	echo "There is NO value for Date Commenced!<br/>";	
}
$dateOfBirth = $_POST["strDateOfBirth"];
if($dateOfBirth == "" or $dateOfBirth == NULL) {
	echo "There is NO value for Date Of Birth!<br/>";	
}
$streetAddress = $_POST["strStreetAddress"];
if($streetAddress == "" or $streetAddress == NULL) {
	echo "There is NO value for Street Address!<br/>";	
}
$suburb = $_POST["strSuburb"];
if($suburb == "" or $suburb == NULL) {
	echo "There is NO value for Suburb!<br/>";	
}
$postCode = $_POST["intPostCode"];
if($postCode == "" or $postCode == NULL) {
	echo "There is NO value for Post Code!<br/>";	
}


// Function defined in consultantBLL.php
addConsultant();
header("Location: view_consultants.php");

?>
</body>
</html>