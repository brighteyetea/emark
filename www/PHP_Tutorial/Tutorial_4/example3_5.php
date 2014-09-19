<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="common.css" />
</head>

<body>
	<h1>Thank You</h1>
    <p>Thank you for registering. Here is the information you submitted: </p>
	<dl>
    	<dt>First name</dt><dd><?php echo $_POST["firstName"]; ?></dd>
        <dt>Last name</dt><dd><?php echo $_POST["lastName"]; ?></dd>
        <dt>Password</dt><dd><?php echo $_POST["password1"]; ?></dd>
        <dt>Retyped password</dt><dd><?php echo $_POST["password2"]; ?></dd>
        <dt>Gender</dt><dd><?php echo $_POST["gender"]; ?></dd>
        <dt>Favorite author</dt><dd><?php echo $_POST["favoriteAuthor"]; ?></dd>
        <dt>Do you want to receive our newsletter?</dt><dd><?php echo $_POST["newsletter"]; ?></dd>
        <dt>Comments</dt><dd><?php echo $_POST["comments"]; ?></dd>
    </dl>


</body>
</html>