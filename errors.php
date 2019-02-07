<?php 
 if (isset($errors) && count($errors) > 0):?>
  <div class="error alert alert-danger">
    <ul><?php  foreach ($errors as $error): ?>
      <li><?php echo $error; ?></li>
    <?php endforeach ?>
	</ul>
  </div>
<?php endif ?>

<?php  if (isset($_SESSION['success']) && $_SESSION['success']):?>
  <div class="error success">
    <?php  foreach ($_SESSION['success'] as $success): ?>
      <p> <?php echo $success; ?></p>
    <?php endforeach ?>
  </div>
<?php endif ?>
