<?php include ("common.php");
$css = array("css/login.css");
require_once("global_header.php");?>
 <div class="container login-container">
            <div class="row">
                <div class="offset-md-3 col-md-6 loginform">
                <h3>Register for Intern.com</h3>
				<form method = "post">
					<?php include ('errors.php') ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password1" placeholder="Password" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Register" />
                    </div>
					<div class="form-group">
						<a href="login.php" class="wc">Already a member? Log in here</a>
					</div>
				</form>
			</div>
		</div>
</div>
<?php require_once("global_footer.php"); ?>