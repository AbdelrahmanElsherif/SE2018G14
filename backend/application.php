<?php
require_once("common.php");
if($_POST)
{
  if(isset($_POST['status']) && isset($_POST['application_id']))
  {
    dosql("UPDATE internships SET status=:status WHERE id=:id",
    array("status"=> $_POST['status'],"id"=>$POST['application_id']));
  }

}
$internship = false;
if (isset($_GET['internship_id']))
$internship = getInternship($_GET['internship_id'], $_SESSION['user']['id']);
if ($internship)
{
	$stmt = mysql_select("application","AND",array("internship_id"=> intval($_GET['internship_id']), "status" => "-1"), "=", "id,user_id,mobile");
}
else
{
	header("Location: manage.php");
	exit();
}
?>