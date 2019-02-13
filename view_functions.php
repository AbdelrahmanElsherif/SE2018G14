<?php
function showSearch($stmt, $link = "apply", $text = "")
{
	if (!$text) $text = $link;
	echo '
	    <table class="table">
	<thead>
      <th>Position</th>
      <th>Company</th>
      <th>Field</th>
      <th>City</th>
      <th>Period</th>
      <th>Type</th>
      <th>Academic Year</th>
      <th>Description</th>
      <th></th>
	  </thead>
	  <tbody>';
	  while ($row = $stmt -> fetch()){
		  $id = $row['id'];
		  
		  if ($link == "apply") { if (getApplication($row['internship_id'], $_SESSION['user']['id']) || hasAccess($row['internship_id'], $_SESSION['user']['id'])) $link = false; } //This will be SQL-intensive; we will use pagination. There might be better practice.
		  unset($row['id']);
		  unset($row['user_id']);
		  unset($row['internship_id']);
		  unset($row['cv']);
		  $row['description'] = nl2br($row['description']);
        generateRow($row, $link? array("<a href='".$link.".php?internship_id=".$id."'>".ucfirst($text)."</a>") : array("-"));
       }
	 echo '</tbody></table>';
}
function getId($name)
{
	return str_replace(" ", "_", strtolower($name));
}
function generateRow($params, $items = array())
{
	echo "<tr>";
	foreach ($params as $param => $value) echo "<td>".$value."</td>";
	foreach ($items as $item) echo "<td>".$item."</td>";
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
	<option value="-">-- Not Specified --</option>
	<?php foreach ($array as $key => $item){
		echo "<option value='".$key."'>".$item."</option>";
	}  ?>
    </select>
</div>
<?php
}
?>
