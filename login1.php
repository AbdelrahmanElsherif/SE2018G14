<?php include ('database.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Registration System</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
  </head>
  <body>
    <div class="header">
      <h2>Login</h2>

    </div>
    <form method = "post" action="login1.php">
      <?php include ('errors1.php') ?>
      <div class="input-group">
        <label>Email</label>
        <input type="text" name="Email" placeholder= "Enter Email" value = "<?php echo $email; ?>">
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password">
      </div>
      <label>
          <input type="checkbox" checked="checked" name="remember_me"
                 style="color:dodgerblue"> Remember me
      </label>
      <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
      </div>
      <?php
if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('Username', $login, $hour);
                         setcookie('password', $password, $hour);
                    }
?>
      <p>
      Not yet a member? <a href="register1.php">Sign Up</a>
      </p>
    </form>

  </body>
</html>
