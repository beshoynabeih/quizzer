<?php include 'database.php'?>
<?php	session_start();?>
<?php
		//check for the score isset
		if(!isset($_SESSION['score'])){
			$_SESSION['score'] = 0;
		}
		
		if($_POST){
			$number = $_POST['number'];
			$selected_choise = $_POST['choise'];
			$next = $number+1;
			
			//get correct question 
			$query = "SELECT * FROM questions";
			//get results
			$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
			$total = $results->num_rows;
			
			//get correct choise
			$query = "SELECT * FROM choises WHERE question_number = $number AND is_correct=1 ";
			
			//get reslt
			$result = $mysqli->query($query) or die($mysqli->error.__LINE);
			
			//get row 
			$row = $result->fetch_assoc();
			
			//set correct choice
			$correct_choice = $row['id'];
			
			//compare
			if($correct_choice == $selected_choise){
				//answer is correct
				$_SESSION['score']++;
			}
			
			if($number == $total){
				header("Location: final.php");
				exit();
			}
			else{
				header("Location: question.php?n=".$next);
			}
		}
		
?>