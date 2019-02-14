<?php
	include_once("controllers/common.php");
	include_once("models/course.php");
	$id = safeGet("id", -1); 
	//if($id==0)  { //This would be a bug if you were trying to edit an ID that is 0, although storing 0 in an auto incremented value is bad practice. See SQL Mode: NO_AUTO_VALUE_ON_ZERO
	if (safeGet("name")) //necessary: if the browser does not comply with the required attribute, this will set an empty name.
	{
		if ($id==-1)
		{
			Course::add(safeGet("name"), safeGet("max_degree"), safeGet("study_year"));
		}
		else
		{
			if ($id) //The user might submit an empty ID.
			{
				$Course = Course::getData($id);
				$Course->name = safeGet("name");
				$Course->max_degree = safeGet("max_degree");
				$Course->study_year = safeGet("study_year");
				$Course->save();
			}
		}
	}
	header('Location: courses.php');
?>