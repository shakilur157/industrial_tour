<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$name = $_SESSION['uname'];

	if($name==NULL)
	{
		//echo "<script type='text/javascript'>alert('loging first')</script>";
		//header("location: home.php");

	}
	else{
		header("location: ../welcome_home.php");
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />

	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

	<title>Home</title>
	<link rel="stylesheet" type ="text/css" href="css\home.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="image" ">
		<img id="imagetop" style="width: 100% ; height: 200px; margin: 0px; margin-top: 60px; " src="img/home.JPG">
	</div>
	<div id="navbar">
		<ul>
			<li><a href="welcome_home.php">Home</a></li>
			<li><a id="active" style="background: #BDC3C7;" href="profile.php">Profile</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="packagelist.php">Package List</a></li>
			<li><a href="services.php">Services</a></li>
			<li><a href="blogs.php">Blogs</a></li>
			<li style="float: right;" id="signup"><a href="signup.php">Signup</a></li>
			<li style="float: right; " ><input type="text" name="search" placeholder="Search here"></li> 
			
		</ul>
	</div>

	<h2>
		<?php/*
			error_reporting(E_ERROR | E_PARSE);
			$name = $_SESSION['uname'];
			if($name==NULL)
				$name=" Please login first";
			else
			{
				
				$name = $_SESSION['uname'];
				print("hello ".$name);
			}
				
		 	
		*/?>
		<table>
			<tr>
				<th>Your Blogs</th>
				<th>your Packages</th>
				<th>your Services</th>
			</tr>

		</table>
	</h2>
	
	<div id="footer">
		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Company<span>logo</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>
				<p class="footer-company-name">Company Name &copy; 2015</p>
			</div>
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>21 Revolution Street</span> Paris, France</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123456</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">support@company.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
				</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
				</div>

			</div>

		</footer>
	</div>

</body>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
 
</html>