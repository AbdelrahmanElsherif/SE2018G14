<?php include ('common.php'); 
$css = array("css/style.css", "css/homepage.css");
require_once("global_header.php");	
?>


<button onclick="document.getElementById('id01').style.display='block'" style="width:10%; margin:8px;">Login</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:10%; margin:8px;">Register</button>
<div id="id01" class="modal">

  <form class="modal-content animate" method ="post" action="login_test.php">

<?php include ('errors.php') ?>
    <div class="container">
      <label for="email"><b>Username/Email</b></label>
      <input type="text" placeholder="Enter Username" name="email" placeholder= "Enter Email"  value = "<?php echo (isset($_POST['email'])? $_POST['email'] : ""); ?>">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password">

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  <form class="modal-content animate" method ="post" action="register_test.php">

  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="Username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Username" value= "<?php echo $username;?>">

    <label for = "Email">Email</label>
    <input type="text" placeholder ="Enter Email" name="Email" value = "<?php echo $email; ?>">

    <label for="Password1"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password1">


    <label for="Password2"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="Password2">

    <hr>
    <button type="submit" class="registerbtn">Register</button>
  </div>


  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
  </div>

  </form>
</div>
</br>
<h1  style="text-align: center; margin-top: 180px; font-size: 70px;">Intern.com</h1>
<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php require_once("global_footer.php"); ?>
