<?php
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
	foreach ($required_fields as $field) { if (!isset($data[$field]) || (empty($data[$field]) && $data[$field] !== "0")) { $errors[] = "'".ucfirst(getName($field))	."' is a required field, but it was left blank.";} } 
	return $errors;
}
?>