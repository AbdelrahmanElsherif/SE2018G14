<?php
$username ="";
$email = "";
$errors = array();
function register($username, $email, $password)
{
	$users = mysql_select("user", "OR", array("username" => $username, "email" => $email))->fetch();
	if (!$users)
	{
		$password = password_hash($password, PASSWORD_DEFAULT);
		mysql_insert("user", array("username" => $username, "email" => $email, "password" => $password));
		return true;
	}
	return false;	
}

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $Password1 = $_POST['password1'];
  $Password2 = $_POST['password2'];

//ensure fields are filled properly

if (empty($username) || !ctype_alnum($username) || (strlen($username) < 4 || strlen($username) > 16)){
  array_push($errors, "Username is a required field. It must be alphanaumeric and within 4-16 characters.");
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
  array_push($errors, "A valid email is required.");
}
if (empty($Password1) || (strlen($Password1) < 6) ){
  array_push($errors, "Password is required. It must be more than 6 characters.");
}
if($Password1 != $Password2){
  array_push($errors, "The two passwords do not match");
}

// if no errors save to Database

if(count($errors) == 0){
  if (!register($username, $email, $Password1)) { array_push($errors, "The username or email supplied is already in use."); } else { addMessage("Your account was successfully registed. Pleasae login below."); header("Location: login.php"); }
}
}
?>