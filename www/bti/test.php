<?php
require_once "Mail.php";

$from = "jack@cargotech.com.au";
$to = 'f22zhang@students.latrobe.edu.au';

$host = "ssl://smtp.gmail.com:465";
$username = 'jack@cargotech.com.au';
$password = 'zhang89179414';

$subject = "test";
$body = "test";

$headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo($mail->getMessage());
} else {
  echo("Message successfully sent!\n");
}

?>