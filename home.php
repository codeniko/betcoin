<?php

include 'include.php';
if (isLoggedIn() == false) {
	header('Location: http://localhost');
	die();
}

if (isset($_GET['getUserInfo'])) {
	$results  = $db->query("SELECT rowid, * FROM users WHERE rowid = '".$_COOKIE['uid']."'");
	$row = $results->fetchArray();
	die('{"uid":'.$row['rowid'].', "user":"'.$row['user'].'", "wins":'.$row['wins'].', "losses":'.$row['losses'].'}');
}


if (isset($_GET['createBet'])) {
	//question, endstamp
	print_r($_POST);
	$results = $db->exec("INSERT INTO questions VALUES(".$_COOKIE['uid'].", '".$_POST['question']."', '".$_POST['endstamp']."', 0)");
	//$questionId = sqlite_last_insert_rowid($results);
	$result = $db->query("SELECT last_insert_rowid()");
	$row = $result->fetchArray();
	$questionId = $row[0];
/*	
	$datetime = explode(" ", $_POST['endstamp']);
	$d = new DateTime( $datetime[0] );
	$timestamp = $d->format( 'U' );
	$times = explode(":", $datetime[1]);
	$timestamp += $times[0]*60*60 + $times[1]*60;
 */


	$options = explode(",", $_POST['options']);
	$i = 0;
	foreach($options as $opt) {
		$results = $db->exec("INSERT INTO options VALUES(".$questionId.", ".$i.", '".$opt."')");
		$i++;
	}
	
	die($questionId); // returns inserted id of question for redirection
}

//home.php?getUserInfo

//{"uid":2, "user":"joyce", "wins":232, "losses":3432}
?>
<!doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="lib/foundation/css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="lib/foundation/css/foundation.css"/>
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/vex/css/vex.css"/>
    <link rel="stylesheet" type="text/css" href="lib/vex/css/vex-theme-os.css"/>
    <link rel="stylesheet" type="text/css" href="css/betcoin.css"/>
  </head>
  <body>
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">Betcoin</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li><a href="logout.php" class="logout-button">Logout</a></li>
        </ul>
      </section>
    </nav>
    <div class="container">
      <div class="row">
        <h1 class="welcome subtitle">Welcome, User</h1>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
			<?php 
				if ($_COOKIE['uid'] == 2)
					echo '<img src="images/profile.jpg">';
				else if ($_COOKIE['uid'] == 3)
					echo '<img src="images/apexa.jpg">';
				else if ($_COOKIE['uid'] == 4)
					echo '<img src="images/frank.jpg">';
				else
					echo '<img src="images/niko.jpg">';
			?>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <div class="stats">
            <h1 class="subtitle">10 - 2</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a href="findBet.html" class="expand button find-bet-button">Find a Bet</a>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a href="#" class="expand button create-bet-button">Create a New Bet</a>
        </div>
      </div>
    </div>
    <script src="/lib/jquery-1.11.2.js"></script>
    <script src="/lib/vex/js/vex.combined.min.js"></script>
    <script src="/js/createBet.js"></script>
    <script>
      getUserInfo();
      function getUserInfo() {
        $.post("home.php?getUserInfo", {}).done(function(data) {
          if (data == "none") {
            return;
          }
          var obj = jQuery.parseJSON(data);
          $(".welcome.subtitle").html("Welcome, " + obj.user + "!");
          $(".stats .subtitle").html(obj.wins + " - " + obj.losses);
        });
      }
    </script>
  </body>
</html>
