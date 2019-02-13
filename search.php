<?php
require_once("header.php");
if (!isset($_GET['s']) || $_GET['s'] != 1)
{
?>
<form method="get">
      <?php include ('errors.php') ?>
      <h2>Advanced Filtering (optional):</h2>
	  <?php
	  generateSelect("Company", $companies);
	  generateSelect("Role", $roles);
		  generateSelect("Field", $fields); generateSelect("City", $cities);
generateSelect("Period", $periods); generateSelect("Type", $types);
generateSelect("Academic Year", $academic_years);?>
<input type="submit" class="btn btn-primary" value="Search"/>
<p></br></p>
<input type="hidden" name="s" value="1" /> 
    </form>
 <?php
}
else
{
	?>
	<h2>Search Results</h2>
	
	<?php
	showSearch($stmt);
}
 require_once("footer.php");
?>
