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
</head>
<body>
	<div id="image" ">
		<img id="imagetop" style="width: 100% ; height: 200px; margin: 0px; margin-top: 60px; " src="img/home.JPG">
	</div>
	<div id="navbar">
		<ul>
			<li><a  href="welcome_home.php">Home</a></li>
			<li><a id="active"  href="profile.php">Profile</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="packagelist.php">Package List</a></li>
			<li><a id="active" style="background: #BDC3C7;" href="services.php">Services</a></li>
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
			<li style="float: right;"><input type="text" name="search" placeholder="Search here"></li>
		</ul>
	</div>

	<div class="table-div">
		<br><br><h1 style="color: black;font-family: Calibri;text-align: center; font-size: 50px;">Our Services</h1><br><br>
		<h2>

			<table>
				<tr>
					<th>Services</th>
					<th>Type</th>
					<th>From</th>
					<th>To</th>
				</tr>
					<?php
					require("database.php");
					$conn = connection();

					$query22= "SELECT * FROM `transportation`";
					$result22 = mysqli_query($conn, $query22);

					
					while($res22 = mysqli_fetch_array($result22) )
					{	
						echo "<tr>";
						echo "<td>";
						echo "transportation";
						echo "</td>";
						echo "<td>";
						echo "<a href='fullpackage_data.php'>".$res22['package_type']."</a>";
						echo "</td>";
						echo "<td>";
						echo $res22['from'];
						echo "</td>";
						echo "<td>";
						echo $res22['to'];
						echo "</td>";
						echo "</tr>";
					}

					$query223= "SELECT * FROM `hotel`";
					$result223 = mysqli_query($conn, $query223);

					
					while($res223 = mysqli_fetch_array($result223) )
					{	
						echo "<tr>";
						echo "<td>";
						echo "hotel";
						echo "</td>";
						echo "<td>";
						echo "<a href='fullpackage_data.php'>".$res223['package_type']."</a>";
						echo "</td>";
						echo "<td>";
						echo "NA";
						echo "</td>";
						echo "<td>";
						echo "NA";
						echo "</td>";
						echo "</tr>";
					}

					$query2234= "SELECT * FROM `other`";
					$result2234 = mysqli_query($conn, $query2234);

					
					while($res2234 = mysqli_fetch_array($result2234) )
					{	
						echo "<tr>";
						echo "<td>";
						echo "others";
						echo "</td>";
						echo "<td>";
						echo "<a href='fullpackage_data.php'>".$res2234['service_name']."</a>";
						echo "</td>";
						echo "<td>";
						echo "NA";
						echo "</td>";
						echo "<td>";
						echo "NA";
						echo "</td>";
						echo "</tr>";
					}

					?>
				</tr>
			</table>


		</h2>
	</div>
	
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




<!--<div class="form">     
    	<div id="login">  
    	<h1>Welcome Back!</h1> 
          <form method="post">
	          <div class="field-wrap">
	              <label>Email Address<span class="req">*</span></label>
	              <input type="email" name ="email"required autocomplete="off"/>
	          </div>
	          
	          <div class="field-wrap">
	              <label>Password<span class="req">*</span></label>
	              <input type="password" name ="password" required autocomplete="off"/>
	          </div>
	          
	          <p class="forgot" style="padding: 20px;" ><a href="#">Forgot Password?</a></p>
	          <button id="myBtn" name="submit" type="submit"class="button button-block"/>Log In</button>
          </form>
       </div>
	</div> -->