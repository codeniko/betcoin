<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);


// $conn = pg_connect("host=localhost port=5432 dbname=iql user=iql password=juliarocks")
	//or die("a fiery death");

$db = new SQLite3('betcoin.db');

function isLoggedIn() {
	if (isset($_COOKIE['uid']) ) {
		return true;
	}
	return false;
}

?>
