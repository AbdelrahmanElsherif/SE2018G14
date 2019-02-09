<?php
function login($email, $password)
{
	$user = mysql_select("user", "OR", array("email" => $email, "username" => $email));
    $user = $user->fetch();
	if ($user && password_verify($password, $user['password']))
    {
		$_SESSION['user'] = $user;
		unset($_SESSION['user']['password']);
		return true;
	}
	return false;
}
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $errors = array();
  if (empty($email)){
    array_push($errors, "Email is required");
  }
  if (empty($password)){
    array_push($errors, "Password is required");
  }
  if (!$errors)
  {
	if (!login($email, $password)) { array_push($errors, "Invalid username or password.");} else { header("Location: index.php"); }
  }
}
?>

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
  $username = $_POST['Username'];
  $email = $_POST['Email'];
  $Password1 = $_POST['Password1'];
  $Password2 = $_POST['Password2'];
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
