<?php
	include_once("models/student.php");
	include_once("models/grade.php");
	$status = 0;
	$student = Student::getData($_GET['id']);
	if ($student)
	{ 
		$grades = Grade::getData($student->id);
		foreach ($grades as $grade) $grade->delete();
		$status = 1; $student->delete(); unset($student);
	}
	//Check if it was sent via AJAX (to comply with browser compatability modifications in students.php):
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode(['status'=>$status]);
	}
	else
	{
		header("Location: " . (isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : "index.php"));
	}
?>