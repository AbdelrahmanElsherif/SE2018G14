<?php include ('common.php');
require_once("header.php");?>
<h1>List of your Internships:</h1>
 <?php
 showSearch($stmt, "application", "Manage");
 
 ?>
<?php require_once("footer.php"); ?>
