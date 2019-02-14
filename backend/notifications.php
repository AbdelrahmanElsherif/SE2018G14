<?php
require_once("functions.php");
if (isset($_GET['m']) && $_GET['m'] == "api") { json_encode(getNotifications($_SESSION['user']['id'])->fetchAll()); exit; }
$stmt = getNotifications($_SESSION['user']['id']);
?>