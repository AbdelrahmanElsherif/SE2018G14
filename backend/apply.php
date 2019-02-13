<?php
require_once("functions.php");
$internship = false;
if (isset($_GET['internship_id']) && $_GET['internship_id']) $internship = getInternship($_GET['internship_id']);
if (!$internship) { header("Location: search.php"); exit; }


$required_fields = array("mobile", "internship_id");
if ($_POST)
{
	$errors = checkRequiredFields($required_fields, $_POST);
	if (!$errors)
	{
		$mobile = $_POST['mobile'];
		$internship_id = $_POST['internship_id'];
		$application = getApplication($internship_id, $_SESSION['user']['id']);
		if (!$application)
		{
			if (!hasAccess($internship_id, $_SESSION['user']['id']))
			{
				if (isset($_FILES['cv_file']) && $_FILES['cv_file'])
				{
					$temp_path = $_FILES['cv_file']['tmp_name'];
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					if (finfo_file($finfo, $temp_path) == "application/pdf")
					{
						mysql_insert("application", array(
							"user_id" => $_SESSION['user']['id'],
							"internship_id" => $internship_id,
							"mobile" => $mobile,
							"cv" => file_get_contents($temp_path)
						));
					}
					else
					{
						$errors[] = "Your CV has to be a valid PDF file. Please try again.";
					}
				}
				else 
				{
					$errors[] = "The CV file was left blank.";
				}
			}
			else
			{
				$errors[] = "You cannot apply to a position you posted.";
			}
		}
		else
		{
			$errors[] = "You have already applied for this position";
		}
	}

}
else if (isset($_GET['internship_id']) && $_GET['internship_id'])
{
	$application = getApplication($_GET['internship_id'], $_SESSION['user']['id']);
	if ($application) $errors[] = "You have already applied for this position";
	if (hasAccess($_GET['internship_id'], $_SESSION['user']['id'])) $errors[] = "You cannot apply to a position you posted.";
}
?>