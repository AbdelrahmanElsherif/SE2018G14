<?php
require_once("functions.php");
$internship_stmt = mysql_select("internship", "", array("user_id" => $_SESSION['user']['id']));
$application_stmt = dosql("SELECT * FROM internship INNER JOIN application ON application.user_id=:user_id AND internship.id=application.internship_id", array(":user_id" => $_SESSION['user']['id'])); //bad performance, we will figure something out later
if ($_POST)
{
	while ($row = $application_stmt->fetch())
	{
		if (isset($_POST['retract_'.$row['id']]))
		{
		   dosql("DELETE FROM application WHERE id=:id and user_id=:user_id", array(":id" => $row['id'], ":user_id" => $_SESSION['user']['id']));
		}
	}
	$application_stmt->execute();
}
?>