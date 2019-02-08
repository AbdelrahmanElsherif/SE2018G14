<?php
$required_fields = array("title", "company", "field", "city", "period", "type", "academic_year", "role", "description");

function getName($name)
{
	return str_replace("_", " ", $name);
}
$fields = getConstant("fields");
$cities = getConstant("cities");
$periods = getConstant("periods");
$types = getConstant("types");
$academic_years = getConstant("academic_year");
function checkExists($key, $array)
{
	if (isset($array[$key])) return $array[$key];
	return false;
}
function sanitizeField($value)
{
	return htmlentities(strip_tags($value));
}
if ($_POST)
{
	$errors = array();
	foreach ($required_fields as $field) { if (!isset($_POST[$field]) || empty($_POST[$field])) { $errors[] = "'".ucfirst(getName($field))	."' is a required field, but it was left blank.";} } 
	
	if (!$errors)
	{
		$field = checkExists($_POST['field'], $fields);
		$city = checkExists($_POST['city'], $cities);
		$period = checkExists($_POST['period'], $periods);
		$type = checkExists($_POST['type'], $types);
		$academic_year = checkExists($_POST['academic_year'], $academic_years);
		
		if ($field !== false && $city !== false  && $period  !== false && $type !== false  && $academic_year !== false)
		{
			mysql_insert("internship", array("user_id" => $_SESSION['user']['id'],
			"title" => sanitizeField($_POST['title']),
			"company" => sanitizeField($_POST['company']),
			"field" => $field,
			"city" => $city,
			"period" => $period,
			"type" => $type,
			"academic_year" => $academic_year,
			"role" => sanitizeField($_POST['role']),
			"description" => sanitizeField($_POST['description'])));
			$_SESSION['success'][] = "Your internship has been posted successfully.";
		}
		else
		{
			$errors[] = "Malformed request. Please try again.";
		}
	}
}
?>