<?php
require_once("functions.php");
$internship_stmt = mysql_select("internship", "", array("user_id" => $_SESSION['user']['id']));
$application_stmt = dosql("SELECT internship_id FROM application INNER JOIN internship ON application.user_id=:user_id AND internship.id=application.internship_id", array(":user_id" => $_SESSION['user']['id']));
?>
