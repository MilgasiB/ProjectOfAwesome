<!DOCTYPE html>
<html>
	<head>
		<title> Admin view </title>
			
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="fpAdminView.css"/>
	</head>
		
<body>
		
<?php

$host     = "localhost";
$dbname   = "poa";
$username = "POA";
$password = "korv";

//gör pdo

$dsn = "mysql:host=$host;dbname=$dbname";
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

$pdo = new PDO($dsn, $username, $password, $attr);


if($pdo) 
{
	?>
<p id="title">
	<a href="fpTest2.php">
		<img src="logo3.jpg">
	</a>
</p>
<nav class="inlineblock">

	<a href="dropSubjects.php">
		<p id="dropSubjects">Ta bort ämne</p>
	</a>
	<a href="dropSummaries.php">
		<p id="dropSummaries">Ta bort sammanfattning</p>
	</a>
</nav>
<?php
}
?>
</body>		
</html>

		
		
