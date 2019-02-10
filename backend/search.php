<?php
require_once("header.php");
?>
<?php
require_once("common.php");
?>
<?php error_reporting(0); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Search Results</title>
  </head>
  <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     }
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
  <body>
    <body>

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
      header ('location: search_results.php');
      ?>
     <table>
     <tr>
      <th>Title</th>
      <th>Company</th>
      <th>Field</th>
      <th>City</th>
      <th>Period</th>
      <th>Academic Year</th>
      <th>Type</th>
      <th>Role</th>
      <th>Description</th>
      <th>Deadline</th>
     </tr>
     <?php
    $conn = mysqli_connect("localhost", "internship", "qBCx6Q83aa3wY3ZMaSxM", "internship");
      // Check connection
      if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
      }
      // $sql = "mysql_select("internship", "AND" , array (
      //             "period" => $period,
      //             "title" => $search_bar,
      //             "type" => $type,
      //             "field" => $field,
      //             "city" => $city,
      $sql="SELECT * from internship where period = $period And type = $type And field = $field And city = $city And academic_year = $academic_year";
      //           $statement=$db->prepare($sql);
      //           $statement->execute([$period , $type, $field, $city, $academic_year]);
          //  $sql = "SELECT from internship where "
      $result = $conn->query($sql);
      $conn->close();

    ?>
    </table>
    </body>
    </html>

  </body>
</html>
<?php
require_once("common.php");
?>
