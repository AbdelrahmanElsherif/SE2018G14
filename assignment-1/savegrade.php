<?php
	include_once("controllers/common.php");
	include_once("models/grade.php");
	$id = safeGet("student_id", -1); 
	include_once('./models/course.php');
	if (safeGet("student_id"))
	{
		$course_array = Course::all("", true);
		$grades = Grade::getData(safeGet("student_id"), false, true);
		foreach ($course_array as $cid => $course)
		{
			if (safeGet("course_".$cid))
			{
				if ($grades[$cid]['degree'] != safeGet("course_".$cid))
				{
					$examine_at = safeGet("examine_at_".$cid);
					$grade = isset($grades[$cid])? Grade::getById($grades[$cid]['id']) : false;
					if ($grade)
					{
						$grade->degree = (floatval(safeGet("course_".$cid)) > floatval($course['max_degree']))? floatval($course['max_degree']) : floatval(safeGet("course_".$cid));
						$grade->examine_at = safeGet("examine_at_".$cid)? date("Y-m-d", strtotime(safeGet("examine_at_".$cid))) : date("Y-m-d");
						$grade->save();
					}
					else
					{
						Grade::add(safeGet("student_id"), $cid, floatval(safeGet("course_".$cid)), date("Y-m-d"));
					}
				}
			}
			else
			{
				if (isset($grades[$cid]['id']))
				Grade::deleteById($grades[$cid]['id']);
			}
		}
	}
	header('Location: students.php');
?>