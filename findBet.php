<?php
include 'include.php';
if (isLoggedIn() == false) {
	header('Location: http://localhost');
	die();
}

	if (isset($_GET['placeBet'])) {
		$results = $db->exec("INSERT INTO bets VALUES('".$_COOKIE['uid']."', ".$_POST['qid'].", ".$_POST['oid'].", ".$_POST['amount'].")");
		die(true);
	}


	$results = $db->query("SELECT COUNT(*) FROM questions WHERE ended = 0");
	$row = $results->fetchArray();
	$count = $row[0];

	if ($count == 0)
		die("none");

	$random = rand(0, $count-1); //return the values of this row
	$results = $db->query("SELECT rowid, * FROM questions WHERE ended = 0");
	$i = 0;
	$rowQ = 0;
	while ($rowQ = $results->fetchArray()) {
		if (isset($_GET['qid'])) {
		  if ($_GET['qid'] == $rowQ['rowid']) {
			  break;
		  } else {
				continue;
		  }
		}
		if ($i >= $random) {
			break;
		}
		$i++;
	}
	$results = $db->query("SELECT * FROM users WHERE rowid = ".$rowQ['owner']);
	$rowU = $results->fetchArray();
	$results = $db->query("SELECT * FROM options WHERE qid = ".$rowQ['rowid']);
	
		echo '{"qid":'.$rowQ['rowid'].', "question":"'.$rowQ['question'].'", "ownerUID":'.$rowQ['owner'].', "owner":"'.$rowU['user'].'", "endstamp":"'.$rowQ['endstamp'].'", "options":[';
	$i = 0;
	while ($rowO = $results->fetchArray()) {
		if ($i > 0)
			echo ',';
		$i++;
		echo '{"oid":'.$rowO['oid'].', "option":"'.$rowO['option'].'"}';
	}

	echo '], "bets":[';
	$results = $db->query("SELECT * FROM bets WHERE qid = ".$rowQ['rowid']);
	$i = 0;
	while ($rowB = $results->fetchArray()) {
		if ($i > 0)
			echo ',';
		$i++;
		echo '{"uid":'.$rowB['uid'].', "amount":'.$rowB['amount'].'}';
	}
	
echo ']}';

/*
{
	"question": "test bet",
		"ownerUID": 2,
		"owner": "joyce",
		"endstamp": "2015-03-29 00:03",
		"options": [{"oid":2, "option":"test1"}, "test2", "hi"],
		"bets": []
}
* */

?>
