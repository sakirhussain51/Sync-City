<?php
$connect = mysqli_connect("localhost","root","","sync_city") or die("Description : ".mysqli_connect_error());
?>
<?php
ob_start();
session_start();



// it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
header("Location: index.php");
exit;
}

$error = false;
$emailError = $passError = $password = NULL;
if(isset($_POST["login"])){
	
	
	
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  
  
  
  
  // prevent sql injections / clear user invalid inputs
	if(empty($email)){
		$error = true;
		$emailError = "Please enter your email address.";
	} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter valid email address.";
	}
  
	if(empty($pass)){
	   $error = true;
	   $passError = "Please enter your password.";
	}	
		
	// if there's no error, continue to login
	if (!$error) {
		
	   
	   $password = hash('sha256', $pass); // password hashing using SHA256
		
		
		
	   $res=mysqli_query($connect,"SELECT user_id, uname, password FROM sign_up WHERE email='$email'");
	   $row=mysqli_fetch_array($res);
	   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
	   
	   if( $count == 1 && $row['password']==$password ) {
		$_SESSION['user'] = $row['user_id'];
		header("Location: index.php");
	   } else {
		echo "Incorrect Credentials, Try again...";
	   }
		
	  }	
		
		
		
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" href="css/signup.css">
</head>

   
    <body>
	
      <form action="" method="post" >
      
        <h1>Login to Sync City</h1>
        
        <fieldset>
          
          
          <label for="mail">Email:</label><span class="error">* <?php echo $emailError;?></span>
          <input type="email" id="mail" name="email">
          
          <label for="password">Password:</label><span class="error">* <?php echo $passError;?></span>
          <input type="password" id="password" name="password">
          
          
        </fieldset>
        
        
        <button type="submit" name="login">Sign In</button>
		<center>
		<center> Don't have an account? <a href="http://localhost/sync_city/signup.php">Sign Up >></a></center>
	</div>
      </form>
	  
      
    </body>
</html>
<?php ob_end_flush(); ?>