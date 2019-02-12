<?php
function getUser($id)
{
	return mysql_select("user", "", array("id" => $id));
}
function getInternship($id)
{
	return mysql_select("internship", "", array("id" => intval($id)))->fetch();
}
function getApplication($internship_id, $user_id)
{
	return mysql_select("application", "AND", array("user_id" => intval($user_id), "internship_id" => intval($internship_id)))->fetch();
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