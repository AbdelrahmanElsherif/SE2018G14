<?php
$page_title = "Management";
$pre_title = "Apply";
require_once("header.php");
?>
<div class="content container">
 <form method="POST" enctype="multipart/form-data">
 <?php include ('errors.php'); ?>
 <div class="col-md-6">
   <p>Company: <b><?php echo $internship['company']; ?></b></p>
   <p>Position: <b><?php echo $internship['role']; ?></b></p>
   <p>Academic Year: <b><?php echo $internship['academic_year']; ?></b></p>
   <p>City: <b><?php echo $internship['city']; ?></b></p>
   <p>Type: <b><?php echo $internship['type']; ?></b></p>
   <p>Period: <b><?php echo $internship['period']; ?></b></p>
  </div>
 <hr class="mt-4 mb-5"> 
 <div class="col-md-6">
   <?php
   generateInput("Mobile");
   generateInput("CV File", "file");
   ?>
   <hr class="mt-4 mb-5">
   <input type="hidden" name="internship_id" value="<?php echo $internship['id']; ?>"></input>
   </div>
   <input type="submit" class="btn btn-primary" value="Apply"></input>
 </form>

</div>
<?php require_once("footer.php"); ?>
