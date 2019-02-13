<?php include ('common.php');
require_once("header.php");?>
<h1>List of your internships:</h1>
 <?php
 showSearch($internship_stmt, "application", "Manage");
 
 ?>
 
<h1>List of your applications:</h1>
 <?php
 showSearch($application_stmt, "application", "Manage");
 
 ?>
<?php require_once("footer.php"); ?>
