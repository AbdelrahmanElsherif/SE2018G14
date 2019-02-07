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