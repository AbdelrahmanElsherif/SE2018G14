<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('./models/course.php');
	$id = safeGet('id');
	$course = Course::getData($id);
?>

    <h2 class="mt-4"><?php echo (($id)?"Edit":"Add"); ?> Course</h2>

    <form action="savecourse.php" method="post">
    	<?php if ($course) { ?> <input type="hidden" name="id" value="<?php echo $course->id; ?>" /> <?php } ?>
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="email" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input id="email" class="form-control" type="text" name="name"<?php if ($course) echo ' value="'.$course->name.'"';?> required>
						</div>
						
				</div>
				<div class="form-group row gutters">
					<label for="maxdegree" class="col-sm-2 col-form-label">Max Degree</label>
					<div class="col-sm-10">
						<input id="maxdegree" class="form-control" type="text" name="max_degree"<?php if ($course) echo ' value="'.$course->max_degree.'"';?> required>
					</div>
				</div>
				<div class="form-group row gutters">
					<label for="syear" class="col-sm-2 col-form-label">Study Year</label>
					<div class="col-sm-10">
						<input id="syear" class="form-control" type="text" name="study_year"<?php if ($course) echo ' value="'.$course->study_year.'"';?> required>
					</div>
					</div>
		    	<div class="form-group">
		    		<input class="btn btn-primary float-right" type="submit" value="<?php echo (($id)?"Edit":"Add"); ?>" />
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>