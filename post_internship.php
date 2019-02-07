<?php require_once('header.php'); 
function getId($name)
{
	return str_replace(" ", "", strtolower($name));
}
function generateInput($name, $type = "text")
{
$id = getId($name);
?>
<div class="form-group">
    <label for="<?php echo $id; ?>"><?php echo ucfirst($name); ?></label>
	<input type="<?php echo $type; ?>" class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>" placeholder="<?php echo ucfirst($name); ?>"></input>
</div>
<?php	
}
function generateSelect($name, $array){
$id = getId($name);
?>
<div class="form-group">
    <label for="<?php echo $id; ?>"><?php echo ucfirst($name); ?></label>
    <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
	<?php foreach ($array as $key => $item){
		echo "<option value='".$key."'>".$item."</option>";
	}  ?>
    </select>
</div>
<?php
}
?>
<div class="content container">
<h2>Post Internship</h2>
<?php require_once("errors.php"); ?>
<form method='POST'>
<?php generateInput("Company");  generateSelect("Field", $fields); generateSelect("City", $cities);
generateSelect("Period", $periods);  generateSelect("Type", $types);
generateSelect("Academic Year", $academic_years);
generateInput("Role", "text");
generateInput("Description", "text");
?>
<div class="text-center">
<input type='submit' class="btn btn-primary" value='Publish'></input>
</div>
</form>
</div>
<?php require_once("footer.php"); ?>