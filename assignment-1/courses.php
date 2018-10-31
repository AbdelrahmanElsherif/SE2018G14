<?php 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/course.php');
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Courses</span>
		<a href="editcourse.php" class="btn btn-primary float-right">Add Course</a>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col">Max Degree</th>
	      		<th scope="col">Study Year</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$courses = Course::all(safeGet('keywords')); //Pagination should be added to prevent high server load when there are numerous records in the database.
				
				//Using buttons as below is not necessary; can be replaced with an <a href> tag. Use JavaScript only when necessary; some older browsers might not support it and browser compatability is important for your website.
				foreach ($courses as $course) {
			?>
    		<tr>
    			<td><?php echo $course->id; ?></td>
    			<td><?php echo $course->name; ?></td>
    			<td><?php echo $course->max_degree; ?></td>
    			<td><?php echo $course->study_year; ?></td>
    			<td>
    				<a href="editcourse.php?id=<?php echo $course->id; ?>" class="btn btn-primary">Edit</a>
    				<a href="deletecourse.php?id=<?php echo $course->id; ?>" class="btn btn-danger delete_course" data-id="<?php echo $course->id; ?>">Delete</a>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
			
		$('.delete_course').click(function(e){
			if (confirm("Really delete this record?"))
			{
			e.preventDefault();
			var anchor = $(this);
			$.ajax({
				url: 'deletecourse.php',
				type: 'GET',
				dataType: 'json',
				data: {id: anchor.data('id')},
			})
			.done(function(reponse) {
				if(reponse.status==1 || reponse.status==0 ) {
					anchor.closest('tr').fadeOut('slow', function() {
						$(this).remove();
					});
				}
			})
			.fail(function() {
				alert("Connection error.");
			});
			}
		});
	});
</script>