<?php require_once('header.php'); ?>
<?php
<link rel="stylesheet" href="application_management_page.css">
  echo"<h1>$title</h1>";
  <table>
    <tr>
      <th>List of applications</th> <th>Accepted</th> <th>Rejected</th>
    </tr>
    foreach ($applications as $application) {
      <tr>
        <td>$application <input type="submit" name="" value="Accept"> <input type="submit" name="" value="Reject"> </td>
      </tr>
    }
  </table>
?>
<?php require_once("footer.php"); ?>
