<?php 
require_once("functions.php");
$fields = getConstant("fields");
$cities = getConstant("cities");
$periods = getConstant("periods");
$types = getConstant("types");
$academic_years = getConstant("academic_years");

if (isset($_GET['q']))
{
	$errors = checkRequiredFields($required_fields, $_GET);
	if (!$errors)
	{
		$field = checkExists($_GET['field'], $fields);
		$city = checkExists($_GET['city'], $cities);
		$period = checkExists($_GET['period'], $periods);
		$type = checkExists($_GET['type'], $types);
		$academic_year = checkExists($_GET['academic_year'], $academic_years);
		$params = array();
		if ($_GET['q'])
		{
			$params['role'] = htmlentities(strip_tags("%".$_GET['q']."%"));
			$params['company'] = htmlentities(strip_tags("%".$_GET['q']."%"));
			$params['description'] = htmlentities(strip_tags("%".$_GET['q']."%"));
		}
		if ($field) $params['field'] = $field;
		if ($city) $params['city'] = $city;
		if ($period) $params['period'] = $period;
		if ($type) $params['type'] = $type;
		if ($academic_year) $params['academic_year'] = $academic_year;
		
		$stmt = mysql_select("internship", "AND" , $params, "LIKE");
	}
}
?>