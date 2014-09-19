<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>

<?php
	$booTitle = 0;
	$booFirstname = 0;
	$booSurname = 0;
	$strTitle = "";
	$strFirstname = "";
	$strSurname = "";
	
	//This code is only run if the submit button has been pressed
	if(isset($_POST["submit"])) {
		if($_POST["strTitle"] == "Select...") {
			$booTitle = 1;	
		} else {
			$strTitle = $_POST["strTitle"];	
		}
		if($_POST["strFirstname"] == NULL) {
			$booFirstname = 1;	
		} else {
			$strFirstname = $_POST["strFirstname"];	
		}
		if($_POST["strSurname"] == NULL) {
			$booSurname = 1;	
		} else {
			$strSurname = $_POST["strSurname"];	
		}
	}
?>
<body>
	<h2>Please select your title and name:</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    	<p>
        	<label for="strTitle">Title:</label>
            <select name="strTitle" id="strTitle">
            	<option >Select...</option>
                <option <?php if($strTitle == "Mr") { echo "Selected"; } ?> value="Mr">Mr</option>
                <option <?php if($strTitle == "Miss") { echo "Selected"; } ?> value="Miss">Miss</option>
                <option <?php  if($strTitle == "Ms") { echo "Selected" ;} ?> value="Ms">Ms</option>
                <option <?php  if($strTitle == "Mrs") { echo "Selected"; } ?> value="Mrs">Mrs</option>
                <option <?php  if($strTitle == "Dr") { echo "Selected"; } ?> value="Dr">Dr</option>
            </select>
            <?php if($booTitle) { echo "Please select a title!"; }?>
        </p>
        <p>
        	<label for="strFirstname">Firstname:</label>
            <input type="text" name="strFirstname" id="strFirstname" value="<?php echo $strFirstname; ?>" />
            <?php if($booFirstname) { echo "Please enter a firstname!"; } ?>
        </p>
        <p>
        	<label for="strSurname">Surname:</label>
            <input type="text" name="strSurname" id="strSurname" value="<?php echo $strSurname?>"/>
            <?php if($booSurname) { echo "Please enter a surname!"; } ?>
        </p>
        
        <p><input type="submit" name="submit"/></p>
    </form>
    
    <?php 
		//echo $_POST["submit"];
		if(!($booTitle + $booFirstname + $booSurname) && isset($_POST["submit"])) {
			echo "<p>All is well, you are " . $_POST["strTitle"] . " " . $_POST["strFirstname"] . " " . $_POST["strSurname"] . "</p>";	
		}
	?>
</body>
</html>