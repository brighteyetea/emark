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
<script type="text/javascript">
// Check if item id is available
function isItemIDAvailable() {
	$.ajax({
		type: "GET",
		url: "../DAL/db_delete_assessmentitem.php?opt=checkItemID&itemID=" + $("#hidItemID").val().trim(),
		dataType: 'json'	
	}).done(function(data) {
		console.log("Found record: " + data.rowsAffected);
		var $img;
		if(data.rowsAffected == 0) {	// There is no assessment item by this ID
			$("#hidItemID").siblings("img").remove();
			$img = $("<img src='../images/green_tick.png' style='width: 20px; height: 20px; vertical-align: middle;' />");
			$("#hidItemID").after($img);
		} else {
			$("#hidItemID").siblings("img").remove();
			$img = $("<img src='../images/red_cross.png' style='width: 20px; height: 20px; vertical-align: middle;' />");
			$("#hidItemID").after($img);
		}
	});	
}

function renderData(data) {
	var optStr = "";
	$.each(data, function(k, v) {
		optStr += "<option value='" + v["assessmentid"] + "' ";
		if(v["assessmentid"] == selectedAssessmentID) {
			optStr += "selected='selected' ";	
		}
		optStr += ">" + v["assessmentid"] + " ==> " +  v["name"] + "</option>";
	});
	$("#selectAssessmentID").append(optStr);
}

$(document).ready(function(e) {
    // ajax request to fill in select menu
	$.ajax({
		type: 'GET', 
		url: 'view_assessmentitem_itemcomments.php?opt=getAllAssessmentIDs',
		dataType: 'json' 	
	}).done(function(data) {
		renderData(data);	
	});
	
	// Attach event to <input> element for Item ID
	$("#hidItemID").blur(function(e) {
		isItemIDAvailable();	
	});
});
</script>

<?php 
include '../BLL/validation_assessmentitem.php';
include '../DAL/db_assessmentitem.php';	// Import required php file before JavaScript execution

$itemID = "";
$itemName = "";
$description = "";
$assessmentID = "";
$itemMark = "";
$institute = "";

$booItemID = 0;
$booItemName = 0;
$booDescription = 0;
$booAssessmentID = 0;
$booItemMark = 0;
$booInstitute = 0;
$booOK = 1;

if(isset($_POST["submit"])) {
	$itemID = $_POST["txtItemID"];
	$itemName = $_POST["txtItemName"];
	$description = $_POST["txtDescription"];
	$assessmentID = $_POST["selectAssessmentID"];
	$itemMark = $_POST["txtItemMark"];
	$institute = $_POST["txtInstitute"];
	//echo "$itemID, $itemName, $description, $assessmentID, $itemMark, $institute<br/>";	
	validateAssessmentItem();
	if($booOK) {
		addAssessmentItem();
		echo "<script type=\"text/javascript\">";
		if($numRecords == 1) {
			echo "alert('Insert Successful');";
			echo "location.href='view_assessmentitems.php';";
		} else {
			echo "alert('Insert Failed');";
		}
		echo "</script>";	
	}
		
}
?>
<script type="text/javascript">
var selectedAssessmentID = "<?php echo $assessmentID; ?>";
</script>

</head>
<body>
<?php include '../common/header.html';?>
<?php include '../common/navbar.php'; ?>
<div class="content">
<div class="contentMain">
    <h2>Add AssessmentItem</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
  </div>
  <form action="add_assessmentitem.php" method="post">
<table class="tableborder" style="width:50%;margin-left:25%;margin-right:25%;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="2">Add New AssessmentItem</th>
  </tr>
  <tr>
          <td>Item ID</td>
          <td><input name="hidItemID" id="hidItemID" type="text" size="25" maxlength="25" value="<?php echo $itemID; ?>"/><?php if($booItemID) echo "<span class='err'>Please enter item ID!</span>" ?></td>
        </tr>
        <tr>
          <td>Item Name</td>
          <td><input name="txtItemName" id="txtItemName" type="text" size="25" maxlength="25" value="<?php echo $itemName; ?>"/><?php if($booItemName) echo "<span class='err'>Please enter item name!</span>" ?></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="txtDescription" id="txtDescription" cols="25" rows="5" style="vertical-align: middle"><?php echo $description; ?></textarea><?php if($booDescription) echo "<span class='err'>Please enter item description!</span>" ?>
          </td>
        </tr>
        <tr>
          <td>Assessment ID</td>
          <td><select id="selectAssessmentID" name="selectAssessmentID" class="select" style="width: auto;">
              <option value="" disabled="disabled">Please Select...</option>
            </select><?php if($booAssessmentID) echo "<span class='err'>Please select assessment ID!</span>" ?></td>
        </tr>
        <tr>
          <td>Item Mark</td>
          <td><input name="txtItemMark" id="txtItemMark" type="text" size="25" maxlength="25" value="<?php echo $itemMark; ?>" /><?php if($booItemMark) echo "<span class='err'>Please enter item mark!</span>" ?></td>
        </tr>
        <tr>
          <td>Institute</td>
          <td><input name="txtInstitute" id="txtInstitute" type="text" size="25" maxlength="25" value="<?php echo $institute; ?>" /><?php if($booInstitute) echo "<span class='err'>Please enter institute!</span>" ?></td>
        </tr>
        <tr>
          <td class="altrow" colspan="2"><div class="btnRight" style="margin-top:10px;margin-bottom:10px;">
          <input type="button" class="btn" style="float:left;" value="Back" onclick="location.href='view_assessmentitems.php';">
              <input type="submit" class="btn" value="Save" name="submit" />
            </div></td>
        </tr>
</table>
</form>
</div>

<div class="footer">
  <p><a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Contact</a><br />
    Copyright &copy;2014</p>
</div>
</body>