<!DOCTYPE html>
<html>
	<head>
		<title>  </title>
			
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
			
		<link rel="Stylesheet" type="text/css" href="postComments.css"/>
	</head>
		
<body


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
<div id="test">
	<p id="title">
		<a href="fpTest2.php"><img src="logo3.jpg"/></a>
	</p>
<?php
	if(!empty($_GET))
	{
		//visa den sökta sammanfattningen
		$_GET = null;
		$summary_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
	
		$statement = $pdo->prepare("SELECT summaries.*, summaries.name AS sumName, subjects.name AS subNamn FROM summaries INNER JOIN subjects ON summaries.subject_id = subjects.id WHERE :summary_id=summaries.id");
		$statement->bindParam(":summary_id", $summary_id);
		if($statement->execute())
		{
			while($row = $statement->fetch())
			{
				echo "<p><section id=\"headline\">{$row['title']}</section> <br /> {$row['subNamn']}<section id=\"contentContainer\">{$row['content']}</section> <br /> {$row['date']} <br /> Upplagd av: {$row['sumName']} </p>";
			}
		}
		
		?>
	<form action="?id=<?php echo $summary_id ?>" method="POST">
		<p>
			<label for="name">Namn: </label>
			<input type="text" name="name">
		</p>			
		<p>
			<textarea placeholder="Write text here" type="text" name="post"></textarea>
		</p>
						
		<p>
			<input type="submit" value="Skicka kommentar"/>
		</p>
		<hr />
	</form>
</div>
	<?php
		//skriv kommentar
		if(!empty($_POST))
		{
			$_POST = null;
		
			$post = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
			$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		
			$statement = $pdo->prepare("INSERT INTO comments (date, content, summary_id, name) VALUES (NOW(), :post, :summary_id, :name)");
			$statement->bindParam(":post", $post);
			$statement->bindParam(":name", $name);
			$statement->bindParam(":summary_id", $summary_id);
			if ($statement->execute())
			{
				
			}
			else
			{
				print_r($statement->errorInfo());
			}

		}
		?>
<h1>Kommentarer</h1>
		<?php
		// visa kommentarer på denna sammanfattning
		$statement = $pdo->prepare("SELECT * FROM comments WHERE summary_id=:summary_id ORDER by date");
		$statement->bindParam(":summary_id", $summary_id);
		if($statement->execute())
		{
			while($row = $statement->fetch())
			{
				echo "<p><section id=\"commentContainer\">{$row['content']}</section> Av: {$row['name']} {$row['date']}</p>";
			}
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
	
