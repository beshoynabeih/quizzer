<?php include 'database.php'; ?>
<?php 
	//get the total number of questions 
	$query = "SELECT * FROM questions ";
	
	//get results 
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$total = $results->num_rows;
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
				<h2>Test Your Php Knowledge</h2>
				<p>This is A multiple choice to test your know;edge of PHP</p>
				<ul>
					<li><strong>Number of questions</strong> <?php echo $total; ?></li>
					<li><strong>Type: </strong>Multiple Choce</li>
					<li><strong>Estimated Time: </strong><?php echo $total * 0.5 ;?> Minutes</li>
				</ul>
				<a href="question.php?n=1" class="start">Start Quiz</a>
			</div>
		</main>
		<footer>
			<div class="container">
				Copyright &copy; 2014 php Quizzer
			</div>
		</footer>
	</body>
</html>