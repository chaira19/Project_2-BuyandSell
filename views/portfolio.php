<!DOCTYPE html>
<html>
<head>
	<title>Your Portfolio</title>
</head>
<body>
<?php
	
	session_start();
	echo "Welcome, ".$_SESSION["username"];	

	// sell only if logged in 
?>

<a href="../views/sell_form.html">Sell an Item</a>
<a href="../models/store.php">Go to Store</a>
<a href="../controllers/logout.php">Logout</a>

<?php 

?>
</body>
</html>