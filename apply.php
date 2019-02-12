<?php include ('common.php');
$css = array("css/style.css");
require_once("header.php");
?>


<!--
<style>
 body { background-image: url(slide_one.jpg) ;background-repeat:no-repeat;background-position: 50% 22% ;  background-size: 100%; }

 .container {
   padding: 20px;
 }
 input[type=text], input[type=file] {
   width: 100%;
   padding: 15px;
   margin: 5px 0 22px 0;
   display: inline-block;
   border: none;
   background: #f1f1f1;
 }

 input[type=text]:focus, input[type=file]:focus {
   background-color: #ddd;
   outline: none;
 }
 button {
   background-color:rgb(108,117,125);
   font-size: 20px;
   color: black;
   padding: 10px 10px;
   margin: 4px 0;
   border: none;
   cursor: pointer;
   width: 100%;
 }
 .submitbtn {
   background-color: rgb(108,117,125);
   color: white;
   padding: 16px 20px;
   margin: 8px 0;
   border: none;
   cursor: pointer;
   width: 50%;

   right: 100%;
   margin-left: 50%;
 }
  </style>
  -->
 </br>
</br>
<div class="content container">
 <h3 class="text-center">Application for: <?php echo $internship['role']; ?></h3>
 <form method="POST">
   <?php include ('errors.php');
   generateInput("Mobile");
   generateInput("CV", "file");
   ?>
   <input type="submit" class="btn btn-primary" 
 </form>

</div>
<?php require_once("footer.php"); ?>
