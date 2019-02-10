<?php error_reporting(0); ?>

     <?php

    session_start();
    $search_bar ="";
    $period = "";
    $type = "";
    $field = "";
    $city= "";
    $academic_year = "";
    $errors = array();

    // try {
    //     $db = new PDO ("mysql:host=localhost;dbname=register", "root", "");
    // 
    //     echo "connected";
    // 
    // }
    //     catch(PDOException $e) {
    //         echo "error" .$e->getMessage();
    //     }


      if (isset($_POST['searchbtn'])) {
        $search_bar = $_POST['searchBar'];
        $period = $_POST['period'];
        $type = $_POST['type'];
        $field = $_POST['field'];
        $city= $_POST['city'];
        $academic_year= $_POST['Academic_Year'];
      // Empty Search Bar
      // if (empty($search_bar)){
      //     array_push($errors, "Invalid Search");
      //
      //
      // }


       $stmt = mysql_select("internship", "AND" , array(
         "$academic_Year" => "academic_year",
          "$period"=>"period",
          "$type"=>"type",
          "$field" => "field",
          "$city" => "city",
          "$title" => "search_bar"

       ));

       while ($row = $stmt -> fetchAll()){
         foreach ($rows as $row) {
        
         }
       }
}
    ?>
