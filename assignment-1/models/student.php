<?php
	include_once('database.php');

	class Student{
		function __construct($data) {
			// $sql = "SELECT * FROM students WHERE id = $id;"; //Very bad practice. Arguments should be prepared and not passed directly, especially if the argument was a user's input, which would make SQL injections against your database easier. Moreover, prepared statements are cached, which helps improve performance when reused. See example below
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}
		public static function getData($id)
		{
			$data = dosql("SELECT * FROM students WHERE id=:id", array(":id" => $id))->fetch();
			if ($data)
			{
				return new Student($data);
			}
			else {
				return false;
			}
		}
		public static function add($name) {
			dosql("INSERT INTO students(name) VALUES(:name)", array(":name" => $name));
		}
		
		public function delete() {
			// $sql = "DELETE FROM students WHERE id = $this->id;"; //same as above
			dosql("DELETE FROM students WHERE id = :id", array(":id" => $this->id));
		}

		public function save() {
			dosql("UPDATE students SET name = :name WHERE id=:id", array(":name" => $this->name, ":id" => $this->id));
		}

		public static function all($keyword) {
			$keyword = '%'.str_replace(" ", "%", $keyword).'%';
			//$sql = "SELECT * FROM students WHERE name like ('%$keyword%');"; //same as above
			$stmt = dosql("SELECT * FROM students WHERE name LIKE :keyword", array(":keyword" => $keyword));
			while($row = $stmt->fetch()) {
				//$students[] = new Student($row['id']); //Bad practice. Will execute SQL unnecesasry statements
				$students[] = new Student($row); //Replaced constructor and added above getData function to overcome the above issue.
			}
			return $students;
		}
	}
?>