<?php
require_once("functions.php");
if (isset($_GET['m']) && $_GET['m'] == "api") { echo json_encode(getNotifications($_SESSION['user']['id'])->fetchAll()); exit; }
$stmt = getNotifications($_SESSION['user']['id']);
dosql("UPDATE notifications SET seen=1 WHERE user_id=:user_id", array(":user_id" => $_SESSION['user']['id']));
?>