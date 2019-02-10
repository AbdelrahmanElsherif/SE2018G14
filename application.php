<?php 
$css = array("css/application.css");
require_once("header.php");
echo "<h1>$title</h1>"; ?>
  <table>
    <tr>
      <th>List of applications</th> <th>Accepted</th> <th>Rejected</th>
    </tr>
    <?php 
    foreach ($applications as $application) {
      
      echo "<tr>
        <td>".$application['mobile']." <input type='submit' name='' value='Accept'> <input type='submit' name='' value='Reject'></td>
      </tr>";
    }
?>   
  </table>
<?php require_once("footer.php"); ?>
