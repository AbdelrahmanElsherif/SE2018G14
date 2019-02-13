<?php include ('common.php');
require_once("header.php");?>
<h1>List of your internships:</h1>
 <?php
 showSearch($internship_stmt, "application", "Manage");
 
 ?>
 
<h1>List of your applications:</h1>
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
      <th>Description</th>
      <th>Mobile Number</th>
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
		  print_r($row);
		  $row['description'] = nl2br($row['description']);
		  generateRow($row, ($row['status'] == -1)? array("<a href='#'>Retract</a>" : ''));
       }
	 echo '</tbody></table>';
 
 ?>
<?php require_once("footer.php"); ?>
