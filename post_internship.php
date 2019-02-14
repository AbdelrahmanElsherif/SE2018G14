<?php
$page_title = "Post Internship";
$pre_title = "Overview";
require_once('header.php'); 
?>
<?php require_once("errors.php"); ?>
<form method='POST'>
<?php  generateInput("Company");  generateSelect("Field", $fields); generateSelect("City", $cities);
generateSelect("Period", $periods); generateSelect("Type", $types);
generateSelect("Academic Year", $academic_years);
generateInput("Role", "text");
generateInput("Description", "textarea");
?>
<div class="text-center">
<input type='submit' class="btn btn-primary" value='Publish'></input>
  <p></br></p>
</div>
</form>
<?php require_once("footer.php"); ?>
