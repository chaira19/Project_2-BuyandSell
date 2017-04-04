<!DOCTYPE html>
<html>
<head>
	<title>Your Portfolio</title>
</head>
<body>
<?php
	
	require "../controllers/register.php";
	session_start();
	echo "Welcome, ".$_SESSION["username"];	
?>

<a href="sell_form.php">Sell an Item</a>
<a href="../models/store.php">Go to Store</a>
<a href="../controllers/logout.php">Logout</a>

<?php 

?>
</body>
</html>