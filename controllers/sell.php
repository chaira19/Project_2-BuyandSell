<?php
	
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("../views/sell_form.php");
	}

	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
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

		// sql to create table by the name of the city
		$sql = "CREATE TABLE store(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		image LONGBLOB,
		price VARCHAR(500),
		college VARCHAR(500),
		category VARCHAR(500),
		putdate VARCHAR(30),
		username VARCHAR(100),
		contact VARCHAR(100)
		)";

		if ($conn->query($sql) === TRUE) {
				echo "store table created successfully";
			} else {
				echo "Error creating table: " . $conn->error;
			}

		$sql = "INSERT IGNORE INTO store (id, image, price, college, category, putdate, username, contact) VALUES (NULL, "."'".addslashes($_POST["pic"])."'".", "."'".addslashes($_POST["price"])."'".", '".$_SESSION["college"]."', "."'". $_POST["category"]."', '" . $_POST["putdate"]."', '" . $_SESSION["username"]."', '" . $_POST["contact"]."')";
				// WHERE NOT EXISTS ( SELECT college FROM ".strtolower($_POST["city"]). " WHERE college = "."'".$collegename."') LIMIT 1					}
		if ($conn->query($sql) === TRUE) {
					echo "New record created successfully \n";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
	}

?>
