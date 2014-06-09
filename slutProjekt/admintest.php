<!DOCTYPE html>
<html>
	<head>
		<title>Admin login</title>
		
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="adminTest.css"/>
	</head>

<body>

<form action="fpAdminView.php" method="post">
	<p id="username">
		<label for="username">Användarnamn: </label>
		<input type="password" name="username">
	</p>
	<p id="password">
		<label for="password">Lösenord: </label>
		<input type="password" name="password">
	</p>
	<p id="login">
			<input type="submit" value="Logga in"/>
	</p>

</form>
<?php

$host     = "localhost";
$dbname   = "poa";
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);

//gör pdo

$dsn = "mysql:host=$host;dbname=$dbname";
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

$pdo = new PDO($dsn, $username, $password, $attr);

if($pdo)
{
	echo "success";
}
else
{
	print_r($statement->errorInfo());
}

?>
</body>
</html>