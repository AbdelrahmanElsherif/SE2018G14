<?php
require_once("functions.php");

$internship = false;
if (isset($_GET['internship_id']))
$internship = getInternship($_GET['internship_id'], $_SESSION['user']['id']);
if ($internship)
{
	$stmt = mysql_select("application","AND",array("internship_id"=> intval($_GET['internship_id'])), "=", "id,user_id,mobile,status");
	if ($_POST)
	{
		while ($row = $stmt->fetch())
		{
		   $status = $row['status'];
		   if (isset($_POST['accept_'.$row['id']]))
		   {
			   $status = 1;
		   }
		   else if (isset($_POST['reject_'.$row['id']]))
		   {
			   $status = 0;
		   }
		   if ($status != $row['status'])
		   {
				dosql("UPDATE application SET status=:status WHERE id=:id AND status=:status2", array(":status2" => -1, ":status"=> $status,"id"=>$row['id']));
				sendNotification($row['user_id'], "Your application for <b>".$internship['role']."</b> at <b>".$internship['company']."</b> has been ". strtolower(processStatus($status)), "manage.php");
		   }
		}
		$stmt->execute();
	}
}
else
{
	header("Location: manage.php");
	exit();
}
?>