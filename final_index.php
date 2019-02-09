<?php include ('common.php');
$css = array("css/style.css");
require_once("global_header.php");
?>

<style>
body {font-family: Arial, Helvetica, sans-serif; background-image: url(slide_one.jpg); font-size: 20px ;background-repeat:no-repeat;background-position: 50% 22% ; background-size: 100%; }
button {
  font-size: 15px;
  padding: auto;
  margin:  auto;
  border: none;
  background-color: inherit;
  cursor: pointer;
  width: 100%;
}
</style>

<p  style="margin-top: 20px; margin-left:5px;">Intern.com   <button onclick="index.php" style="width:15%; margin:2px;">Home</button>
<button onclick="#" style="width:15%; margin:2px;">Explore</button><button onclick="#" style="width:15%; margin:2px;">Post Internship</button><button onclick="post_internship.php" style="width:15%; margin:2px;">Manage Application</button></p>
<?php require_once("global_footer.php"); ?>
