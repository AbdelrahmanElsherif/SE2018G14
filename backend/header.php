<?php
	$notifications = getNotifications($_SESSION['user']['id'], true);
	$hasUnread = hasUnread($_SESSION['user']['id']);
?>