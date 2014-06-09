<!DOCTYPE html>
<html>
	<head>
		<title> Startsida </title>
			
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="style2.css"/>
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
<div class="div1">
<nav class="inlineblock">
	<ul class="subjectList">
<?php
	foreach($pdo->query("SELECT* FROM subjects ORDER BY name") as $row)
	{
		echo "<a href=\"showSubSum.php?id={$row['id']}\"><li class=\"subjects\">{$row['name']}</li></a>";
	}
?>
	</ul>
	<a href="postSubjects.php">
		<p id="addSubjects">Lägg till ämne</p>
	</a>
	<a href="postSummaries.php">
		<p id="addSummaries">Lägg till sammanfattning</p>
	</a>
	<a href="admintest.php">
		<p id="adminMode">Admin view</p>
	</a>
</nav>
<div class="summaryList">
<?php	
	foreach($pdo->query("SELECT* FROM summaries ORDER BY date") as $row)
	{
		echo "<div id=\"container\"><a href=\"test1.php?id={$row['id']}\"><section class=\"summaries\">{$row['date']} {$row['title']}<br /></section></a></div>";
	}
}		

?>
</div>
</body>		
</html>
		
		
