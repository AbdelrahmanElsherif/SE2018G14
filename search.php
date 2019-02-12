<?php
require_once("header.php");
if (!isset($_GET['q']))
{
?>
<form method="get">
      <?php include ('errors.php') ?>
      <input type="text" name="q" placeholder="Search..." class="form-control" value="" maxlength="25" autocomplete="off" onmousedown="" onblur=""/></br>
	  <h2>Advanced Filtering (optional):</h2>
	  <?php
		  generateSelect("Field", $fields); generateSelect("City", $cities);
generateSelect("Period", $periods); generateSelect("Type", $types);
generateSelect("Academic Year", $academic_years);?>
<input type="submit" class="btn btn-primary" value="Search"/>
    </form>
 <?php
}
else
{
	?>
	<h2>Search Results</h2>
    <table class="table">
	<thead>
      <th>Position</th>
      <th>Company</th>
      <th>City</th>
      <th>Period</th>
      <th>Field</th>
      <th>Description</th>
	  </thead>
	  <tbody>
	  <?php
	  while ($row = $stmt -> fetch()){
		  unset($row['id']);
		  unset($row['user_id']);
        generateRow($row);
       }
	  ?>
	  </tbody>
    </table>
	<?php
}
 require_once("footer.php");
?>