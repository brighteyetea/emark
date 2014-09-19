<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Edit an Assessment | e-Mark Assesment and Marking Application</title>
<link rel="stylesheet" type="text/css" href="../css/emark_style.css"/>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
function renderData(data) 
{
	var optStr = "";
	$.each(data, function(k, v) {
		optStr += "<option value='" + v["SubjectID"] + "' ";
		if(v["SubjectID"] == js_SubjectID) {
			optStr += "selected='selected' ";	
		}
		optStr += ">" + v["SubjectID"] + "</option>";
	});
	$("#selectSubjectID").append(optStr);
}

$(document).ready(function(e) {
	$("#div_Dialog").hide();
	
    //alert(js_AssessmentID + ", " + js_AssessmentName + ", " + js_Description + ", " + js_AssessmentID);
	
	// Ajax request to fill in select menu
	$.ajax({
		type: 'GET', 
		url: 'view_assessmentSubjectID.php?opt=getAllSubjectIDs',
		dataType: 'json'
	}).done(function(data) {
		renderData(data);
	});
	
	$("#txtAssessmentID").val(js_AssessmentID);
	$("#txtAssessmentName").val(js_AssessmentName);
	$("#txtDescription").val(js_Description);
});
</script>
</head>
<body>
<div class="header">
  <div class="headerBanner">
    <p class="floatLeft"><a href="index.html"><img src="../images/eMark-logo2.png" alt="eMark Logo" /></a></p>
    <a href="#"><img class="floatImgRight" src="../images/settings.png" alt="Settings" /></a>
    <p class="floatRight">Hello, Subject Coordinator<br />
      <a href="#">Your Settings</a></p>
  </div>
</div>
<div id="hmenu">
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="subjectdetails.html">Subject Details</a></li>
    <li><a href="studentform.html">Student Entry Form</a></li>
    <li><a href="#" class="ulSelected">Assessments</a>
      <ul>
      <li><a href="add_assessment.php">Add</a></li> 
      <li><a href="view_assessments.php">View & Delete</a></li> 
      <li><a href="edit_assessment.php" class="ulSelected">Edit</a></li> 
      </ul>
  </li>
  </ul>
</div>
<div class="content">
  <div class="contentMain">
    <h2>Edit Assessment</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
    <?php 
	include '../DAL/db_assessment.php';

	$assessmentID = "";
	$assessmentName = "";
	$description = "";
	$subjectID = "";
	/*$dateEdited = "";*/


	$booAssessmentID = 0;
	$booAssessmentName = 0;
	$booDescription = 0;
	$booSubjectID = 0;
	$booOK = 1;
	
	if(isset($_GET["assessmentID"])) {	// Get an Assessment details
		$assessmentID = $_GET["assessmentID"];
		getAssessmentByAssessmentID($assessmentID);	
		if($numRecords == 0) {
			echo "<span class='error'>No Matching Assessment Found!!</span><br/><br/>";		
		} else {
			$rs = $stmt->fetch(PDO::FETCH_ASSOC);
			$assessmentID = $rs["AssessmentID"];
			$assessmentName = $rs["Name"];
			$description = $rs["Description"];
			$subjectID = $rs["SubjectID"];
			/*$dateEdited = $rs["LastEditDate"];
			echo $assessmentID . ", " . $assessmentName . ", " . $description . ", " . $subjectID . ", " . $dateEdited;*/
		}
	} else if(isset($_POST["submit"])) {	// Submit to update an AssessmentItem
		$assessmentID = $_POST["txtAssessmentID"];
		$assessmentName = $_POST["txtAssessmentName"];
		$description = $_POST["txtDescription"];
		$subjectID = $_POST["selectSubjectID"];

		updateAssessment();
		if($numRecords == 1) {
			echo "<script type=\"text/javascript\">alert('Assessment Details Successfully Updated!');";
			echo 'location.href="view_assessments.php";';
			echo '</script>';	
		} else {
			echo "<script type=\"text/javascript\">alert('Update Failed!');</script>";	
		}
		//header("location: view_assessments.php");
	}
	
	?>
    
<!-- Pass PHP values to JavaScript variables, which can be used in jQuery code later on --> 
<script type="text/javascript">
var js_AssessmentID = "<?php echo $assessmentID; ?>";
var js_AssessmentName = "<?php echo $assessmentName; ?>";
var js_Description = "<?php echo $description; ?>";
var js_SubjectID = "<?php echo $subjectID; ?>";


</script>
<form action="edit_assessment.php" method="post">
      <table class="tableborder" style="width:50%;margin-left:25%;margin-right:25%;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th colspan="2">Edit Assessment Details</th>
        </tr>
        <tr>
          <td>Assessment ID</td>
          <td><input name="txtAssessmentID" id="txtAssessmentID" type="text" size="25" maxlength="25" value="" readonly/></td>
        </tr>
        <tr>
          <td>Assessment Name</td>
          <td><input name="txtAssessmentName" id="txtAssessmentName" type="text" size="25" maxlength="25" value=""/></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="txtDescription" id="txtDescription" cols="25" rows="5"></textarea>
          </td>
        </tr>
        <tr>
          <td>Subject ID</td>
          <td><select id="selectSubjectID" name="selectSubjectID" class="select">
              <option value="" disabled="disabled">Please Select...</option>
            </select></td>
        </tr>
        <tr>
          <td class="altrow" colspan="2"><div class="btnRight" style="margin-top:10px;margin-bottom:10px;">
          <input type="button" class="btn" style="float:left;" value="Back" onclick="location.href='view_assessments.php';">
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
    &copy; MAQ Studio 2014</p>
</div>
</body>
</html>