<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>e-Mark assesment and marking application</title>
<link rel="stylesheet" type="text/css" href="../css/emark_style.css"/>
<style>
span.err {
	color: red;	
}
</style>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">

$(document).ready(function(e) {
   
});
</script>
</head>

<body>
<?php include '../common/header.html';?>
<?php include '../common/navbar.php'; ?>
<div class="content">
  <div class="contentMain">
    <h2>Edit Student</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
    <?php 
//require '../DAL/db_functions.php';
//require '../DAL/db_student.php';
include '../BLL/validation_student.php';
include '../DAL/db_delete_student.php';

$stuID = "";
$fname = "";
$lname = "";

$booStuID = 0;
$booFName = 0;
$booLName = 0;
$booOK = 1;


if(isset($_POST["submit"])) {	// submit form to update student
	$stuID = $_POST["hidStudentID"];
	$fname = $_POST["txtFirstname"];
	$lname = $_POST["txtLastname"];
	
	validateStudent();	// validation
	if($booOK) {
		updateStudentByID();
		echo "<script type=\"text/javascript\">";
		if($numRecords == 1) {
			echo "alert('Update Successful');";
			echo "location.href='view_students.php';";
		} else {
			echo "alert(\"Update Failed: $errMessage\")";
		}
		echo "</script>";
	}
	

} else {	// HTTP GET request, get student id from GET method
	if(isset($_GET["stuID"])) {
		$stuID = $_GET["stuID"];
	} 
	getStudentByID();
	if($numRecords == 0) {
		echo "<span class='error'>No Matching Student Found!!</span><br/><br/>";	
	} else { 
		//echo "Record Found!!<br/>";
		$rs = $stmt->fetch(PDO::FETCH_ASSOC);
		// Assign values to variables
		$stuID = $rs["StudentID"];
		$fname = $rs["FirstName"];
		$lname = $rs["LastName"];
		
		
	}
	
}


?>

    <form action="edit_student.php" method="post">
      <table class="tableborder" style="width:50%;margin-left:25%;margin-right:25%;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th colspan="2">Edit Student Details</th>
        </tr>
        <tr>
          <td>Student ID</td>
          <td><input  name="txtStudentID" id="txtStudentID" type="text" size="25" maxlength="25" value="<?php echo $stuID; ?>" disabled /><?php if ($booStuID) echo "<span class='err'>Please enter student ID!</span>"; ?></td>
        </tr>
        <tr>
          <td><!-- Disabled <input> elements in a form will not be submitted --></td>
          <td><input  name="hidStudentID" id="hidStudentID" type="hidden" value="<?php echo $stuID; ?>"/></td>
        </tr>
        <tr>
          <td>First Name</td>
          <td><input name="txtFirstname" id="txtFirstname" type="text" size="25" maxlength="25" value="<?php echo $fname; ?>" /><?php if ($booFName) echo "<span class='err'>Please enter first name!</span>"; ?></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><input name="txtLastname" id="txtLastname" type="text" size="25" maxlength="25" value="<?php echo $lname; ?>" /><?php if ($booLName) echo "<span class='err'>Please enter last name!</span>"; ?></td>
        </tr>
        <tr>
          <td class="altrow" colspan="2"><div class="btnRight" style="margin-top:10px;margin-bottom:10px;">
              <input type="button" class="btn" style="float:left;" value="Back" onclick="location.href='view_students.php';">
              <input type="submit" class="btn" value="Save" name="submit" />
            </div></td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
<div class="footer">
  <p><a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Contact</a><br />
    Copyright &copy;2014</p>
</div>
</body>
</html>