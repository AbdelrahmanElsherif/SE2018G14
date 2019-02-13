<?php include ('common.php');
require_once("header.php");
require_once("backend/functions.php");
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
    while ($row = $stmt->fetch()) {
		$row['user_id'] = getUser($row['user_id'])['name'];
		$row[] = "<a href='download.php?id=".$row['id']."'>Download CV</a>";
		if ($row['status'] == -1) $row[] = "<input type='submit' name='accept_".$row['id']."' class='btn btn-success' value='Accept' /> <input type='submit' name='reject_".$row['id']."' class='btn btn-danger' value='Reject' />";
		generateRow($row);
    }
?>   
	</tbody>
  </table>
<?php require_once("footer.php"); ?>
