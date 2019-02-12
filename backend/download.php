<?php 
requiresAuthentication();
require_once("functions.php");
if (isset($_GET['id']) && $_GET['id'])
{
	$application = getApplicationById($_GET['id']);
	if ($application)
	{
		if (hasAccess($application['internship_id'], $_SESSION['user']['id']) || $application['user_id'] == $_SESSION['user']['id'])
		{
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=filename.pdf");
			echo $application['cv'];
			exit();
		}			
	}
	else
	{
		header("Location: index.php");
	}
}
?>