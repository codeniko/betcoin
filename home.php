<?php

include 'include.php';
if (isLoggedIn() == false) {
	header('Location: http://localhost');
	die();
}

if (isset($_GET['getWinsLoss'])) {
	$results  = $db->query("SELECT * FROM users WHERE rowid = '".$_COOKIE['uid']."'");
	$row = $results->fetchArray();
	die('{"wins":'.$row['wins'].', "losses":'.$row['losses'].'}');
}

if (isset($_GET['createBet'])) {
	//question, endstamp
	print_r($_POST);
	$results = $db->exec("INSERT INTO questions VALUES(".$_COOKIE['uid'].", '".$_POST['question']."', '".$_POST['endstamp']."', 0)");
	//$questionId = sqlite_last_insert_rowid($results);
	$result = $db->query("SELECT last_insert_rowid()");
	$row = $result->fetchArray();
	$questionId = $row[0];
	$options = explode(",", $_POST['options']);
	$i = 0;
	foreach($options as $opt) {
		$results = $db->exec("INSERT INTO options VALUES(".$questionId.", ".$i.", '".$opt."')");
		$i++;
	}
	
	die($questionId); // returns inserted id of question for redirection
}

//home.php?getWinsLoss 

//{"wins":232, "losses":3432}
?>
