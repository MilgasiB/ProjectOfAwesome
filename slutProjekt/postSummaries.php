<!DOCTYPE html>
<html>
	<head>
		<title> Lägg till sammanfattning </title>
			
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="postSummaries.css"/>
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
<form action="postSummaries.php" method="POST">
	<fieldset>
		<p id="title">
			<a href="fpTest2.php"><img src="logo3.jpg"/></a>
		</p>
		<p>
			<label for="title">Rubrik: </label>
			<input type="text" name="title"/>
		</p>
		
		<p>
			<textarea placeholder="Skriv text här" type="text" name="post"></textarea>
		</p>
			
		<label for="subject_id">Ämne: </label> 
		<select name="subject_id">
		<?php
		foreach($pdo->query("SELECT * FROM subjects ORDER BY name") as $row) 
		{
			echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
		}
		?>
		</select>
		<p>
			<label for="name">Upplagd av: </label>
			<input type="text" name="name"/>
		</p>
		<p>
			<input type="submit" value="Lägg till sammanfattning" />
		</p>
	</fieldset>
</form>
	

	
	<?php
	
	if(!empty($_POST))
	{
		$_POST = null;
		
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$post = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$subject_id = filter_input(INPUT_POST, 'subject_id', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		
		$statement = $pdo->prepare("INSERT INTO summaries (title, date, subject_id, content, name) VALUES (:title, NOW(), :subject_id, :post, :name)");
		$statement->bindParam(":title", $title);
		$statement->bindParam(":post", $post);
		$statement->bindParam(":subject_id", $subject_id);
		$statement->bindParam(":name", $name);
		if($statement->execute())
		{
			
		}
	}
	
	// har något postats? -> skriv till databas
	
	// visa post-formulär för att skriva inlägg
	



}
else
{
	echo "not connected";
}



?>
</body>
</html>