<!DOCTYPE html>
<html>
<head>
	<title>Store</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<?php

		session_start();

		if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
		{
			
	?>

	<a href="../views/sell_form.html">Sell an item</a>
		
	<?php	
		
		}

		else
		{
	?>

	<a href="../views/login_form.html">Login to Sell an item</a>
	
	<?php

	}

	//require("../controllers/sell.php"); 

	$servername = "localhost";
	$username = "root"; //mysql username
	$password = "IlovemyindiA19!"; //mysql password

	// Create connection
	$conn = new mysqli($servername, $username, $password, "buyandsell");

	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	} 
	//echo "Connected successfully";

	// selection stored in variable for printing in table output
	$sql = "SELECT id, title, description, image, price, college, category, putdate, dns, username, contact FROM store";
	$result = $conn->query($sql);

	// to close the connection to the database
	$conn->close();

	?>

	<table class = "table table-striped">
		<tr>
				<td><b>Id</b></td>
				<td><b>Title</b></td>
				<td><b>Description</b></td>
				<td><b>Image</b></td>
				<td><b>Price</b></td>
				<td><b>College</b></td>
				<td><b>Category</b></td>
				<td><b>Date</b></td>
				<td><b>Donate or Share</b></td>
				<td><b>User</b></td>
				<td><b>Contact</b></td>
			</tr>

			<?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { ?>

			<tr>
				<td><?php echo $row["id"] ?></td>
				<td><?php echo $row["title"] ?></td>
				<td><?php echo $row["description"] ?></td>
				<td><?php echo $row["image"] ?></td>
				<td><?php echo $row["price"] ?></td>
				<td><?php echo $row["college"] ?></td>
				<td><?php echo $row["category"] ?></td>
				<td><?php echo $row["putdate"] ?></td>
				<td><?php echo $row["dns"] ?></td>
				<td><?php echo $row["username"] ?></td>
				<td><?php echo $row["contact"] ?></td>
			</tr>

			<?php } }  ?>
	</table>

</body>
</html>