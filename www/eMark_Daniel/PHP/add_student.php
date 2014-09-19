<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Mark assesment and marking application</title>
<link rel="stylesheet" type="text/css" href="../css/emark_style.css"/>
<style>
span.err {
	color: red;	
}
</style>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<?php
require '../BLL/validation_student.php';
require '../DAL/db_student.php';	// Import required php file before JavaScript execution

$stuID = "";
$fname = "";
$lname = "";

$booStuID = 0;
$booFName = 0;
$booLName = 0;
$booOK = 1;

if(isset($_POST["submit"])) {
	$stuID = $_POST["txtStudentID"];
	$fname = $_POST["txtFirstname"];
	$lname = $_POST["txtLastname"];

	//echo "$stuID $fname $lname<br/>";	
	validateStudent();
	if($booOK) {
		addStudent();
		echo "<script type=\"text/javascript\">";
		if($numRecords == 1) {
			echo "alert('Insert Successful');";
			echo "location.href='view_students.php';";
		} else {
			echo "alert(\"Insert Failed: $errMessage\")";
		}
		echo "</script>";	
	}
	
}
 ?>
<script type="text/javascript">
// Check if student ID is available
function isStudentIDAvailable() {
	$.ajax({
		type: "GET",
		url: "../DAL/db_delete_student.php?opt=checkStudentID&stuID=" + $("#hidStudentID").val().trim(),
		dataType: 'json'	
	}).done(function(data) {
		var $img;
		if(data.rowsAffected == 0) {	// There is no student by this ID
			$("#hidStudentID").siblings("img").remove();
			$img = $("<img src='../images/green_tick.png' style='width: 20px; height: 20px; vertical-align: middle;' />");
			$("#hidStudentID").after($img);
		} else {
			$("#hidStudentID").siblings("img").remove();
			$img = $("<img src='../images/red_cross.png' style='width: 20px; height: 20px; vertical-align: middle;' />");
			$("#hidStudentID").after($img);
		}
	});	
}

$(document).ready(function() {
	// Attach event to <input> element for Student ID
	$("#hidStudentID").blur(function(e) {
		isStudentIDAvailable();	
	});
	
});

</script>
</head>
<body>
<?php include '../common/header.html';?>
<?php include '../common/navbar.php'; ?>
<div class="content">
  <div class="contentMain">
    <h2>Add Students</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
  </div>
</div>
<form action="add_student.php" method="post">
  <table class="tableborder" style="width:50%;margin-left:25%;margin-right:25%;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th colspan="3">Add New Student</th>
    </tr>
    <tr>
      <td>Student ID</td>
      <td><input name="hidStudentID" id="hidStudentID" type="text" size="25" maxlength="25" value="<?php echo $stuID; ?>"/><?php if($booStuID) echo "<span class='err'>Please enter student ID!</span>"; ?></td>
    </tr>
    
    <tr>
      <td>First Name</td>
      <td><input name="txtFirstname" id="txtFirstname" type="text" size="25" maxlength="25" value="<?php echo $fname; ?>" /><?php if($booFName) echo "<span class='err'>Please enter first name!</span>"; ?></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><input name="txtLastname" id="txtLastname" type="text" size="25" maxlength="25" value="<?php echo $lname; ?>"/><?php if($booFName) echo "<span class='err'>Please enter last name!</span>"; ?></td>
    </tr>
    
    <tr>
      <td class="altrow" colspan="2"><div class="btnRight" style="margin-top:10px;margin-bottom:10px;">
          <input type="button" class="btn" style="float:left;" value="Back" onclick="location.href='view_students.php';">
          <input type="submit" class="btn" value="Save" name="submit" id="submit"/>
        </div></td>
    </tr>
  </table>
</form>
<div class="footer">
  <p><a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Contact</a><br />
    Copyright &copy;2014</p>
</div>
</body>
</html>
