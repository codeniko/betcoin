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
	$results = $db->exec("INSERT INTO questions VALUES(".sqlite_escape_string($_COOKIE['uid']).", '".sqlite_escape_string($_POST['question'])."', ".$_POST['endstamp'].", 0)");
	$questionId = sqlite3_last_insert_rowid();
	$options = explode(",", $_POST['options']);
	$i = 0;
	foreach($option as $opt) {
		$results = $db->exec("INSERT INTO options VALUES(".sqlite_escape_string($questionId).", ".$i.", '".sqlite_escape_string($opt)."')");
		$i++;
	}
	
	die($questionId); // returns inserted id of question for redirection
}

//home.php?getWinsLoss 

//{"wins":232, "losses":3432}
?>
