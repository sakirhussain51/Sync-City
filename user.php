<?php
$connect = mysqli_connect("localhost","root","","sync_city") or die("Description : ".mysqli_connect_error());
?>
<?php
 ob_start();
 session_start();
 
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($connect,"SELECT * FROM sign_up WHERE user_id=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res,MYSQLI_BOTH);
?>


<html>
	<head>
		<title><?php echo $userRow['uname']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/png" href="images/logo.png">
		<script src="js/js.js"></script>		
		<link href="css/user.css" rel="stylesheet">
		<script src="js/jq.js"></script>
		
	</head>
	<body >
		<!-- Heaader -->
		<header class="">
		
			<div class="container">
			
			<div class="head">
				<div class="logo"><a href="" ><img src="images/logo.png" width="55px"></a></div>
				<div class="txt_logo">Sync City</div>
				<div class="menu">
					<nav>
						<ul>
							<li><a href="">About</a></li>
							<li><a href="">Contact</a></li>
							<li><a href="logout.php?logout">Sign Out</a></li>
						</ul>
					</nav>
				</div>
			</div>
			</div>
		</header>
			<br><br>
		<section class="main_con">
			<div class="left">
				<div class="about_text">
					<br>
					<p>
					A social network for college with student login, administrator login and teachers &amp; staff login.The administrator
					has the highest authority.The website notifies students about various college events and the placement and internship
					opportunities available.Only admin,staff and teachers have the permission to post events.Students can view these notifications and react accordingly. 
					students have also thier own private space where they can chat and post.
					</p>
				</div>	
			</div>
			<div class="right">
			
			
			</div>
			<div class="main">
			
			</div>
		</section>
				
		
			
	</body>
</html>
<?php ob_end_flush(); ?>