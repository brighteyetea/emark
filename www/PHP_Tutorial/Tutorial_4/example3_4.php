<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!-- Roman Numeral Chart -->
<form action="example3_4.php" method="post">
	<p>
		<label for="intDate">Date:</label>
		<input type="text" name="intDate" id="intDate" />
	</p>
	<p><input type="submit" name="submit"/></p>
</form>

<?php
	if(isset($_POST["intDate"])){
		$intDate = $_POST["intDate"];
		echo "<p>$intDate is written ";
		while($intDate >= 1000) {
			echo 'M';
			$intDate -= 1000;
		}
		if($intDate >= 900) {
			echo 'CM';
			$intDate -= 900;
		}
		while($intDate >= 500) {
			echo 'D';
			$intDate -= 500;
		}
		if($intDate >= 400) {
			echo 'CD';
			$intDate -= 400;
		}
		while($intDate >= 100) {
			echo 'C';
			$intDate -= 100;
		}
		if($intDate >= 90) {
			echo 'XC';
			$intDate -= 90;
		}
		while($intDate >= 50) {
			echo 'L';
			$intDate -= 50;
		}
		if($intDate >= 40) {
			echo 'XL';
			$intDate -= 40;
		}
		while($intDate >= 10) {
			echo 'X';
			$intDate -= 10;
		}
		if($intDate >= 9) {
			echo 'IX';
			$intDate -= 9;
		}
		while($intDate >= 5) {
			echo 'V';
			$intDate -= 5;
		}
		if($intDate >= 4) {
			echo 'IV';
			$intDate -= 4;
		}
		while($intDate >= 1) {
			echo 'I';
			$intDate -= 1;
		}
		echo ' in Roman numerals ';
	}
	
?>
</body>
</html>