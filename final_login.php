<?php include ('common.php');
$css = array("css/style.css");
require_once("global_header.php");
?>
<style>
body {font-family: Arial, Helvetica, sans-serif; background-image: url(slide_one.jpg); background-repeat:no-repeat;background-position: 50% 22% ; background-size: 100%; }
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
/* Set a style for all buttons */
button {
  background-color: green;
  font-size: 20px;
  color: white;
  padding: 10px 10px;
  margin: 4px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button:hover {
  opacity: 0.8;
}
/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}
.container {
  padding: 16px;
}
span.psw {
  float: right;
  padding-top: 16px;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}
/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}
/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}
/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}
@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
/*registeration styling*/
/* Add padding to containers */
.containerR {
  padding: 16px;
  background-color: white;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.registerbtn:hover {
  opacity: 1;
}
/* Add a blue text color to links */
a {
  color: dodgerblue;
}
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</br>

<button onclick="document.getElementById('id01').style.display='block'" style="width:10%; margin:8px;">Login</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:10%; margin:8px;">Register</button>
<div id="id01" class="modal">

  <form class="modal-content animate" method ="post" action="login.php">

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
  <form class="modal-content animate" method ="post" action="register.php">

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
