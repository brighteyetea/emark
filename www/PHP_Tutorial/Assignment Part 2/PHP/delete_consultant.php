<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Consultant</title>
</head>

<body>
<?php 
require_once("../BLL/consultantBLL.php");
if(isset($_GET["consultantID"])) {
	$consultantID = $_GET["consultantID"];	
	if(checkForDeletion("m_project_consultant", "Consultant_Id", $consultantID, "char")) {
		deleteConsultantByID("m_consultant", "Consultant_Id", $consultantID, "char");
		header("Location: view_consultants.php");
	} else {
		echo "There is a FOREIGN KEY CONSTRAINT. Deletion failed! <a href='view_consultants.php'> Click Here </a> to return.";	
	}
}


?>
</body>
</html>