<?php include ('common.php');
require_once("header.php");
function processStatus($status)
{
	switch ($status)
	{
		case -1:
			return "Undecided";
		case 0:
			return "Rejected";
		case 1:
			return "Accepted";
	}
}

?>
<h3>List of your internships:</h3>
 <?php
 showSearch($internship_stmt, "application", "Manage");
 
 ?>
<br><br>
<h3>List of your applications:</h3>
 <?php
 	echo '
	    <table class="table">
	<thead>
      <th>Position</th>
      <th>Company</th>
      <th>Field</th>
      <th>City</th>
      <th>Period</th>
      <th>Type</th>
      <th>Academic Year</th>
      <th>Mobile</th>
      <th>Email?</th>
      <th>Status</th>
      <th></th>
	  </thead>
	  <tbody>';
	  while ($row = $application_stmt -> fetch()){
		  $id = $row['id'];
		  unset($row['id']);
		  unset($row['user_id']);
		  unset($row['internship_id']);
		  unset($row['cv']);
		  unset($row['description']);
		  $row['show_email'] = $row['show_email']? "Yes" : "No";
		  $row['status'] = processStatus($row['status']);
		  generateRow($row, ($row['status'] == "Undecided")? array("<a href='#'>Retract</a>") : array());
       }
	 echo '</tbody></table>';
 
 ?>
<?php require_once("footer.php"); ?>
