<?php
function getEmail($user_id)
{
	$email = mysql_select("user", "", array("id" => $user_id), "=", "email")->fetch();
	return $email['email'];
}
function processStatus($status)
{
	switch ($status)
	{
		case -1:
			return "Undecided";
		case 0:
			return "Rejected";
		case 1:
			return "Accepted";
	}
}
function sendNotification($user_id, $text, $link)
{
	mysql_insert("notifications", array("user_id" => $user_id, "text" => $text, "link" => $link, "time" => time()));
}
function loopThrough($rows, $key, &$array)
{
	foreach ($rows as $row)
	{
		$array[] = $row[$key];
	}
}
function getPoster($id)
{
	$internship = getInternship($id, false, "user_id,company,role");
	if ($internship) return $internship;
	return false;
}
function getUser($id)
{
	return mysql_select("user", "", array("id" => $id))->fetch();
}
function getInternship($id, $user_id = false, $selector = "*")
{
	return $user_id? mysql_select("internship", "AND", array("id" => intval($id), "user_id" => intval($user_id)), "=", $selector)->fetch() : mysql_select("internship", "", array("id" => intval($id)), "=", $selector)->fetch();
}
function getApplicationById($id)
{
	return mysql_select("application", "AND", array("id" => intval($id)))->fetch();
}
function getApplication($internship_id, $user_id = false, $selector = "*")
{
	return $user_id? mysql_select("application", "AND", array("user_id" => intval($user_id), "internship_id" => intval($internship_id)), "=", $selector)->fetch() : mysql_select("application", "AND", array("internship_id" => intval($internship_id)), "=", $selector)->fetch();
}
function getName($name)
{
	return str_replace("_", " ", $name);
}
function checkExists($key, $array)
{
	if (isset($array[$key])) return $array[$key];
	return false;
}
function sanitizeField($value)
{
	return htmlentities(strip_tags($value));
}
function checkRequiredFields($required_fields, $data)
{
	$errors = array();
	foreach ($required_fields as $field) { if (!isset($data[$field]) || (empty($data[$field]) && $data[$field] !== "0") || $data[$field] == "-") { $errors[] = "'".ucfirst(getName($field))	."' is a required field, but it was left blank.";} } 
	return $errors;
}
?>