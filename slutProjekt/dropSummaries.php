<!DOCTYPE html>
<html>
	<head>
		<title>Ta bort sammanfattningar</title>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="dropSummaries.css"/>
	</head>
<body>
	<form>
		<ul>
			<p id="title">
				<a href="fpTest2.php"/><img src="logo3.jpg"/></a>
			</p>	
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

		foreach($pdo->query("SELECT * FROM summaries ORDER BY title") as $row)
		{
			echo "<a href=\"test1.php?id={$row['id']}\"><div id=\"split\"><input type=\"checkbox\" value=\"{$row['title']}\"><li class=\"summaries\">{$row['title']}</li></div></a>";
		}
	
}
?>

			<p id="dropSummaries">	
				<input type="submit" value="Ta bort ämne/ämnen">
			</p>
		</ul>
	</form>
</body>
</html>