<?php 
$fields = getConstant("fields");
$cities = getConstant("cities");
$periods = getConstant("periods");
$types = getConstant("types");
$academic_years = getConstant("academic_years");

if ($_POST && isset($_POST['q']) && $_POST['q'])
{
	$errors = checkRequiredFields($required_fields, $_POST);
	if (!$errors)
	{
		$field = checkExists($_POST['field'], $fields);
		$city = checkExists($_POST['city'], $cities);
		$period = checkExists($_POST['period'], $periods);
		$type = checkExists($_POST['type'], $types);
		$academic_year = checkExists($_POST['academic_year'], $academic_years);
		$params = array("role" => htmlentities(strip_tags("%".$_POST['q']."%")),
		"company" => htmlentities(strip_tags("%".$_POST['q']."%")));
		
		if ($field) $params['field'] = $field;
		if ($city) $params['city'] = $city;
		if ($period) $params['period'] = $period;
		if ($type) $params['type'] = $type;
		if ($academic_year) $params['academic_year'] = $academic_year;

		$stmt = mysql_select("internship", "AND" , $params, "LIKE");

       while ($row = $stmt -> fetch()){
         foreach ($rows as $row) {
        
         }
       }
	}
}
    ?>