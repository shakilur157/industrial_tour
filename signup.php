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
	
	<link rel="stylesheet" href="css/signup.css">
	<link rel="stylesheet" type ="text/css" href="css\home.css">
</head>
<body>
	<div id="image" ">
		<img id="imagetop" style="width: 100% ; height: 200px; margin: 0px; margin-top: 60px; " src="img/home.JPG">
	</div>
	<div id="navbar">
		<ul>
			<li><a  href="home.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="packagelist.php">Package List</a></li>
			<li><a href="services.php">Services</a></li>
			<li><a href="blogs.php">Blogs</a></li>
			<li style="float: right;" id="signup" ><a id="active" style="background: #BDC3C7;" href="signup.php">Signup</a></li>
			<li style="float: right;"><input type="text" name="search" placeholder="Search here"></li>
		</ul>
	</div>
	<?php
	require("database.php");
	$conn=connection();

	if(isset($_POST['Submit2'])) {
      
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM user_login_data WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      
      $count = mysqli_num_rows($result);
      
        if ($count > 0) {
	         while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		         $uemail= $row['email'];
		         $user_name= $row['name'];
       		}
	         session_start();
	         $_SESSION['uname'] = $user_name;
	         $_SESSION['uemail'] = $uemail;
	         header("location: welcome_home.php");
         
       }
       else {
         $error = "Your Login Name or Password is invalid";
       }
       
   }

   	if(isset($_POST['submit1'])) {
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $country = mysqli_real_escape_string($conn,$_POST['country']);
      $phone = mysqli_real_escape_string($conn,$_POST['phone']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql_signup = "INSERT INTO `tour`.`signup_data` ( `name`, `phone`, `email`, `password`, `country`) VALUES ('$name', '$phone', '$email', '$password', '$country')";
      $result = mysqli_query($conn,$sql_signup);

      $sql_login = "INSERT INTO `tour`.`user_login_data` ( `name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
      $result = mysqli_query($conn,$sql_login);

      header("location: home.php");
      
   	}
	?>

	
	<div class="signupbox">
		<div class="form">
		      <div class="head">
			      	<ul class="tab-group">
			        	<li class="tab active"><a href="#signup">Sign Up</a></li>
			        	<li class="tab"><a href="#login">Log In</a></li>
			      </ul>
		      </div>
		      
		      <div class="tab-content">
		          <div id="signup">   
			          <h1>Sign Up for Free</h1>
			          
			          <form class="f1" method="post" >
			          
				          <div class="field-wrap">
				              <label>Name<span class="req">*</span></label>
				              <input type="text" name ="name" required autocomplete="off"/>
				          </div>
				          <div class="field-wrap">
				              <label>Location<span class="req">*</span> </label>
				              <input type="text" name ="country" required autocomplete="off"/>
				          </div>
				          <div class="field-wrap">
				             <label> Phone Number<span class="req">*</span></label>
				             <input type="text" name ="phone" required autocomplete="off"/>
				          </div>
				          <div class="field-wrap">
				             <label>Email Address<span class="req">*</span> </label>
				             <input type="email" name ="email" required autocomplete="off"/>
				          </div>
				          
				          <div class="field-wrap">
				             <label>Set A Password<span class="req">*</span></label>
				             <input type="password" name ="password" />
				          </div>

				          
				           <button id="myBtn" Name = "submit1" value="signup" type="submit" class="button button-block" > Get Started</button>

			          </form>
		          </div>
		        
			      <div id="login">   
			           <h1>Welcome Back!</h1>
			           <form class="f1" method="post">
			          
			              <div class="field-wrap">
			                 <label> Email Address<span class="req">*</span></label>
			                 <input type="email" name="email" required autocomplete="off"/>
			              </div>
			          
			          	  <div class="field-wrap">
			            	  <label>Password<span class="req">*</span></label>
			                  <input type="password" name="password" required autocomplete="off"/>
			          	  </div>
			          
			              <p class="forgot"><a href="#">Forgot Password?</a></p>
			          
			               <button name="Submit2" type="submit" value="login" class="button button-block"/>Log In</button>
			          
			          </form>
			      </div>
		       </div><!-- tab-content -->
			</div> <!-- /form -->
	</div>	
  
	<div id="footer" style="width: 100%; overflow: hidden;margin-top: 0px;">
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