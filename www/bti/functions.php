<?php
function processCube($cube, $weight) {
	if($cube / 1000000.0 > $weight/1000) {
		$cube =  $cube / 1000000.0 ;
	} else {
		$cube = $weight/2000;
	}
	
	if($cube < 1) {
		return 1;
	} else {
		return $cube;
	}
}

function saveFile($fileName, $text) {
		if (!$fileName || !$text)
			return false;
		if (makeDir(dirname($fileName))) {
			if ($fp = fopen($fileName, "w")) {
				if (@fwrite($fp, $text)) {
					fclose($fp);
					return true;
				} else {
					fclose($fp);
					return false;
				}
			}
		}
		return false;
	}

function makeDir($dir, $mode=0755) {
		 /*function makeDir($dir, $mode="0777") { 此外0777不能加单引号和双引号，
	 加了以后，"0400" = 600权限，处以为会这样，我也想不通*/
		if (!$dir) return false;
		if(!file_exists($dir)) {
			return mkdir($dir,$mode,true);
		} else {
			return true;
		}
}	
	
function randomRefe($timeStamp) {
	return substr(md5($timeStamp * rand()), 0, 15);
}

function sendEmail($to, $content) {
	require_once "Mail.php";

	$from = "jack@cargotech.com.au";

	$host = "ssl://smtp.gmail.com:465";
	$username = 'jack@cargotech.com.au';
	$password = 'zhang89179414';

	$subject = "Cargo Tech Qutoe";

	$headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
	$smtp = Mail::factory('smtp',
	  array ('host' => $host,
		'auth' => true,
		'username' => $username,
		'password' => $password));

	$mail = $smtp->send($to, $headers, $content);

	if (PEAR::isError($mail)) {
		$error_subject = "E-mail got error";
		$error_body = $mail->getMessage();
		$error_headers = array ('From' => $from, 'To' => "jackzhang8806@gmail.com",'Subject' => $error_subject);
		$smtp = Mail::factory('smtp',
		array ('host' => $host,
		'auth' => true,
		'username' => $username,
		'password' => $password));
		$smtp->send($from, $error_headers, $error_body);
	//  echo($mail->getMessage());
	} else {
	//  echo("Message successfully sent!\n");
	}
}
?>