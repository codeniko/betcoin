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
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/lib/vex/css/vex.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/vex/css/vex-theme-os.css"/>
    <link rel="stylesheet" type="text/css" href="/css/betcoin.css"/>
  </head>
  <body class="index-background">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">Betcoin</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li><a href="#" class="login-button">Login</a></li>
          <li><a href="#" class="register-button">Register</a></li>
        </ul>
      </section>
    </nav>
    <div class="container">
      <div class="row">
        <div class="small-4 small-centered columns">
          <h1 class="title">Betcoin</h1>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a class="expand button login-button">Log In</a>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a class="expand button register-button">Register</a>
        </div>
      </div>
      <div class="row">
        <div class="small-4 small-centered columns">
          <a href="#" class="expand button about-button">About</a>
        </div>
      </div>
    </div>
    <script src="/lib/jquery-1.11.2.js"></script>
    <script src="/lib/vex/js/vex.combined.min.js"></script>
    <script src="/js/index.js"></script>
  </body>
</html>
