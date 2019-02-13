<?php
require_once("functions.php");
$internship_stmt = mysql_select("internship", "", array("user_id" => $_SESSION['user']['id']));
$application_stmt = dosql("SELECT * FROM internship INNER JOIN application ON application.user_id=:user_id AND internship.id=application.internship_id", array(":user_id" => $_SESSION['user']['id'])); //bad performance, we will figure something out later
?>
