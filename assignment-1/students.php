<?php 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/student.php');
	include_once('./models/grade.php');
	include_once('./models/course.php');
	$course_array = Course::all(safeGet("cq"), true);
	function displayGrades($grades)
	{
		global $course_array;
		foreach ($grades as $grade)
		{
			if (array_key_exists($grade['course_id'], $course_array))
			{
				echo "<b>".$course_array[$grade['course_id']]["name"]."</b>: ". $grade['degree']." / ".$course_array[$grade['course_id']]["max_degree"]."<br>";
			}
		}
	}
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Students</span>
          <form class="form-inline mt-2 mt-md-0 float-right">
            <input class="form-control mr-sm-2" type="text" name="cq" placeholder="Search" aria-label="Search" value="<?php echo safeGet('cq')?>">
            <input class="btn btn-success" type="submit" value="Search Courses" />
			<a href="editstudent.php" class="btn btn-primary" style="margin-left:5px">Add Student</a>
          </form>
	</div>

		  <br>
    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col">Grades</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$students = Student::all(safeGet('keywords')); //Pagination should be added to prevent high server load when there are numerous records in the database.
				
				//Using buttons as below is not necessary; can be replaced with an <a href> tag. Use JavaScript only when necessary; some older browsers might not support it and browser compatability is important for your website.
				foreach ($students as $student) {
			?>
    		<tr>
    			<td><?php echo $student->id; ?></td>
    			<td><?php echo $student->name; ?></td>
				<td><?php displayGrades(Grade::getData($student->id, false, true)); ?></td>
				
    			<td>
    				<a href="editstudent.php?id=<?php echo $student->id; ?>" class="btn btn-primary edit_student">Edit</a>
    				<a href="deletestudent.php?id=<?php echo $student->id; ?>" class="btn btn-danger delete_student" data-id="<?php echo $student->id; ?>">Delete</a>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.delete_student').click(function(e){
			e.preventDefault();
			if (confirm("Really delete this record?"))
			{
				var anchor = $(this);
				$.ajax({
					url: 'deletestudent.php',
					type: 'GET',
					dataType: 'json',
					data: {id: anchor.data('id')},
				})
				.done(function(reponse) {
					if(reponse.status==1 || reponse.status==0 ) { <?php //0 = this user no longer exists, so remove it. This could be the result of manually modifying the HTML data from the client's side, but we will assume good faith. ?>
						anchor.closest('tr').fadeOut('slow', function() {
							$(this).remove();
						});
					}
				})
				.fail(function() {
					alert("Connection error.");
				});
			}});
	});
</script>