<?php
$css = array("css/style.css");
require_once('header.php'); 
?>
<h2>Post Internship</h2>
<?php require_once("errors.php"); ?>
<form method='POST'>
<?php generateInput("Title"); generateInput("Company");  generateSelect("Field", $fields); generateSelect("City", $cities);
generateSelect("Period", $periods); generateSelect("Type", $types);
generateSelect("Academic Year", $academic_years);
generateInput("Role", "text");
generateInput("Description", "textarea");
?>
<div class="text-center">
<input type='submit' class="btn btn-primary" value='Publish'></input>
</div>
</form>
<?php require_once("footer.php"); ?>
