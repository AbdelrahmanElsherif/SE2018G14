<?php
$page_title = "Management";
$pre_title = "Apply";
require_once("header.php");
?>
<div class="content container">
 <?php include ('errors.php'); ?>
 <div class="col-md-12">
  <div class="col-md-4 offset-md-3">
   <p>Company: <b><?php echo $internship['company']; ?></b></p>
   <p>Position: <b><?php echo $internship['role']; ?></b></p>
   <p>Academic Year: <b><?php echo $internship['academic_year']; ?></b></p>
 </div>
 <div class="col-md-3">
   <p>City: <b><?php echo $internship['city']; ?></b></p>
   <p>Type: <b><?php echo $internship['type']; ?></b></p>
   <p>Period: <b><?php echo $internship['period']; ?></b></p>
  </div>
  <div class="col-md-12">
 <hr class="mt-4 mb-5"> 
 <form method="POST" enctype="multipart/form-data">
   <?php
   generateInput("Mobile");
   generateInput("CV File", "file");
   ?>
   <hr class="mt-4 mb-5">
   <input type="hidden" name="internship_id" value="<?php echo $internship['id']; ?>"></input>
   <div class="text-center">
   <input type="submit" class="btn btn-primary" value="Apply"></input>
   </div>
    </form>
   </div>

</div>
<?php require_once("footer.php"); ?>
