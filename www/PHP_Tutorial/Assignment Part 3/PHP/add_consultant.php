<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Consultant</title>
<link rel="stylesheet" type="text/css" href="../CSS/mavis.css" />
<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron:400,500,700,900' rel='stylesheet' type='text/css'>
</head>

<body>
<header class="12u-first" >
			
    <h1><span>Mc</span>Millian IT System Management</h1>
    
    <div class="menu-top"></div>
    
    <nav class="menu">
        
        <ul id="menu">
        
            <li><a href="../HTML/index.html" title="">Home</a></li>
                                    
            <li><a href="../PHP/view_projects.php" title="">View Projects</a></li>
            
            <li><a href="../PHP/view_consultants.php" title="">View Consultants</a></li>
            
            <li><a href="../PHP/view_projects_consultant.php" title="">View Project Staffing</a></li>
            
        </ul>
        
    </nav>

</header>
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
addConsultant($consultantID, $firstName, $lastName, $phone, $mobile, $email, $dateCommenced, $dateOfBirth, $streetAddress, $suburb, $postCode);
header("Location: view_consultants.php");

?>
</body>
</html>