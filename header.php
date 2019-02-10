<?php require_once('common.php');
requiresAuthentication();
$css = array("css/main.css");
require_once("global_header.php");
require_once("view_functions.php");
?>
<div class="content">
   <header>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <a class="navbar-brand" href="index.php">Intern</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Explore</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="post_internship.php">Post Internship</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="application.php">Manage Applications</a>
      </li>
    </ul>
	<ul class="pull-right navbar-nav"><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Logged in as <strong><?php echo $_SESSION['user']['username'] ?></strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</header>
</div>
