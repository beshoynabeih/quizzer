<?php include 'database.php'; ?>
<?php 
	if(isset($_POST['submit'])){
		//get post variables 
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choise'];
		//choices array
		$choices = array();
		$choices[1] = $_POST['choise_1'];
		$choices[2] = $_POST['choise_2'];
		$choices[3] = $_POST['choise_3'];
		$choices[4] = $_POST['choise_4'];
		$choices[5] = $_POST['choise_5'];
		
		//question query
		$query = "INSERT INTO `questions`(question_number, text) 
					VALUES('$question_number','$question_text')";
		
		//run query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Validate insert_row
		if($insert_row){
			foreach($choices as $choice=>$value){
				if($value != ''){
					if($correct_choice == $choice){
						$is_correct = 1;
					}else{
						$is_correct = 0;
					}
					//choise query
					$query = "INSERT INTO `choises`(question_number,is_correct,text)
									VALUES('$question_number','$is_correct','$value')";
					
					//run query
					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
					
					//validate insert
					if($insert_row){
						continue;
					}else{
						exit();
						//die('Error : ('.$mysqli->>errno.') '.$mysqli->error);
					}
					
				}
			}
			$msg = 'Question has been added';
		}
	}
	
	//get the total
	$query = "SELECT * FROM `questions`";
	//get the results 
	$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total=$questions->num_rows;
	$next = $total+1;
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
				<h2>Add Aquestion</h2>
				<?php 
					if(isset($msg)){
						echo '<p>'.$msg.'</p>';
					}
				?>
				<form method="post" action="add.php">
					<p>
						<label>Question Number</label>
						<input type="number" value="<?php echo $next; ?>" name="question_number"/>
					</p>
					<p>
						<label>Question Text</label>
						<input type="text" name="question_text"/>
					</p>
					<p>
						<label>Choice #1</label>
						<input type="text" name="choise_1"/>
					</p>
					<p>
						<label>Choice #2</label>
						<input type="text" name="choise_2"/>
					</p>
					<p>
						<label>Choice #3</label>
						<input type="text" name="choise_3"/>
					</p>
					<p>
						<label>Choice #4</label>
						<input type="text" name="choise_4"/>
					</p>
					<p>
						<label>Choice #5</label>
						<input type="text" name="choise_5"/>
					</p>
					<p>
						<label>Correct choise Number</label>
						<input type="number" name="correct_choise"/>
					</p>
					<p>
						<input type="submit" name="submit" value="Submit" />
					</p>
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