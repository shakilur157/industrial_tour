<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
	<input type="text" name="search">
	<input type="submit" name="submit">
</form>
</body>
<?php
$conn = mysqli_connect('localhost','root','','tour');

if (isset($_POST['submit'])) {
	$data = $_POST['search'];
	//print($data);

	$query= "SELECT * FROM `search` WHERE `company_name` like '$data' ";
	$result = mysqli_query($conn, $query);

	while($res = mysqli_fetch_array($result) )
	{	
		
		$content = $res['company_name'];
		print($content."<br>");
		$content1 = $res['providor'];
		print($content1);
	}
}
?>
</html>