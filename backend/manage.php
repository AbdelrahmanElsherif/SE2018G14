<?php
require_once("functions.php");
$stmt = mysql_select("internship", "", array("user_id" => $_SESSION['user']['id']));
?>