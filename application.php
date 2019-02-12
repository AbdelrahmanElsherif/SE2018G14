<?php include ('common.php');
$css = array("css/style.css");
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
      generateRow($row, "<a href='download.php?id=".$row['id']."'>Download CV</a>");
    }
?>   
	</tbody>
  </table>
<?php require_once("footer.php"); ?>
