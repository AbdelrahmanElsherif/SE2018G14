<?php
require_once("functions.php");
$internship_stmt = mysql_select("internship", "", array("user_id" => $_SESSION['user']['id']));
$application_stmt = mysql_select("application", "", array("user_id" => $_SESSION['user']['id']), "internship_id");
?>
