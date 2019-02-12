<?php
function getId($name)
{
	return str_replace(" ", "_", strtolower($name));
}
function generateRow($params)
{
	echo "<tr>";
	foreach ($params as $param => $value) echo "<td>".$value."</td>";
	echo "</tr>";
}
function generateInput($name, $type = "text")
{
$id = getId($name);
?>
<div class="form-group">
    <label for="<?php echo $id; ?>"><?php echo ucfirst($name); ?></label>
	<?php if ($type != "textarea") { ?> 
	<input type="<?php echo $type; ?>" class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>" placeholder="<?php echo ucfirst($name); ?>"></input>
	<?php } else {
		?>
		<textarea type="<?php echo $type; ?>" class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>" placeholder="<?php echo ucfirst($name); ?>"></textarea>
		<?php
	} ?>
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