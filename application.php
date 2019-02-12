<?php include ('common.php');
$css = array("css/style.css");
require_once("header.php");
?>
  <table class="table">
    <thead>
      <th>ID</th>
	  <th>Name</th>
	  <th>Mobile</th>
	  <th>CV</th>
	  <th></th>
	  
    </thead>
	<tbody>
    <?php 
    foreach ($applications as $application) {
		$application['user_id'] = getUser($application['user_id'])['name'];
      generateRow($application);
    }
?>   
	</tbody>
  </table>
<?php require_once("footer.php"); ?>
