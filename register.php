<?php include ("common.php");
$css = array("css/style.css");
require_once("header.php");?>
    <div class="header">
      <h2>Register</h2>

     </div>
    <form method = "post" action="register.php">
<?php include ('errors.php'); ?>

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
	  
      <div class="input-group">
        <input type="submit" name="register" class="btn" value="Register"></input>
      </div>
      <!-- <label>Profile Photo</label>
      <input type="image" name="image" >
    </div> -->
      <p>
        Already a member? <a href="login.php">Sign in</a>
      </p>
    </form>
<?php require_once("footer.php"); ?>