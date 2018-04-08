<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$name = $_SESSION['uname'];

	if($name==NULL)
	{
		echo "<script type='text/javascript'>alert('loging first')</script>";
		header("location: home.php");

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
	<style type="text/css">
		
select {
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#888;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}
	</style>
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
			<div class="dropdown">
			    <button class="dropbtn"><a style="color: white;" href="welcome_home.php"> <?php print($_SESSION['uname']); ?></a>
			      <i style="color: white;" class="fa fa-caret-down"></i>
			    </button>
			    <div class="dropdown-content">
			      <a href="write_blogs.php">Write Blog</a>
			      <a href="providepackage.php">Provide Pacakge</a>
			      <a href="provideservice.php">Provide Service</a>
			      <a href="logout.php">Logout</a>
			    </div>
			  </div>
			
			<li style="float: right; " ><input type="text" name="search" placeholder="Search here"></li> 
			
		</ul>
	</div>
	<br/><h2>Please fill up these given information</h2><br/>
	<form action = "providepackage.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Detail</th>
				<th>Information</th>
			</tr>
			<tr>
				<td>Package Type</td>
				<td>
					<select style="font-size: 18px;" name="package_type">
						<option value="commercial" >Commercial</option>
						<option value="Free" >Free</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Name of Your Company/Oraganization</td>
				<td><input type="text" name="company_name"></td>
			</tr>
			<tr>
				<td>Webaddress of your Company/Organization</td>
				<td><input type="text" name="website" placeholder="If any "></td>

			</tr>
			<tr>
				<td>Location</td>
				<td><input type="text" name="location"></td>
			</tr>
			<tr>
				<td>Who can apply?</td>
				<td>
					<select style="font-size: 18px;"  name="apply">
						<option value="Students">Students</option>
						<option value="Employees">Employees</option>
						<option value="Everyone">Everyone</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>What will be provided ?</td>
				<td>
					<select style="font-size: 18px;"  name="category">
						<option value="Educational">Educational</option>
						<option value="Job">Job Experience</option>
						<option value="Career">Career</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>More specific</td>
				<td><input type="text" name="subject" placeholder="CSE/EEE/others"></td>

			</tr>
			<tr>
				<td>Payment method(if it's not free)</td>
				<td>
					<select style="font-size: 18px;"  name="payment">
						<option value="Bkash">Bkash</option>
						<option value="Card">Card</option>
						<option value="both">Both</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Expected Amount</td>
				<td><input type="text" name="amount" placeholder="USD"></td>

			</tr>
			<tr>
				<td>Contact No</td>
				<td><input type="text" name="contact" ></td>

			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>

			</tr>
			<tr>
				<td>Description</td>
				<td><textarea style="font-size: 18px;" rows="10" cols="20" name="detail" placeholder="write detail"></textarea></td>

			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php

require("database.php");

if(isset($_POST['submit']))
{
	$package_type=$_POST['package_type'];
	$company_name=$_POST['company_name'];
	$website=$_POST['website'];
	$location=$_POST['location'];
	$apply=$_POST['apply'];
	$category=$_POST['category'];
	$subject=$_POST['subject'];
	$payment=$_POST['payment'];
	$amount=$_POST['amount'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$detail=$_POST['detail'];

	$db = connection();

	$quey = "INSERT INTO `tour`.`provide_package` (`package_type`, `company_name`, `website`, `location`, `apply`, `category`, `subject`, `payment`, `amount`, `contact`, `email`,`detail`,`providor`) VALUES ('$package_type', '$company_name', '$website', '$location', '$apply', '$category', '$subject', '$payment', '$amount', '$contact', '$email','$detail', '$name')";

	//echo $quey;

	$result = mysqli_query($db,$quey);
	header("location: profile.php");
	
}
?>
	
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