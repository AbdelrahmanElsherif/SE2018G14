<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('./models/student.php');
	$id = safeGet('id');
	$student = Student::getData($id);
?>

    <h2 class="mt-4"><?php echo (($student)?"Edit":"Add"); ?> Student</h2>

    <form action="savestudent.php" method="post">
    	<?php if ($student) { ?> <input type="hidden" name="id" value="<?php echo $student->id; ?>" /> <?php } ?>
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="name" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input id="name" class="form-control" type="text" name="name"<?php if ($student) echo ' value="'.$student->name.'"';?> required>
					</div>
				</div>
		    	<div class="form-group">
		    		<input class="btn btn-primary float-right" type="submit" value="<?php echo (($student)?"Edit":"Add"); ?>" />
		    	</div>
		    </div>
		</div>
    </form>
	
	<?php
	if ($student)
	{
		
	include_once('./models/course.php');
	include_once('./models/grade.php');
	
	$course_array = Course::all("", true);
	$grades = Grade::getData($student->id,false, true);
		?>
<h2 class="mt-4">Edit Grades</h2>

    <form action="savegrade.php" method="post">
    	<input type="hidden" name="student_id" value="<?php echo $student->id; ?>" />
		<div class="card">
			<div class="card-body">
				
				<?php 
				foreach ($course_array as $cid => $course)
				{
					echo '<div class="form-group row gutters">
						<label for="course_'.$cid.'" class="col-sm-2 col-form-label">'.$course['name'].' ('.$course['max_degree'].')</label>
						<div class="col-sm-7">
							<input id="course_'.$cid.'" class="form-control" type="text" value="'.(isset($grades[$course['id']])? $grades[$course['id']]['degree'] : "").'" name="course_'.$cid.'">
						</div>
						<div class="col-sm-3">
							<input id="examine_at_'.$cid.'" class="form-control" type="text" value="'.(isset($grades[$course['id']])? $grades[$course['id']]['examine_at'] : date("Y-m-d")).'" name="examine_at_'.$cid.'">
						</div>
					</div>';
				}
				?>
		    	<div class="form-group">
		    		<input class="btn btn-primary float-right" type="submit" value="<?php echo (($id)?"Edit":"Add"); ?>" />
		    	</div>
		    </div>
		</div>
    </form>
	<?php } include_once('./components/tail.php') ?>