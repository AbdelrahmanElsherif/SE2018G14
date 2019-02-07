<?php
$required_fields = array("title", "company", "field", "city", "period", "type", "academic_year", "role", "description");

function getName($name)
{
	return str_replace("_", " ", $name);
}
$fields = array("Mechanical Power Engineering",
"Computer Engineering",
"Electrical Power Engineering",
"Communication Systems Engineering",
"Civil Engineering",
"Architectural Engineering",
"Marketing",
"Sales",
"Accounting",
"Advertisement",
"Pharmaceutical",
"Cardiology",
"Dermatology",
"Immunology",
"Neurology",
"Sports",
"Miscellaneous");
$cities = array("Cairo",
"Alexandria",
"Gizeh",
"Shubra El-Kheima",
"Port Said",
"Suez",
"Luxor",
"al-Mansura",
"El-Mahalla El-Kubra",
"Tanta",
"Asyut",
"Ismailia",
"Fayyum",
"Zagazig",
"Aswan",
"Damietta",
"Damanhur",
"al-Minya",
"Beni Suef",
"Qena",
"Sohag",
"Hurghada",
"th of October City",
"Shibin El Kom",
"Banha",
"Kafr el-Sheikh",
"Arish",
"Mallawi",
"10th of Ramadan City",
"Bilbais",
"Marsa Matruh",
"Idfu",
"Mit Ghamr",
"Al-Hamidiyya",
"Desouk",
"Qalyub",
"Abu Kabir",
"Kafr el-Dawwar",
"Girga",
"Akhmim",
"Matareya");
$periods = array("Not Specified", "Summer Internship", "Winter Internship");
$types = array("Full-time", "Part-time");
$academic_years = array(1,2,3,4,5,6,7);
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
	foreach ($required_fields as $field) { if (!isset($POST[$field])) { $errors[] = "'".ucfirst($field)."' is a required field, but it was left blank.";} } 
	
	$field = checkExists($_POST['field'], $fields);
	$city = checkExists($_POST['city'], $cities);
	$period = checkExists($_POST['periods'], $periods);
	$type = checkExists($_POST['type'], $types);
	$academic_year = checkExists($_POST['field'], $academic_years);
	
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
	}
	else
	{
		$errors[] = "Malformed request. Please try again.";
	}
}
?>