<?php
	
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("../views/sell_form.html");
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
		
		session_start();

		// sql to create table by the name of the city
		$sql = "CREATE TABLE store(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		image LONGBLOB,
		title VARCHAR(100),
		description VARCHAR(500),
		price VARCHAR(500),
		college VARCHAR(500),
		category VARCHAR(500),
		dns VARCHAR(100),
		putdate VARCHAR(30),
		username VARCHAR(100),
		contact VARCHAR(100)
		)";

		if ($conn->query($sql) === TRUE) {
				echo "store table created successfully";
			} else {
				//echo "Error creating table: " . $conn->error;
			}

		$date = date('Y-m-d H:i:s');

		$sql = "INSERT IGNORE INTO store (id, image, title, description, price, college, category, dns,  putdate, username, contact) VALUES (NULL, '".addslashes($_POST["pic"])."', '".addslashes($_POST["title"])."'".", "."'".addslashes($_POST["description"])."', '".addslashes($_POST["price"])."'".", '".$_SESSION["college"]."', "."'". $_POST["category"]."', '" .addslashes($_POST["dns"]). "', '".$date."', '" . $_SESSION["username"]."', '" . $_POST["contact"]."')";

								//}
		if ($conn->query($sql) === TRUE) 
		{
					echo "New record created successfully \n";
					require "../models/store.php";

				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
	}

?>
