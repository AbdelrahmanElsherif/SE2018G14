<?php require_once('common.php');
requiresAuthentication();
$css = array("css/header_test.css", "css/main.css");
$js = array("js/mobile.js");
require_once("global_header.php");
require_once("view_functions.php");
$pages = array(
"index.php" => "Home",
"manage.php;application.php;apply.php" => "Manage Applications",
"post_internship.php" => "Post Internship",
"serch.php" => "Explore"
);
function getURL($url)
{
	if (strpos($url, ";") !== false)
	{
		return explode(";", $url)[0];
	}
	return $url;
}
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
		<?php foreach($pages as $url => $page) { echo "<li".( basename($_SERVER["SCRIPT_FILENAME"]) == getURL($url)? " class='menu-active'" : "")."><a href='".getURL($url)."'>".$page."</a></li>"; } ?>
          
		  <li class="menu-has-children"><a href="#">Logged in as <strong><?php echo $_SESSION['user']['username'] ?></strong></a>
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
