<php include ("database.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Registration System</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
  </head>
  <body>
    <div class="header">
      <h2>Register</h2>

     </div>
    <form method = "post" action="register1.php">
<?php include ('errors1.php'); ?>

      <div class="input-group">
        <label>Username</label>
        <input type="text" name="Username" value= "<?php echo $username;?>">
      </div>
      <div class="input-group">
        <label>Email</label>
        <input type="text" name="Email" value = "<?php echo $email; ?>">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="Password1">
      </div>
      <div class="input-group">
        <label>Confirm Password</label>
         <input type="password" name="Password2">
      </div>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Profile Picture</label>
<input type="file" name="fileToUpload" id="fileToUpload">
<!-- <input type="submit" value="Upload Image" name="submit"> -->
</form>
      <!-- <label>Profile Photo</label>
      <input type="image" name="image" >
    </div> -->
      <div class="input-group">
        <button type="submit" name="register" class="btn">Register</button>
      </div>
      <p>
        Already a member? <a href="login1.php">Sign in</a>
      </p>
    </form>

  </body>
</html>
