<?php 
//create connection credentials
	$db_host = 'localhost';
	$db_name = 'quizzer';
	$db_user = 'root';
	$db_pass = 'a7med';
	
//create sql object
	$mysqli = new mysqli($db_host , $db_user , $db_pass ,$db_name);
	
//Error handler
if(!$mysqli){
	printf("connect failed %s\n",$mysqli->connect_error);
	exit();
}
?>