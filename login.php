<?php include ('common.php'); 
$css = array("css/login.css");
require_once("global_header.php");	
?>
<div class="container login-container">
            <div class="row">
                <div class="offset-md-4 col-md-4 loginform">
                <h3>Log into Intern.com</h3>
				<form method = "post">
					<?php include ('errors.php') ?>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Username or Email" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
					<div class="form-group">
						<a href="register.php" class="wc">Not a member? Sign up here</a>
					</div>
				</form>
			</div>
		</div>
</div>
<?php require_once("global_footer.php"); ?>