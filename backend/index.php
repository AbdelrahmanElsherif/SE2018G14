<?php 
require_once("functions.php");
$internships_count = dosql("SELECT COUNT(*) as count FROM internship")->fetch();
$internships_count = $internships_count['count'];
?>