<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	// Passing an Array between forms using a hidden input
	if(isset($_POST["submit"])) {
		$strNames = $_POST["strNames"];
		$arrNames = explode("|", $strNames);
		$length = count($arrNames);	
		echo "<p>The array contains: $length elements</p>";
		for($intCount = 0; $intCount < $length; $intCount++) {
			echo "<p>" . $arrNames[$intCount] . "</p>";	
		} 
	} else {
		echo "<p>The submit button hasn't been clicked. Initializing data...</p>";
		$arrNames = array("Simon", "Gemma", "Hayley");	
		$strNames = implode("|", $arrNames);
	}
	
?>

<h2>A Hidden Array Example</h2>
<form method="post" action='<?php echo $_SERVER["PHP_SELF"] ?>'>
	<p><input type="hidden" name="strNames" value="<?php echo $strNames ?>" />
    <input type="submit" name="submit"/>
</form>
</body>
</html>