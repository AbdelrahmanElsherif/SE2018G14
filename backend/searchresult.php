<?php
require_once("header.php");
?>
<?php
require_once("common.php");
?>
<?php
require_once("search.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["title"]. "</td><td>" . $row["company"]. "</td><td>" . $row["field"]. "</td></tr>" . $row["city"]. "</td><td>" . $row["period"]. "</td><td>" . $row["academic_year"] . "</td><td>"
      . $row["type"] . "</td><td>"
    . $row["role"] . "</td><td>" . $row["description"] . "</td><td>" . $row["deadline"] . "</td><td>";
    }
    echo "</table>";
    } else { echo "0 results"; }
    ?>
  </body>
</html>
<?php
require_once("footer.php");
?>
