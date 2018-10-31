<?php
	include_once('database.php');
	class Grade{
		function __construct($data) {
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}
		public static function getById($id)
		{
			$data = dosql("SELECT * FROM grades WHERE id=:id", array(":id" => $id))->fetch();
			return $data? new Grade($data) : false;
		}
		public static function getData($student_id, $course_id = false, $array = false)
		{
			if ($course_id !== false)
			{
			$data = dosql("SELECT * FROM grades WHERE course_id=:course_id", array(":course_id" => $course_id));
			}
			else{
				$data = dosql("SELECT * FROM grades WHERE student_id=:student_id", array(":student_id" => $student_id));
			}
			$grades = array();
			while ($row = $data->fetch())
			{
				if ($array)
				{
					$grades[$row['course_id']] = $row;
				}
				else
				{
					$grades[] = new Grade($row);
				}
			}
			return $grades;
		}
		public static function add($student_id,$course_id,$degree,$examine_at) {
			dosql("INSERT INTO grades(student_id,course_id,degree,examine_at) VALUES(:student_id,:course_id,:degree,:examine_at)", array(":student_id" => $student_id,":course_id" => $course_id, ":degree" => $degree, ":examine_at" => $examine_at));
		}
		
		public static function deleteById($id) {
			dosql("DELETE FROM grades WHERE id = :id", array(":id" => $id));
		}
		public function delete() {
			dosql("DELETE FROM grades WHERE id = :id", array(":id" => $this->id));
		}

		public function save() {
			dosql("UPDATE grades SET degree = :degree WHERE id=:id", array(":degree" => $this->degree, ":id" => $this->id));
		}
	}
?>