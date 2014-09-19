<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLL for Consultant</title>
</head>

<body>
<?php 
require_once("../DAL/db_functions.php");

function queryAll() {
	// function defined in db_functions.php
	$resultSet = selectAll("m_consultant");	
	return $resultSet;
}

function queryConsultantByID($consultantID) {
	// function defined in db_functions.php
	$resultSet = selectConsultantByID($consultantID);	
	return $resultSet;
}

function addConsultant() {
	// Some validation can be applied before inserting
	
	insertConsultant();	
}

function editConsultant($consultantID, $firstName, $lastName, $phone, $mobile, $email, $dateCommenced, $dateOfBirth, $streetAddress, $suburb, $postCode) {
	updateConsultant($consultantID, $firstName, $lastName, $phone, $mobile, $email, $dateCommenced, $dateOfBirth, $streetAddress, $suburb, $postCode);
}

function deleteConsultantByID($table, $column, $colValue, $colDataType) {
	
	deleteRecord($table, $column, $colValue, $colDataType);	
}

/*
This function check if a consultant can be deleted.
Return true:	The consultant can be deleted.
Return false:	The consultant can not be deleted.
*/
function checkForDeletion($table, $column, $colValue, $colType) {
	$count = 0;
	$count = selectSingleConsultant($table, $column, $colValue, $colType);
	if($count >= 1) {
		return false;	
	} else {
		return true;	
	}
}
?>

</body>
</html>