<?php
include 'include.php';

if (isLoggedIn() == true) {
	die('user is logged in already');
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
