<?php include ('database.php');
if(empty($_SESSION['Email'])){
  header('location:login1.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>User Registration System</title>
   <link rel="stylesheet" type="text/css" href="style1.css">
 </head>
 <body>

   <div class="header">
     <h2>Home Page</h2>


   </div>
   <div class="content">
     <?php  if (isset($_SESSION['success'])): ?>
       <div class="error success">
         <h3>
<?php
echo $_SESSION['success'];
unset($_SESSION['success']);

?>
         </h3>

       </div>
<?php endif ?>
     <h3>Update Profile Info</h3>
<form method="post"  action="login1.php">
<div class="container">
    <!-- <h1>Home Page</h1> -->
    <?php include ('errors1.php'); ?>
    <hr>

    <div class="input-group">
    <label>Change Username</label>
    <input type="text" placeholder="Change Email" name="Email" value="<?php echo $email; ?>" >
    </div>

    <div class="input-group">
    <label>Change Email</label>
    <input type="text" placeholder="Enter Email" name="Email" value="<?php echo $email; ?>" >
    </div>

    <div class="input-group">
    <label> Old Password</label>
    <input type="password" placeholder="Enter Password" name="password" >
    </div>


    <div class="input-group">
    <label> New Password</label>
    <input type="password" placeholder="Enter Password" name="password" >
    </div>


    <!-- <div class="input-group">
    <label>
        <input type="checkbox" checked="checked" name="remember"
               style="color:dodgerblue"> Remember me
    </label>
 </div> -->


    <div class="input-group">
      <label> Update Profile Picture</label>
      <!-- <input type="image" name="image" > -->
      <form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload" id="fileToUpload">
<!-- <input type="submit" value="Upload Image" name="submit"> -->
</form>
      </div>
      <div class="input-group">

          <button type="submit" name="Save Changes"  class="btn">Save Changes</button>
      </div>
    </div>
</div>

</form>

<?php
if (isset($_SESSION['Email'])):
?>
<p>Welcome <strong><?php echo $_SESSION['Email'] ?></strong></p>
<p><a href ="index1.php?logout='1'" style="color:red;">Logout</a></p>
<?php endif ?>
   </div>
 </body>
</html>
