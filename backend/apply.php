<?php
require_once("functions.php");
$internship = false;
if (isset($_GET['internship_id']) && $_GET['internship_id']) $internship = getInternship($_GET['internship_id']);

if (!$internship) header("Location: search.php");

$required_fields = array("mobile", "internship_id");
if ($_POST)
{
	$errors = checkRequiredFields($required_fields);
	if (!$errors)
	{
		$mobile = $_POST['mobile'];
		$internship_id = $_POST['internship_id'];
		if (!getApplication($internship_id, $_SESSION['user']['id']))
		{
			if (isset($_FILES['cv_file']) && $_FILES['cv_file'])
			{
				$path_temp = $_FILES['cv_file']['tmp_name'];
				mysql_insert("application", array(
					"user_id" => $_SESSION['user']['id'],
					"internship_id" => $internship_id,
					"mobile" => $mobile,
					"cv" => file_get_contents($path_temp)
				));
			}
			else 
			{
				$errors[] = "The CV file was left blank.";
			}
		}
		else
		{
			$errors[] = "You have already applied for this internship.";
		}
	}

}
?>