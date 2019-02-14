<?php require_once('common.php');
requiresAuthentication();
$css = array("css/header_test.css");
$js = array("js/mobile.js");
require_once("global_header.php");
require_once("view_functions.php");
?>
<header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">INTERN</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="search.php">Explore</a></li>
          <li><a href="post_internship.php">Post Internship</a></li>
          <li><a href="application.php">Manage Applications</a></li>
            <li class="menu-has-children"><a href="#">Logged in as <strong><?php echo $_SESSION['user']['username'] ?></a>
            <ul>
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><div class="dropdown-divider"></div></li>
              <li> <a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <!-- <li><a href="">Contact</a></li> -->
        </ul>
     
      </nav><!-- #nav-menu-container -->

    </div>
  </header><!-- #header -->
<div class="content container">
