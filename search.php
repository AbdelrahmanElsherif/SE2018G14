<?php
require_once("header.php");
?>
<?php
require_once("common.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Search Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>


    <form action="" method="post">
      <?php include ('errors.php') ?>
      <input type="text" name="searchBar" placeholder="Search..." value="" maxlength="25" autocomplete="off" onmousedown="" onblur=""/></br>

  <label for="Filtering">Filters:</label>
          <div class="container">

      <label for="Period">Period:</label>
      <input type="radio" name="Period" value="Summer">Summer</>
      <input type="radio" name="Period" value="Winter">Winter</br>

          </div>
      <!-- <label for="Type">Type:</label> -->
      <div class="container">

    <label for="Type">Type:</label>
      <input type="radio" name="Type" value="Full-time">Full Time</>
      <input type="radio" name="Type" value="Part-time">Part Time</br>

  </div>
<div class="container">
  <label for="Fields">Fields</label>
  <select class="container" name="Fields">

      <option value="Mechanical Power Engineering" name="field">Mechanical Power Engineering</option>
      <option value="Computer Engineering" name="field">Computer Engineering</option>
      <option value="Electrical Power Engineering" name="field">Electrical Power Engineering</option>
      <option value="Communication Systems Engineering" name="field">Communication Systems Engineering</option>
      <option value="Civil Engineering" name="field">Civil Engineering</option>
      <option value="Architectural Engineering" name="field">Architectural Engineering</option>
      <option value="Marketing" name="field">Marketing</option>
      <option value="Sales" name="field">Sales</option>
      <option value="Accounting" name="field">Accounting</option>
      <option value="Advertisement" name="field">Advertisement</option>
      <option value="Neurology" name="field">Neurology</option>
      <option value="Immunology" name="field">Immunology</option>
      <option value="Dermatology" name="field">Dermatology</option>
      <option value="Cardiology" name="field">Cardiology</option>
      <option value="Pharmaceutical" name="field">Pharmaceutical</option>
      <option value="Sports" name="field">Sports</option>
      <option value="Miscellaneous" name="field">Miscellaneous</option>

</select>

</div>
<div class="container">
  <label for="City">City</label>
  <select class="container" name="city">
    <option value="Cairo" name ="city">Cairo</option>
    <option value="Alexandria" name ="city">Alexandria</option>
    <option value="Gizeh" name ="city">Gizeh</option>
    <option value="Shubra El-Kheima" name ="city">Shubra El-Kheima</option>
    <option value="Port Said" name ="city">Port Said</option>
    <option value="Suez" name ="city">Suez</option>
    <option value="Luxor" name ="city">Luxor</option>
    <option value="al-Mansura" name ="city">al-Mansura</option>
    <option value="El-Mahalla El-Kubra" name ="city">El-Mahalla El-Kubra</option>
    <option value="Tanta" name ="city">Tanta</option>
    <option value="Asyut" name ="city">Asyut</option>
    <option value="Ismailia" name ="city">Ismailia</option>
    <option value="Fayyum" name ="city">Fayyum</option>
    <option value="Zagazig" name ="city">Zagazig</option>
    <option value="Aswan" name ="city">Aswan</option>
    <option value="Damietta" name ="city">Damietta</option>
    <option value="Damanhur" name ="city">Damanhur</option>
    <option value="al-Minya" name ="city">al-Minya</option>
    <option value="Beni Suef" name ="city">Beni Suef</option>
    <option value="Qena" name ="city">Qena</option>
    <option value="Sohag" name ="city">Sohag</option>
    <option value="Hurghada" name ="city">Hurghada</option>
    <option value="10th of October City" name ="city">10th of October City</option>
    <option value="Shibin El Kom" name ="city">Shibin El Kom</option>
    <option value="Banha" name ="city">Banha</option>
    <option value="Kafr el-Sheikh" name ="city">Kafr el-Sheikh</option>
    <option value="Arish" name ="city">Arish</option>
    <option value="Mallawi" name ="city">Mallawi</option>
    <option value="Bilbais" name ="city">Bilbais</option>
    <option value="Marsa Matruh" name ="city">Marsa Matruh</option>
    <option value="Idfu" name ="city">Idfu</option>
    <option value="Mit Ghamr" name ="city">Mit Ghamr</option>
    <option value="Al-Hamidiyya" name ="city">Al-Hamidiyya</option>
    <option value="Desouk" name ="city">Desouk</option>
    <option value="Qalyub" name ="city">Qalyub</option>
    <option value="Abu Kabir" name ="city">Abu Kabir</option>
    <option value="Kafr el-Dawwar" name ="city">Kafr el-Dawwar</option>
    <option value="Girga" name ="city">Girga</option>
    <option value="Akhmim" name ="city">Akhmim</option>
    <option value="Matareya" name ="city">Matareya</option>

  </select>

</div>
<div class="container">
  <label for="Academic_Year">Academic Year</label>
  <select class="container" name="Academic_Year">
    <option value="1" name= "Academic_Year">1</option>
    <option value="2" name= "Academic_Year">2</option>
    <option value="3" name= "Academic_Year">3</option>
    <option value="4" name= "Academic_Year">4</option>
    <option value="5" name= "Academic_Year">5</option>
    <option value="6" name= "Academic_Year">6</option>
    <option value="7" name= "Academic_Year">7</option>
  </select>

</div>

      <input type="submit" name="searchbtn" value="Search!"/>


    </form>
  </body>
</html>
<?php
session_start();
$search_bar ="";
$period = "";
$type = "";
$field = "";
$city= "";
$academic_year = "";
$errors = array();
if (isset($_POST['searchbtn'])) {
  $search_bar = $_POST['searchBar'];
  $period = $_POST['period'];
  $type = $_POST['type'];
  $field = $_POST['field'];
  $city= $_POST['city'];
  $academic_year= $_POST['Academic_Year'];
// Empty Search Bar
if (empty($search_bar)){
    array_push($errors, "Invalid Search");
  }
 
}
?>
 <?php
 require_once("footer.php");
?>
