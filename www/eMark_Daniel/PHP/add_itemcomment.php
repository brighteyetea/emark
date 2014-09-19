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
include '../BLL/validation_itemcomment.php';
include '../DAL/db_itemcomment.php';	// Import required php file before JavaScript execution

$commentID = "";
$comment = "";
$itemID = "";

$booCommentID = 0;
$booComment = 0;
$booItemID = 0;
$booOK = 1;

if(isset($_GET["itemID"])) {
	$itemID = $_GET["itemID"];
} else if(isset($_POST["submit"])) {
	$itemID = $_POST["hidAssessmentItemID"];
	$commentID = $_POST["txtItemCommentID"];
	$comment = $_POST["txtItemComment"];

	validateItemComment();	// Validation
	
	if($booOK) {
		addItemComment();
		echo "<script type=\"text/javascript\">";
		if($numRecords == 1) {
			echo "alert('Adding comment Successful');";
			echo "location.href='edit_assessmentitem.php?assessmentItemID=$itemID'";
		} else {
			echo "alert(\"Adding comment Failed: $errMessage\")";
		}
		echo "</script>";	
	}
	
}
 ?>
<script type="text/javascript">
// Check if comment ID is available
function isCommentIDAvailable() {
	$.ajax({
		type: "GET",
		url: "../DAL/db_delete_itemcomment.php?opt=checkCommentID&commentID=" + $("#txtItemCommentID").val().trim(),
		dataType: 'json'	
	}).done(function(data) {
		console.log("Found record: " + data.rowsAffected);
		var $img;
		if(data.rowsAffected == 0) {	// There is no assessment item by this ID
			$("#txtItemCommentID").siblings("img").remove();
			$img = $("<img src='../images/green_tick.png' style='width: 20px; height: 20px; vertical-align: middle;' />");
			$("#txtItemCommentID").after($img);
		} else {
			$("#txtItemCommentID").siblings("img").remove();
			$img = $("<img src='../images/red_cross.png' style='width: 20px; height: 20px; vertical-align: middle;' />");
			$("#txtItemCommentID").after($img);
		}
	});	
}

$(document).ready(function() {
	// Attach event to <input> element for Comment ID
	$("#txtItemCommentID").blur(function(e) {
		isCommentIDAvailable();
    });
	
});

</script>
</head>
<body>
<?php include '../common/header.html';?>
<?php include '../common/navbar.php'; ?>
<div class="content">
  <div class="contentMain">
    <h2>Add Item Comment</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
  </div>
</div>
<form action="add_itemcomment.php" method="post">
  <table class="tableborder" style="width:50%;margin-left:25%;margin-right:25%;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th colspan="3">Add a Comment</th>
    </tr>
    <tr>
      <td>Assessment Item</td>
      <td><input name="txtAssessmentItemID" id="txtAssessmentItemID" type="text" size="25" maxlength="25" value="<?php echo $itemID; ?>" disabled /><?php if($booItemID) echo "<span class='err'>There is no Assessment Item ID!</span>"; ?></td>
    </tr>
    <tr>
      <td><!-- Disabled <input> elements in a form will not be submitted --></td>
      <td><input name="hidAssessmentItemID" id="hidAssessmentItemID" type="hidden" size="25" value="<?php echo $itemID; ?>" /></td>
    <tr>
      <td>Comment ID</td>
      <td><input name="txtItemCommentID" id="txtItemCommentID" type="text" size="25" maxlength="25" value="<?php echo $commentID; ?>"/><?php if($booCommentID) echo "<span class='err'>Please enter comment ID!</span>"; ?></td>
    </tr>
    <tr>
      <td>Comment</td>
      <td><textarea name="txtItemComment" id="txtItemComment"  cols="25" rows="5" style='vertical-align:middle;'><?php echo $comment; ?></textarea><?php if($booComment) echo "<span class='err'>Please enter item comment!</span>"; ?></td>
    </tr>
    
    <tr>
      <td class="altrow" colspan="2"><div class="btnRight" style="margin-top:10px;margin-bottom:10px;">
          <input type="button" class="btn" style="float:left;" value="Back" onclick="location.href='edit_assessmentitem.php?assessmentItemID=<?php echo $itemID; ?>';">
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
