<?php include ('common.php'); 
$css = array("css/style.css");
require_once("header.php");	
?>
    <div class="header">
      <h2>Login</h2>

    </div>
    <form method = "post" action="login.php">
      <?php include ('errors.php') ?>
      <div class="input-group">
        <label>Username/Email</label>
        <input type="text" name="email" placeholder= "Enter Email" value = "<?php echo (isset($_POST['email'])? $_POST['email'] : ""); ?>">
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password">
      </div>
      <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
      </div>
      <p>
      Not yet a member? <a href="register.php">Sign Up</a>
      </p>
    </form>

<?php require_once("footer.php"); ?>