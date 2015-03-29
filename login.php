<?php
include 'include.php';

if (isLoggedIn() == true) {
	die('user is logged in already');
}

if (isset($_GET['register'])) {
	$results = $db->query("SELECT rowid, * FROM users WHERE `user` = '".$_POST['username']."'");
	$row = $results->fetchArray();
	if ($row == false) { //user doesnt exist, we can create one
		$results = $db->exec("INSERT INTO users VALUES('".$_POST['username']."', '".$_POST['password']."', 0, 0)");
		die("true");
	} else {
		print_r($row);
	}
	die("false");
}


$results = $db->query("SELECT rowid, * FROM users WHERE `user` = '".$_POST['username']."' AND `pass` = '".$_POST['password']."'");
//while ($row = $results->fetchArray()) {
$row = $results->fetchArray();
if ($row != false) {
	setcookie("uid", $row[0]);
	die("true");
}

die("false");
?>
