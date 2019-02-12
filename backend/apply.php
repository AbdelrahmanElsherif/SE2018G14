<?php
if ($_POST)
{
// ['mobile'] => '012414',
$mobile = $_POST['mobile'];
$user_array = $_SESSION['user'];

//$_SESSION:

//['user'] => array("id" => 1, "username" => "gm23")


$user_id = $user_array['id'];
$internship_id = $_POST['internship_id'];

//$_FILES:

//['cv_file'] => array("name" => ..., "tmp_name" => "C:\TEMP\1481.tmp", "size" => ..)
if ($_FILES)7na
{
    $path_temp = $_FILES['cv_file']['tmp_name'];
    $cv = file_get_contents($path_temp);
    mysql_insert("application", array(
        "user_id" => $user_id,
        "internship_id" => $internship_id,
        "mobile" => $mobile,
        "cv" => $cv
    ));
}
else 
{
    $errors[] = "The CV file was left blank.";
}

}
/*
hform method='POST'>
<input type="email" name="internship_id" />
<input type="text" name="mobile" />

<input ="submit" />
</form>

<form method='POST'>
<input type="email" name="internship_id" />
<input type="text" name="mobile" />

<input type="file" name="cv_file" />

<input type="submit" />
</form>
*/
?>
