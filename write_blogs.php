<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	global $my_name;
	$my_name = $_SESSION['uname'];
	global $uemail;
	$uemail = $_SESSION['uemail'];

	if($my_name==NULL)
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
			      <a href="#">Provide Service</a>
			      <a href="logout.php">Logout</a>
			    </div>
			  </div>

			<li style="float: right; "></li>
			
			<li style="float: right; " ><input type="text" name="search" placeholder="Search here"></li> 
			
		</ul>
	</div>

	<h2>
		<?php

			global $picture_name;
			$my_name = $_SESSION['uname'];
			global $target_dir;
			$target_dir = 'uploads/'.$my_name;
			mkdir($target_dir,0777,true);
			
			$target_file = $target_dir.'/'.basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			/*if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}*/
			// Check file size
			if (isset($_POST["submit"]) && $_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if(isset($_POST["submit"]) && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if (isset($_POST["submit"]) && $uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The picture has been uploaded.";
			        $picture_name = (( $_FILES["fileToUpload"]["name"]));
			        //$GLOBALS['picture_name'] = $picture_name;
			        
			        
			    }
			     else {
			        //echo "Sorry, there was an error uploading your file.";
			    }
			}

			if(isset($_POST['t_area']))
			{
				require("database.php");
				$conn = connection();

				//$my_name = $_SESSION['uname'];
				//$uemail = $_SESSION['uemail'];

				$detail = $_POST['detail'];
				$title = $_POST['title'];
				
				if(isset($_POST['var'])) $picture_name=$_POST['var'];
				

				$query ="INSERT INTO `tour`.`blogs_data` (`title`, `name`, `email`, `path`, `detail`) VALUES ('$title','$my_name', '$uemail', '$target_dir/$picture_name', '$detail')";
				$result = mysqli_query($conn,$query);


				header("location: profile.php");
			}


			

			
?>
<style type="text/css">
	
#popimage{
	max-width: 500px;
	max-height: 500px;
}
</style>


		<table>
			<tr> 
				<th>Upload image</th>
				<th>Title</th>
				<th>Write details</th>
			</tr>
			<tr>
				<td style="max-width: 550px; max-height: 550px;">
					<form  action = "write_blogs.php" method="post" enctype="multipart/form-data" >
					    Select image to upload:
					    <input type="file" name="fileToUpload" id="fileToUpload">
					    <input type="submit" value="Upload Image" name="submit" >
					     
				    	<?php 
		 					echo "<img src='$target_dir/$picture_name' id='popimage'/>";
		 				?>
					</form>
				</td>
				<td>
					<form method="post">
					<input style="width: 150px;" type="text" name="title" placeholder="give title">
					<input type='hidden' name='var' value='<?php echo "$picture_name";?>'/>
				</td>
				<td>
					
					
						<textarea rows="10" cols="400" name="detail" placeholder="write detail"></textarea>
						<input type="submit" name="t_area" value="Done">
					</form>
					
				</td>
			</tr>
		</table>
		<?php
			error_reporting(E_ERROR | E_PARSE);
			
				
				$uemail = $_SESSION['uemail'];
				print("hello ".$uemail);
			
				
		 	
		?>
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