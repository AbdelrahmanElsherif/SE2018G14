<?php error_reporting(0); ?>
<?php

session_start();

$username ="";
$email = "";
$errors = array();
try {
    $db = new PDO ("mysql:host=localhost;dbname=register", "root", "");

    /*echo "connected";*/

}
    catch(PDOException $e) {
        echo "error" .$e->getMessage();
    }

if (isset($_POST['register'])) {
  $username = $_POST['Username'];
  $email = $_POST['Email'];
  $Password1 = $_POST['Password1'];
  $Password2 = $_POST['Password2'];

//ensure fields are filled properly

if (empty($username)){
  array_push($errors, "Username is required");
}
if (empty($email)){
  array_push($errors, "Email is required");
}
if (empty($Password1)){
  array_push($errors, "Password is required");
}
if($Password1 != $Password2){
  array_push($errors, "The two passwords do not match");
}

// if no errors save to Database

if(count($errors) == 0){
  $password = md5 ($Password1);
  /*$sql = "Insert into users (username, email, password)
  Values ('$username','$email', '$password')";
  mysqli_query($db,$sql);
  */
  $sql="INSERT INTO user (Username, email, password) VALUES (?,?,?)";
            $statement=$db->prepare($sql);
            $statement->execute([$username,$email,$password]);
  $_SESSION['Username']= $username;
  $_SESSION["success"]="You are now logged in";
  header ('location: index1.php');
}
}
if(isset($_POST['login'])){
  $email = $_POST['Email'];
  $password = $_POST['password'];

  if (empty($email)){
    array_push($errors, "Email is required");
  }
  if (empty($password)){
    array_push($errors, "Password is required");
  }
  if (count($errors)==0){
    $password = md5($password);
    /*$sql="INSERT INTO user (Username, email, password) VALUES (?,?,?)";
              $statement=$db->prepare($sql);
              $statement->execute([$username,$email,$password]);*/
    $query = "SELECT* from user where email = ? And password =?";
    $statement=$db->prepare($query);
    $statement->execute([$email,$password]);
  //  $result = $con-> prepare($query);

  if($statement->rowCount() > 1)
  {
    //log user in
    $_SESSION['Email']= $email;
    $_SESSION["success"] = "You are now logged in";
    header('location: index1.php');
  }
  else{
    array_push($errors, "Wrong username/password combination");
  }
  }
}




/*<p><a href="login1.php" style="color: red;">Logout</a></p> */
if (isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['Email']);
  header('location: login1.php');
}

?>
