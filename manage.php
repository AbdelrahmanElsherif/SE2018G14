<?php include ('common.php');
require_once("header.php");
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
                      Your Internships
                    </h4>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <?php  showSearch($internship_stmt, "application", "Manage"); ?>
              </div>
            </div>

          </div>
</div>
<div class="row">
          <div class="col-12 col-xl-12">
            
            <!-- Goals -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Your Applications
                    </h4>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <?php  echo '
	    <table class="table table-sm card-table">
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
		  generateRow($row, ($row['status'] == "Undecided")? array("<form method='POST'><input type='submit' class='btn btn-danger' name='retract_".$id."' value='Retract'></form>") : array());
       }
	 echo '</tbody></table>'; ?>
              </div>
            </div>

          </div>
</div>
<?php require_once("footer.php"); ?>