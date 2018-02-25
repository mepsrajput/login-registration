<?php

	// Include config file
	require_once 'dbconf.php';

	if($user->is_loggedin()!="") {
		$user->redirect('index.php');
	}

	// Define variables
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);
	
	$name_err = $email_err = $password_err = $confirm_password_err = "";
 
	// Processing form data when form is submitted
	if(isset($_POST['btn-signup'])) {

		// Validate submitted details
		if($name == "") {
			$name_err = "Please enter your name.";     
		}	elseif(strlen($name) < 3) {
				$name_err = "Name can not be less than 3 characters.";     
		}   elseif(!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$name_err = "Name can only contain alphabets.";     
		}   elseif($email == "") {
				$email_err = "Please enter your email.";     
		}   elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$email_err = "Please enter a valid email"; 
		}   elseif($password == ""){
				$password_err = "Please enter a password.";     
		}   elseif(strlen($password) < 6){
				$password_err = "Password must have atleast 6 characters.";
		}   elseif($confirm_password == ""){
				$confirm_password_err = 'Please confirm password.';     
		}   elseif($password != $confirm_password){
				$confirm_password_err = 'Password did not match.';
		}   else {
				try {
					$stmt = $DB_con->prepare("SELECT name, email, password FROM users WHERE email=:email");
					$stmt->execute(array(':email'=>$email));
					$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
					if($row['email'] == $email) {
						$email_err = "Sorry email id is already in use !";
					}	else {
						
							//Hash the password as we do NOT want to store our passwords in plain text.
							$passwordHash = password_hash($password, PASSWORD_DEFAULT);
							
							//Prepare our INSERT statement.
							//Remember: We are inserting a new row into our users table.
							$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
							$stmt = $DB_con->prepare($sql);
							
							//Bind our variables.
							$stmt->bindValue(':name', $name);
							$stmt->bindValue(':email', $email);
							$stmt->bindValue(':password', $passwordHash);
						 
							//Execute the statement and insert the new account.
							$result = $stmt->execute();
							
							//If the signup process is successful.
							if($result == 1){
								//What you do here is up to you!
								header("location: login.php");
							} else {
								echo "some error occured";
							}								
						}
				}
				catch(PDOException $e) {
					echo $e->getMessage();
				}
			} 
	}
		 
	include("header.html");

?>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Full Name</label>
                <input type="text" name="name"class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>
			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>EMail ID</label>
                <input type="text" name="email"class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="btn-signup" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
<?php

	include("footer.html");
	
?>
