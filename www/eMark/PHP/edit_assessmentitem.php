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


function getItemComments() {
	$("#trItemComments").slideToggle();
}


function renderData(data) {
	var optStr = "";
	$.each(data, function(k, v) {
		optStr += "<option value='" + v["assessmentid"] + "' ";
		if(v["assessmentid"] == js_AssessmentID) {
			optStr += "selected='selected' ";	
		}
		optStr += ">" + v["assessmentid"] + " ==> " + v["name"] + "</option>";
	});
	$("#selectAssessmentID").append(optStr);
}

function renderComments(data) {
	var str = "<table class='tableborder' id='tblItemComment' >";
	//str += "<tr><th>Comment</th><th></th><th></th></tr>";
	if(data.length != 0) {
		$.each(data, function(k, v) {
			str += "<tr>";
			str += "<td id='" + v["CommentID"] + "'>" + v["Comment"] + "</td>";
			//str += "<td><a title='edit' href='#'>edit</a></td>";
			//str += "<td><a title='save' href='#'>save</a></td>";
			str += "<td><a title='del' href='#'>del</a></td>";
			str += "</tr>";
		});	
	} else {
		str = "<tr><td colspan='2'>No relevant comments!</td></tr>";	
	}
	str += "</table>";
	$("#trItemComments").find("td:last").append(str);
	
	$("#tblItemComment").find("a[title='edit']").on('click', function(e) {
		var val = $(this).parent().siblings("td").get(1).innerHTML;
		
		
		
	});
	/*$("#tblItemComment").find("a[title='save']").on('click', function(e) {
		alert("save");
	});*/
	$("#tblItemComment").find("a[title='del']").on('click', function(e) {
		
		var val = $(this).parent().siblings("td").attr("id");
		$.ajax({
			type: 'POST',
			url: '../DAL/db_delete_itemcomment.php',
			data: {opt: "deleteComment", commentID: val},
			dataType: 'json'
		}).done(function(data) {
			if(data.rowsAffected == 1) {
				alert("Deleting Successful!");	
				location.reload(true);
			} else {
				alert("Deleting Failed!");	
			}
		});
	});
}

$(document).ready(function(e) {
	
	// Hide <tr> element for Item Comments
	$("#trItemComments").hide();
	
	// Ajax request to fill in select menu for Assessment ID
	$.ajax({
		type: 'GET', 
		url: 'view_assessmentitem_itemcomments.php?opt=getAllAssessmentIDs',
		dataType: 'json'
	}).done(function(data) {
		renderData(data);
		//console.log("Server returned: " + data);
	});	
	
	// Ajax request to get Item Comments of the Assessment Item
	$.ajax({
		type: 'GET', 
		url: 'view_assessmentitem_itemcomments.php?assessmentItemID=' + $("#hidItemID").val(),
		dataType: 'json'	
	}).done(function(data) {
		renderComments(data);
	});
});
</script>
</head>
<body>
<?php include '../common/header.html';?>
<?php include '../common/navbar.php'; ?>
<div class="content">
  <div class="contentMain">
    <h2>Edit Assessment Item</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
    <?php 
	include '../BLL/validation_assessmentitem.php';
	include '../DAL/db_assessmentitem.php';
	$itemID = "";
	$itemName = "";
	$description = "";
	$assessmentID = "";
	$itemMark = "";
	$institute = "";
	$dateSubmitted = "";
	
	$booItemID = 0;
	$booItemName = 0;
	$booDescription = 0;
	$booAssessmentID = 0;
	$booItemMark = 0;
	$booInstitute = 0;
	$booOK = 1;
	
	if(isset($_GET["assessmentItemID"])) {	// Get an AssessmentItem details
		$itemID = $_GET["assessmentItemID"];
		getAssessmentItemByItemID($itemID);	
		if($numRecords == 0) {
			echo "<span class='error'>No Matching AssessmentItem Found!!</span><br/><br/>";		
		} else {
			$rs = $stmt->fetch(PDO::FETCH_ASSOC);
			$itemName = $rs["Name"];
			$description = $rs["Description"];
			$assessmentID = $rs["AssessmentID"];
			$itemMark = $rs["ItemMark"];
			$institute = $rs["Institute"];
			$dateSubmitted = $rs["DateSubmitted"];
			//echo $itemID . ", " . $itemName . ", " . $description . ", " . $assessmentID . ", " . $itemMark . ", " . $institute . ", " . $dateSubmitted;
		}
	} else if(isset($_POST["submit"])) {	// Submit to update an AssessmentItem
		$itemID = $_POST["txtItemID"];
		$itemName = $_POST["txtItemName"];
		$description = $_POST["txtDescription"];
		$assessmentID = $_POST["selectAssessmentID"];
		$itemMark = $_POST["txtItemMark"];
		$institute = $_POST["txtInstitute"];
		//echo "update...$itemID, $itemName, $description, $assessmentID, $itemMark, $institute";
		validateAssessmentItem();
		if($booOK) {
			updateAssessmentItem();
			if($numRecords == 1) {
				echo "<script type=\"text/javascript\">alert('Update Successful!');";
				echo 'location.href="view_assessmentitems.php";';
				echo '</script>';	
			} else {
				echo "<script type=\"text/javascript\">alert('Update Failed!');</script>";	
			}
		}
		
		
		//header("location: view_assessmentitems.php");
	}
	
	?>
    
    <!-- Pass PHP value to JavaScript variable and use it in jQuery code -->
    <script type="text/javascript">
    	var js_AssessmentID = "<?php echo $assessmentID; ?>";
    </script>
<form action="edit_assessmentitem.php" method="post">
      <table class="tableborder" style="width:50%;margin-left:25%;margin-right:25%;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th colspan="2">Edit AssessmentItem Details</th>
        </tr>
        <tr>
          <td>Item ID</td>
          <td><input name="txtItemID" id="txtItemID" type="text" size="25" maxlength="25" value="<?php echo $itemID; ?>" disabled /><?php if ($booItemID) echo "<span class='err'>Please enter item ID!</span>"; ?></td>
        </tr>
        <tr>
          <td><!-- Disabled <input> elements in a form will not be submitted --></td>
          <td><input name="hidItemID" id="hidItemID" type="hidden" size="25" maxlength="25" value="<?php echo $itemID; ?>"/></td>
        </tr>
        <tr>
          <td>Item Name</td>
          <td><input name="txtItemName" id="txtItemName" type="text" size="25" maxlength="25" value="<?php echo $itemName; ?>"/><?php if ($booItemName) echo "<span class='err'>Please enter item name!</span>"; ?></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="txtDescription" id="txtDescription" cols="25" rows="5" style='vertical-align:middle;'><?php echo $description; ?></textarea><?php if ($booDescription) echo "<span class='err'>Please enter item description!</span>"; ?>
          </td>
        </tr>
        <tr>
          <td>Assessment ID</td>
          <td><select id="selectAssessmentID" name="selectAssessmentID" class="select" style="width: auto;">
              <option value="" disabled="disabled">Please Select...</option>
            </select><?php if ($booAssessmentID) echo "<span class='err'>Please select assessment ID!</span>"; ?></td>
        </tr>
        <tr>
          <td>Item Mark</td>
          <td><input name="txtItemMark" id="txtItemMark" type="text" size="25" maxlength="25" value="<?php echo $itemMark; ?>" /><?php if ($booItemMark) echo "<span class='err'>Please enter item mark!</span>"; ?></td>
        </tr>
        <tr>
          <td>Institute</td>
          <td><input name="txtInstitute" id="txtInstitute" type="text" size="25" maxlength="25" value="<?php echo $institute; ?>" /><?php if ($booInstitute) echo "<span class='err'>Please enter institute!</span>"; ?></td>
        </tr>
        <tr id="trItemComments">
        	<td>Item Comments</td>
            <td></td>
        </tr>
        <tr>
          <td class="altrow" colspan="2"><div class="btnRight" style="margin-top:10px;margin-bottom:10px;">
          <input type="button" class="btn" style="float:left;" value="Back" onclick="location.href='view_assessmentitems.php';">
          <input type="button" class="btn" value="Add Comments" onClick="location.href='add_itemcomment.php?itemID=<?php echo $itemID; ?>';" />
          <input type="button" class="btn" value="View Comments" onClick="getItemComments();" />
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