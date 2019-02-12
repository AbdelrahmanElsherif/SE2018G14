<?php require_once('header.php'); ?>
<!--
<style>
 body {font-family: Arial, Helvetica, sans-serif; background-image: url(slide_one.jpg); font-size: 20px ;background-repeat:no-repeat;background-position: 50% 22% ; background-size: 100%; }
 </style>-->
<h1>Featured</h1>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" alt="Explore Internships">
  <div class="card-body">
    <h5 class="card-title">Explore</h5>
    <p class="card-text">Search through <?php echo $internships_count; ?> available internships.</p>
    <a href="search.php?q=" class="btn btn-primary">Show All</a>
  </div>
</div>

 
 <?php require_once("footer.php"); ?>
