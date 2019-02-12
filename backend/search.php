<?php 
require_once("functions.php");
$fields = getConstant("fields");
$cities = getConstant("cities");
$periods = getConstant("periods");
$types = getConstant("types");
$academic_years = getConstant("academic_years");

if (isset($_GET['q']))
{
	$errors = array();
	//$errors = checkRequiredFields($required_fields, $_GET);
	if (!$errors)
	{
		$params = array();
		if ($_GET['q'])
		{
			$params['role'] = htmlentities(strip_tags("%".$_GET['q']."%"));
			$params['company'] = htmlentities(strip_tags("%".$_GET['q']."%"));
			$params['description'] = htmlentities(strip_tags("%".$_GET['q']."%"));
		}
		if (isset($_GET['field'])) $params['field'] = checkExists($_GET['field'], $fields);
		
		if (isset($_GET['city'])) $params['city'] = checkExists($_GET['city'], $cities);
		if (isset($_GET['period'])) $params['period']= checkExists($_GET['period'], $periods);
		if (isset($_GET['type'])) $params['type'] = checkExists($_GET['type'], $types);
		if (isset($_GET['academic_year'])) $params['academic_year'] = checkExists($_GET['academic_year'], $academic_years);
		
		$stmt = mysql_select("internship", "AND" , $params, " LIKE ");
	}
}
?>