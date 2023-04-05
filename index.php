<?php
$connect = mysqli_connect("localhost","root","","sync_city") or die("Description : ".mysqli_connect_error());
?>
<?php
 ob_start();
 session_start();
 
 
 if( isset($_SESSION['user']) ) {
  $res=mysqli_query($connect,"SELECT * FROM sign_up WHERE user_id=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res,MYSQLI_BOTH);
 }
 
 
?>


<html>
	<head>
		<title><?php if( isset($_SESSION['user']) ) { echo $userRow['uname']; } else echo "Sri City" ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/png" href="images/logo.png">
		<script src="js/js.js"></script>		
		<link href="css/main.css" rel="stylesheet">
		<script src="js/jq.js"></script>
		
	</head>
	<body onload="displaySlides(1)">
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
				<?php
					if( isset($_SESSION['user']) ) { ?>
						<li><a href="logout.php?logout">Sign Out</a></li>
				<?php	} else {	?>
						<li><a href="http://localhost/sync_city/login.php" id="login">Login</a></li>
						<li><a href="http://localhost/sync_city/signup.php">Signup</a></li>
				<?php	}
				?>
						
					</ul>
				</nav>
			</div>
		</div>
		</div>
	</header>
		<br><br>
	<section class="main_con">
		
			<div class="container">
			<div class="top">
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
	<!-- Slider -->			
				</div>
				<div class="right" onload="displaySlides(1)">
					<div class="slidercontainer">  
						<div class="showSlide fade">  
							<img src="images/1.jpg" />  
							<div class="content"></div>  
						</div>  
						<div class="showSlide fade">  
							<img src="images/2.jpg" />  
							<div class="content"></div>  
						</div>  
				  
						<div class="showSlide fade">  
							<img src="images/3.jpg" />  
							<div class="content"></div>  
						</div>  
						<div class="showSlide fade">  
							<img src="images/4.jpg" />  
							<div class="content"></div>  
						</div>  
						<!-- Navigation arrows -->  
						<a class="left_b" onclick="nextSlide(-1)">&#8592</a>  
						<a class="right_b" onclick="nextSlide(1)">&#8594</a>  
					</div>
				</div>
			</div>
			
			
	<!-- Latest News feed section --> 
        <div id="r_news">
                <div class="news_h">
                    <h2>Latest News</h2>
                </div>
                

                <div class="row">
                    
                    <div class="col">
                        <div class="news_i">
                            <img  src="images/n1.jpg" alt="Latest News feed Image">
                        </div>
                        <h4><a href="#">Written exams</a> </h4>
                        <p>End semester exam schedule out 
                        <a  href="#">Read More</a></p>
                    </div>
                 
                    <div class="col">
                        <div class="news_i">
                            <img  src="images/n2.jpg" alt="Latest News feed Image">
                        </div>
                        <h4><a href="#">Lab exam/Project evaluation:</a> </h4>
                        <p>Change in dates of evaluation
                        <a  href="#">Read More</a></p>
                    </div>
                    
                    <div class="col">
                        <div class="news_i">
                            <img  src="images/n3.jpg" alt="Latest News feed Image">
                        </div>
                        <h4><a href="#">Showing of Answer script</a> </h4>
                        <p>contact respecive faculty members for dates
                        <a  href="#">Read More</a></p>
                    </div>
                   
                </div>
                
   
        </div>
       
				
				
				
				
			</div>
	</section>
	
	
	
	<!-- Footer section -->
	<footer>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="foo">
					<h3>IIIT SRICITY</h3>
					<p><strong>Location:</strong><br>
						IIIT Chittoor, Sri City<br>
						C/o Institute for Financial Management &amp; Research,<br>
						5655 Central Express way,<br>
						Sri City, Satyavedu Mandal,<br>
						Chittoor District, Andhra Pradesh -  517646
					</p>
					
				
				</div>
				
			
			</div>
			<div class="col">
				<div class="foo">
				
					<p><strong>Telephone:</strong><br>
						+91-73064-73364<br><br>
						<strong>Placement Contact:</strong><br>
						9550280002 / 9000025622<br><br>
						<strong>Email:</strong><br>
						contact@iiits.in
					</p>
					
				
				</div>
			
			</div>
			<div class="col ">
				<h3>DIRECTORY</h3>
					<p><a href="http://www.iiits.ac.in/faculty/">Faculty</a></p>
					<p><a href="http://www.iiits.ac.in/placement/">Placement</a></p>
					<p><a href="http://www.iiits.ac.in/staff/">Staff</a></p>
					<p><a href="http://www.iiits.ac.in/center/">Centers</a></p>
					<p><a href="http://www.iiits.ac.in/labs/">Labs</a></p>
			
			
			</div>
			<div class="box_size"></div>
		
		</div>
	</div>
	</footer>
</body>
</html>
<?php ob_end_flush(); ?>