<?php

	require_once 'dbconf.php';

	if($user->is_loggedin()!="")
	{
	 $user->redirect('index.php');
	}

	if(isset($_POST['btn-login']))
	{
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	  
	 if($user->login($email,$password))
	 {
	  $user->redirect('index.php');
	 }
	 else
	 {
	  $error = "Wrong Details !";
	 } 
	}
	include("header.html");
?>
	
	<link rel="stylesheet" href="userForm.css">

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 text-center">
					<div class ="userForm">
						
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">							<p style="font-size: 16px">Login with your Social Media Account</p>
							
							<button class="loginBtn loginBtn--facebook">Login with Facebook</button>
							<button class="loginBtn loginBtn--google">Login with Google</button><br><br>
							
							<div><b>OR</b></div><br>
							
							<p style="font-size: 16px">Please fill in your credentials to login.</p>
									
							<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
								<input type="text" name="email" placeholder="Email ID" class="form-control" value="<?php echo $email; ?>">
								<span class="help-block"><?php echo $email_err; ?></span>
							</div>    
							<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
								<input type="password" name="password" placeholder="Password" class="form-control">
								<span class="help-block"><?php echo $password_err; ?></span>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Login" name="btn-login">
								<input type="reset" class="btn btn-default" value="Reset">
							</div>
									
							<p>Dont have an account? <a href="register.php">Sign up now</a>.</p>
								
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include("footer.html"); ?>