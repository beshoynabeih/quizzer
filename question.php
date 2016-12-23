<?php include 'database.php'; ?>
<?php session_start();?>
<?php 
	//set question number
	$number = (int) $_GET['n'];
	
	//get correct question 
			$query = "SELECT * FROM questions";
			//get results
			$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
			$total = $results->num_rows;
	
	//	get the questions
	$query = "SELECT * FROM questions WHERE question_number = $number";
			
	//get result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__) ;
	
	$question = $result->fetch_assoc();

	//	get the choisec 
	$query = "SELECT * FROM choises WHERE question_number = $number";
			
	//get results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>PHP QUIZER</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
	<body>
		<header>
			<div class="container">
				<h1>PHP Quizzer</h1>
			</div>
		</header>
		<main>
			<div class="container">
				<div class="current">Question <?php echo $question['question_number']."of".$total; ?></div>
				<p class="question">
					<?php echo $question['text']; ?>
				</p>
				<form method="post" action="process.php">
					<ul class="choices">
						<?php while($row = $choices->fetch_assoc()): ?>
							<li><input name="choise" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']?></li>
						<?php endwhile;?>
					</ul>
				<input type="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number?>"/>
				</form>
			</div>
		</main>
		<footer>
			<div class="container">
				Copyright &copy; 2014 php Quizzer
			</div>
		</footer>
	</body>
</html>