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
	<input type="<?php echo $type; ?>" class="form-control" id="<?php echo $id; ?>" placeholder="<?php echo ucfirst($name); ?>"></input>
</div>
<?php	
}
function generateSelect($name, $array){
$id = getId($name);
?>
<div class="form-group">
    <label for="<?php echo $id; ?>"><?php ucfirst($name); ?></label>
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
<form method='POST'>
<?php generateInput("Email", "email"); generateInput("Company");  generateSelect("Field", $fields); generateSelect("City", $cities);
generateSelect("Period", $periods);  generateSelect("Type", $types);
generateSelect("Academic Year", $types);
generateInput("Role", "text");
generateInput("Description", "text");
?>
<input type='submit' class="text-center" value='Publish'></input>
</form>
</div>
<?php require_once("footer.php"); ?>