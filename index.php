<?php
include 'include.php';

if (isLoggedIn()) {
	header('Location: http://localhost/home.php');
}
?>

<!doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/lib/foundation/css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/foundation/css/foundation.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/vex/css/vex.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/vex/css/vex-theme-os.css"/>
    <link rel="stylesheet" type="text/css" href="/css/betcoin.css"/>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="small-4 small-centered columns">
          <h1>Betcoin</h1>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a class="expand button login-button">Log In</a>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a href="#" class="expand button">Register</a>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a href="#" class="expand button">About</a>
        </div>
      </div>
    </div>
    <script src="/lib/jquery-1.11.2.js"></script>
    <script src="/lib/vex/js/vex.combined.min.js"></script>
    <script src="/js/index.js"></script>
  </body>
</html>
