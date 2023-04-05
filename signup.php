<?php
$connect = mysqli_connect("localhost","root","","sync_city") or die("Description : ".mysqli_connect_error());
?>
<?php
ob_start();
session_start();

$nameError = $emailError = $passError = $dobError = $genderError = "";

if( isset($_SESSION['user'])!="" ){
  header("Location: index.php");
 }

$error = false;
 
 
  if(isset($_POST["signup"])){		
		
	  $name = trim($_POST['name']);
	  $name = strip_tags($name);
	  $name = htmlspecialchars($name);
	  
	  $email = trim($_POST['email']);
	  $email = strip_tags($email);
	  $email = htmlspecialchars($email);
	  
	  $pass = trim($_POST['password']);
	  $pass = strip_tags($pass);
	  $pass = htmlspecialchars($pass);
	  
	  $gender = $_POST['gender'];
	  
	  $dob = $_POST['dob'];
	 
	  $contact = trim($_POST['contact']);
	  $contact = strip_tags($contact);
	  $contact = htmlspecialchars($contact);
	  
	  $year = $_POST['year'];
	  
	  $bio = trim($_POST['bio']);
	  $bio = strip_tags($bio);
	  $bio = htmlspecialchars($bio);

	  
	  // basic name validation
	  if (empty($name)) {
	   $error = true;
	   $nameError = "Please enter your full name.";
	  } else if (strlen($name) < 3) {
	   $error = true;
	   $nameError = "Name must have atleat 3 characters.";
	  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
	   $error = true;
	   $nameError = "Name must contain alphabets and space.";
	  }
		//basic email validation
	  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
	   $error = true;
	   $emailError = "Please enter valid email address.";
	  } else {
	   // check email exist or not
	   
	   $result = mysqli_query($connect,"SELECT email FROM sign_up WHERE email='$email'");
	   $count = mysqli_num_rows($result);
	   if($count!=0){
		$error = true;
		$emailError = "Provided Email is already in use.";
	   }
	  
	  // password validation
	  if (empty($pass)){
	   $error = true;
	   $passError = "Please enter password.";
	  } else if(strlen($pass) < 6) {
	   $error = true;
	   $passError = "Password must have atleast 6 characters.";
	  }	
		
		// password encrypt using SHA256();
	  $password = hash('sha256', $pass);
	  
	  if (empty($gender)) {
	   $error = true;
	   $genderError = "Please select you gender.";
	  }
	  
	  if (empty($dob)) {
	   $error = true;
	   $dobError = "Please enter your DOB .";
	  }
	  
	  // if there's no error, continue to signup
	  if( !$error ) {
	
		$query = mysqli_query($connect,"INSERT INTO sign_up(uname,email,password,gender,dob,contact,year,bio) VALUES('$name','$email','$password','$gender','$dob','$contact','$year','$bio')");
		$query = mysqli_query($connect,"INSERT INTO login(email,password) VALUES('$email','$password')");
	   if($query){
			echo "<center><h5>Added New user.</h5></center>";
			
		}
		else{
			echo "<center><h5>Problem in Registration.</h5></center>";
		}
		}
		
	  }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" href="css/signup.css">
</head>

<body>
   
   

      <form action="" method="post">
      
        <h1>Sign Up</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Your basic info</legend>
          <label for="name">Name:<span class="error">* <?php echo $nameError;?></span></label>
          <input type="text" id="name" name="name">
          
          <label for="mail">Email:<span class="error">* <?php echo $emailError;?></span></label>
          <input type="email" id="mail" name="email">
          
          <label for="password">Password:<span class="error">* <?php echo $passError;?></span></label>
          <input type="password" id="password" name="password">
          
          <label>Gender:<span class="error">* <?php echo $genderError;?></span></label>
          <input type="radio" id="male" value="Male" name="gender"><label for="male" class="light">Male</label><br>
          <input type="radio" id="female" value="Female" name="gender"><label for="female" class="light">Female</label>
        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Your profile</legend>
          <label for="bio">Biography:</label>
          <textarea id="bio" name="bio"></textarea>
        
		
		<label >DOB:<span class="error">* <?php echo $dobError;?></span></label>
		<input type="date" id="dob" name="dob">
		
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact">
		
		
        <label for="year">Year:</label>
        <select id="year" name="year">
          
            <option value="UG1">UG1</option>
            <option value="UG2">UG2</option>
            <option value="UG3">UG3</option>
            <option value="UG4">UG4</option>
            <option value="PG">PG</option>
            <option value="other">Other</option>
          
        </select>
        
        </fieldset>
        <button type="submit" name="signup">Sign Up</button>
		<center> Already have an account? <a href="http://localhost/sync_city/login.php">Click to Login</a></center>
      </form>
      
    </body>
</html>
<?php ob_end_flush(); ?>