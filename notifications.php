<?php
$page_title = "Notifications";
$pre_title = "Overview";
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
                      Notifications
                    </h4>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
              
<table class="table table-sm card-table">
	<thead>
      <th>Notification</th>
      <th></th>
	  </thead>
	  <tbody> <?php  while ($row = $stmt->fetch())
				{
					$row['time'] = hTime($row['time']);
					generateRow($row);
				}
				?>
				</tbody>
				</table>
              </div>
            </div>

          </div>
</div>
<?php

require_once("footer.php");
?>