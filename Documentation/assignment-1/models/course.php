<?php
	include_once('database.php');

	class Course{
		function __construct($data) {
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}
		public static function getData($id)
		{
			$data = dosql("SELECT * FROM courses WHERE id=:id", array(":id" => $id))->fetch();
			if ($data)
			{
				return new Course($data);
			}
			else {
				return false;
			}
		}
		public static function add($name,$max_degree,$study_year) {
			dosql("INSERT INTO courses(name,max_degree,study_year) VALUES(:name,:max_degree,:study_year)", array(":name" => $name,":max_degree" => $max_degree, ":study_year" => $study_year));
		}
		
		public function delete() {
			dosql("DELETE FROM courses WHERE id = :id", array(":id" => $this->id));
		}

		public function save() {
			dosql("UPDATE courses SET name = :name, max_degree = :max_degree, study_year = :study_year WHERE id=:id", array(":name" => $this->name, ":max_degree" => $this->max_degree, ":study_year" => $this->study_year, ":id" => $this->id));
		}
		public static function all($keyword, $array = false) {
			$params = array(":keyword" => "%".str_replace(" ", "%", $keyword)."%");
			$query = "WHERE name LIKE :keyword";
			if (strpos($keyword, " ") !== false)
			{
				$params = array();
				$explode = explode(' ', $keyword);
				for ($i= 0; $i < count($explode); $i++)
				{
					if ($i == 0)
					{
						$query = "WHERE name LIKE :p".$i;
					}
					else
					{
						$query .= " OR name LIKE :p".$i;
					}
					$params[":p".$i] = "%".$explode[$i]."%";
				}
			}
			$stmt = dosql("SELECT * FROM courses " . $query, $params);
			while($row = $stmt->fetch()) {
				if (!$array)
				{
					$courses[] = new Course($row);
				}
				else
				{
					$courses[$row['id']] = $row;
				}
			}
			return $courses;
		}
	}
?>