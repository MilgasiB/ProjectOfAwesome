<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="subSumList.css"/>
	</head>
<body>
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
	if(!empty($_GET))
	{
		//visa den sökta sammanfattningen
		$_GET = null;
		$subject_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
	
		$statement = $pdo->prepare("SELECT summaries.* FROM summaries INNER JOIN subjects ON summaries.subject_id = subjects.id WHERE summaries.subject_id=:subject_id");
		$statement->bindParam(":subject_id", $subject_id);
		if($statement->execute())
		{
			while($row = $statement->fetch())
			{

				echo "<a href=\"test1.php?id={$row['id']}\"><li class=\"summaries\"><div id=\"date\">{$row['date']}</div>{$row['title']}<br /></li></a>";
			}
		}
		else
		{
			print_r($statement->errorInfo());
		}
	}	
	
	
}

?>
</ul>
</body>
</html>