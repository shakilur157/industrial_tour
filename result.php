<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />

	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

	<title>Home</title>
	<link rel="stylesheet" type ="text/css" href="css/home.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<h1 style="color: blue; padding: 5px; text-align: center; ">Search Result</h1>

<h2>
		<table>
				<tr>
					<th>package type</th>
					<th>Company Name</th>
					<th>Category</th>
					<th>Location</th>
					<th>Website</th>
					<th>Payment Method</th>
					<th>Amount</th>
					<th>Phone</th>
					<th>Email</th>
				</tr>
					<?php
					require("database.php");
					$conn = connection();

					if (isset($_GET['result'])) {
						$ans = $_GET['result'];
						//print($ans);
					}

					$query2= "SELECT * FROM `provide_package` where company_name = '$ans'";
					$result2 = mysqli_query($conn, $query2);

					
					while($res2 = mysqli_fetch_array($result2) )
					{	
						echo "<tr>";
						echo "<td>";
						echo $res2['package_type'];
						echo "</td>";
						echo "<td>";
						echo $res2['company_name'];
						echo "</td>";
						echo "<td>";
						echo $res2['category'];
						echo "</td>";
						echo "<td>";
						echo $res2['location'];
						echo "</td>";
						echo "<td>";
						echo $res2['website'];
						echo "</td>";
						echo "<td>";
						echo $res2['payment'];
						echo "</td>";
						echo "<td>";
						echo $res2['amount'];
						echo "</td>";
						echo "<td>";
						echo $res2['contact'];
						echo "</td>";
						echo "<td>";
						echo $res2['email'];
						echo "</td>";
						echo "</tr>";
					}

					?>
				</tr>
			</table>
			</h2>
</body>
</html>