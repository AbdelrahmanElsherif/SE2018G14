<?php 
require_once("functions.php");
$fields = getConstant("fields");
$cities = getConstant("cities");
$periods = getConstant("periods");
$types = getConstant("types");
$academic_years = getConstant("academic_years");
$companies = array();
$roles = array();
loopThrough(dosql("SELECT DISTINCT company FROM internship")->fetchAll(), "company", $companies);
loopThrough(dosql("SELECT DISTINCT role FROM internship")->fetchAll(), "role", $roles);
if (isset($_GET['s']) && $_GET['s'] == 1)
{
	if (!isset($_GET['q']))
	{
		$params = array();
		if (isset($_GET['role']) && checkExists($_GET['role'], $roles)) $params['role'] = checkExists($_GET['role'], $roles);
		if (isset($_GET['company']) && checkExists($_GET['company'], $companies)) $params['company'] = checkExists($_GET['company'], $companies);
		if (isset($_GET['field']) && checkExists($_GET['field'], $fields)) $params['field'] = checkExists($_GET['field'], $fields);
		if (isset($_GET['city']) && checkExists($_GET['city'], $cities)) $params['city'] = checkExists($_GET['city'], $cities);
		if (isset($_GET['period']) && checkExists($_GET['period'], $periods)) $params['period']= checkExists($_GET['period'], $periods);
		if (isset($_GET['type']) && checkExists($_GET['type'], $types)) $params['type'] = checkExists($_GET['type'], $types);
		if (isset($_GET['academic_year']) && checkExists($_GET['academic_year'], $academic_years)) $params['academic_year'] = checkExists($_GET['academic_year'], $academic_years);
		
		$stmt = mysql_select("internship", "AND" , $params, " LIKE ");
	}
	else	
	{
		$query = '%'.sanitizeField($_GET['q']).'%';
		$stmt = mysql_select("internship", "OR" , array("role" => $query, "company" => $query, 'field' => $query, 'city' => $query, 'description' => $query, 'type' => $query, 'period' => $query), " LIKE ");
	}
}
?>