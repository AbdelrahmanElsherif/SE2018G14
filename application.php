<?php include ('common.php');
$page_title = "Management";
$pre_title = "Manage Internship";
require_once("header.php");
require_once("backend/functions.php");
?>
<div class="row">
          <div class="col-12 col-xl-12">
            
            <!-- Goals -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Applications
                    </h4>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                
<table class="table table-sm card-table">
    <thead>
      <th>ID</th>
	  <th>Name</th>
	  <th>Mobile</th>
	  <th>Email</th>
	  <th>CV</th>
	  <th></th>
	  
    </thead>
	<tbody>
    <?php 
    while ($row = $stmt->fetch()) {
		$row['user_id'] = getUser($row['user_id'])['name'];
		$row[] = "<a href='download.php?id=".$row['id']."'>Download CV</a>";
		if ($row['status'] == -1) { $row[] = "<form method='POST' action='application.php?internship_id=".intval($_GET['internship_id'])."'><input type='submit' name='accept_".$row['id']."' class='btn btn-success btn-sm' value='Accept' /> <input type='submit' name='reject_".$row['id']."' class='btn btn-danger btn-sm' value='Reject' /></form>"; } else { $row[] = processStatus($row['status']); } 
		unset($row['status']);
		$row['show_email'] = $row['show_email']? getEmail($row['user_id']) : "N/A";
		generateRow($row);
    }
?>   
	</tbody>
  </table>
<?php require_once("footer.php"); ?>
