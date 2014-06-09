<!DOCTYPE html>
<html>
	<head>
		<title> Lägg till ämne </title>
			
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="postSubjects.css"/>
	</head>
		
<body>
<?php

//värde för pdo


$host     = "localhost";
$dbname   = "poa";
$username = "POA";
$password = "korv";

//gör pdo

$dsn = "mysql:host=$host;dbname=$dbname";
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

$pdo = new PDO($dsn, $username, $password, $attr);
//spara formulärdata i db

if($pdo)
{
	?>

<form action="postSubjects.php" method="POST">
	<fieldset>
		<p id="title">
			<a href="fpTest2.php"><img src="logo3.jpg"/></a>
		</p>
		<p>
			<label for="name">Ämnets namn: </label>
			<input type="text" name="name"/>
		</p>

		<p>
			<input type="submit" value="Lägg till ämne" />
		</p>
</fieldset>
</form>


	
	<?php
	if(!empty($_POST))
	{	
		$_POST = null;
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		
		$statement = $pdo->prepare("INSERT INTO subjects(id, name) VALUES (0, :name)");
		$statement->bindParam(":name", $name);
		if($statement->execute())
			{
				
			}
			else
			{
				print_r($statement->errorInfo());
			}
	}


}
else
{
	echo "not connected";
}



?>
</body>
</html>