<?php
require_once("common.php");
function application ($id)
{
$applications = mysql_select("application","AND",array("internship_id"=>$id, "status" => "-1"), "=", "id,user_id,mobile");
return $applications->fetchAll();
}



if($_POST)
{
  if(isset($_POST['status']) && isset($_POST['application_id']))
  {
    dosql("UPDATE internships SET status=:status WHERE id=:id",
    array("status"=> $_POST['status'],"id"=>$POST['application_id']));
  }

}
$applications=application($_GET['internship_id']);

 ?>
