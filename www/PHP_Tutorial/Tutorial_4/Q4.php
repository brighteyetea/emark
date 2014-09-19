<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--
<link type="text/css" rel="stylesheet" href="common.css" />
-->

</head>
<?php
	$bool_stuID = 0;	//stuID is empty
	$str_stuID = "";
	$bool_firstName = 0;	//firstName is empty
	$str_firstName = "";
	$bool_lastName = 0;	//lastName is empty
	$str_lastName = "";
	$bool_subject = 0;	//subject is empty
	$str_subject = "";
	$bool_mark = 0;	//mark is empty
	$str_mark = "";
	
	//This code is only run if the submit button has been pressed
	if(isset($_POST["submit"])) {
		if($_POST["studentID"] == NULL) {
			$bool_stuID = 1;
		} else {
			$str_stuID = $_POST["studentID"];
		}
		if($_POST["firstName"] == NULL) {
			$bool_firstName = 1;
		} else {
			$str_firstName = $_POST["firstName"];
		}
		if($_POST["lastName"] == NULL) {
			$bool_lastName = 1;
		} else {
			$str_lastName = $_POST["lastName"];
		}
		if($_POST["subject"] == "Please Select...") {
			$bool_subject = 1;
		} else {
			$str_subject = $_POST["subject"];
		}
		if($_POST["mark"] == NULL) {
			$bool_mark = 1;
		} else {
			$str_mark = $_POST["mark"];
			$score = (int)($str_mark);
			
		}
	}
?>
<body>
	<h1>Allocate grade to Student</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    	<label for="studentID">StudentID:</label>
        <input type="text" name="studentID" id="studentID" value="<?php echo $str_stuID; ?>"/>
        <?php if($bool_stuID) { echo 'Please enter Student ID'; } ?>
        <br/>
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $str_firstName ?>"/>
        <?php if($bool_firstName) { echo 'Please enter First Name'; } ?>
        <br/>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $str_lastName ?>"/>
        <?php if($bool_lastName) { echo 'Please enter Last Name'; } ?>
        <br/>
        <label for="subject">Subject:</label>
        <select name="subject" id="subject" size="1">
        	<option>Please Select...</option>
        	<option <?php if($str_subject == "Java1") { echo "Selected"; } ?> value="Java1">Java1</option>
            <option <?php if($str_subject == "Database Development") { echo "Selected"; } ?> value="Database Development">Database Development</option>
            <option <?php if($str_subject == "Web Design") { echo "Selected"; } ?> value="Web Design">Web Design</option>
            <option <?php if($str_subject == "Mobile Apps") { echo "Selected"; } ?> value="Mobile Apps">Mobile Apps</option>
        </select>
        <?php if($bool_subject) { echo "Please select a subject!"; } ?>
        <br/>
        <label for="mark">Mark:</label>
        <input type="text" name="mark" id="mark" value="<?php echo $str_mark ?>"/>
		<?php if($bool_mark) { echo 'Please enter a mark'; } else if($score < 0 || $score > 100) { echo $score . 'Mark should be between 0 and 100'; }?><br/>
        <input type="submit" name="submit"/>
        <br/>
    </form>
	
	
   	<?php 
		if(!($bool_stuID + $bool_firstName + $bool_lastName + $bool_subject + $bool_mark) && isset($_POST["submit"])) {
			$result = 'Student Details: <br/>StuID: ' . $str_stuID . '<br/>First Name: ' . $str_firstName . '<br/>' . 'Last Name: ' . $str_lastName
				. '<br/>Subject: ' . $str_subject . '<br/>' . 'Mark: ' . $str_mark . '<br/>';
			
			switch($score) {
				case $score >= 0 && $score <= 49:
					$grade = 'N';
					break;
				case $score >= 50 && $score <= 59:
					$grade = 'P';
					break;
				case $score >= 60 && $score <= 69:
					$grade = 'C';
					break;
				case $score >= 70 && $score <= 79:
					$grade = 'D';
					break;
				case $score >= 80 && $score <= 100:
					$grade = 'HD';
					break;
				default: 
					$grade = 'NO GRADE!';
					break;
			}	
			$result = $result . 'Grade: ' . $grade;
		}
		echo $result;
	?>
</body>
</html>