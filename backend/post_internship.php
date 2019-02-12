<?php
require_once("functions.php");
$required_fields = array("title", "company", "field", "city", "period", "type", "academic_year", "role", "description");

$fields = getConstant("fields");
$cities = getConstant("cities");
$periods = getConstant("periods");
$types = getConstant("types");
$academic_years = getConstant("academic_years");

if ($_POST)
{
	$errors = checkRequiredFields($required_fields, $_POST);
	if (!$errors)
	{
		$field = checkExists($_POST['field'], $fields);
		$city = checkExists($_POST['city'], $cities);
		$period = checkExists($_POST['period'], $periods);
		$type = checkExists($_POST['type'], $types);
		$academic_year = checkExists($_POST['academic_year'], $academic_years);
		
		if ($field !== false && $city !== false  && $period  !== false && $type !== false  && $academic_year !== false)
		{
			$params = array("user_id" => $_SESSION['user']['id'],
			"title" => sanitizeField($_POST['title']),
			"company" => sanitizeField($_POST['company']),
			"field" => $field,
			"city" => $city,
			"period" => $period,
			"type" => $type,
			"academic_year" => $academic_year,
			"role" => sanitizeField($_POST['role']),
			"description" => sanitizeField($_POST['description']));
			$row = mysql_select("internship", "AND", $params)->fetch(); //This will be slow on large records; not recommended. Placing it for now anyway to prevent duplicates till we find a better approach.
			if (!$row) 
			{
				if (mysql_insert("internship", $params))
				{ 
					$_SESSION['success'][] = "Your internship has been posted successfully.";
				}
				else
				{
					$errors[] = "An error occurred while submitting your internship. Please try again later";
				}
			}
			else
			{
				$errors[] = "You have already submitted this record before.";
			}
		}
		else
		{
			$errors[] = "Malformed request. Please try again.";
		}
	}
}
?>