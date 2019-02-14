<?php
	include_once("controllers/common.php");
	include_once("models/student.php");
	$id = safeGet("id", -1); 
	//if($id==0)  { //This would be a bug if you were trying to edit an ID that is 0, although storing 0 in an auto incremented value is bad practice. See SQL Mode: NO_AUTO_VALUE_ON_ZERO
	if (safeGet("name")) //necessary: if the browser does not comply with the required attribute, this will set an empty name.
	{
		if ($id==-1)
		{
			Student::add(safeGet("name"));
		}
		else
		{
			if ($id) //The user might submit an empty ID.
			{
				$student = Student::getData($id);
				$student->name = safeGet("name");
				$student->save();
			}
		}
	}
	header('Location: students.php');
?>