<?php
	
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("../views/register_form.php");
	}

	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{

		if(empty($_POST["password"]))
		{
			echo "You must provide password";
		}

		else

		{

		if ($_POST["password"] == $_POST["repassword"]) {
			
			$servername = "localhost";
			$username = "root"; //mysql username
			$password = "IlovemyindiA19!"; //mysql password

			// Create database
			// Database Should be created before connection
			$sql = "CREATE DATABASE buyandsell";
		
			// Create connection
			$conn = new mysqli($servername, $username, $password, "buyandsell");

			if ($conn->query($sql) === TRUE) {
			    echo "Database created successfully";
			} else {
			   // echo "Error creating database: " . $conn->error;
			}


			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			//echo "Connected successfully";

			

			// sql to create table by the name of the city
			$sql = "CREATE TABLE users(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			username VARCHAR(500) NOT NULL,
			email VARCHAR(500),
			college VARCHAR(500),
			password VARCHAR(500),
			gender VARCHAR(10)
			)";

			if ($conn->query($sql) === TRUE) {
				echo "users table created successfully";
			} else {
				//echo "Error creating table: " . $conn->error;
			}

			$sql = "INSERT IGNORE INTO users (id, username, email, college, password, gender) VALUES (NULL, "."'".addslashes($_POST["username"])."'".", "."'".addslashes($_POST["email"])."'".", '".$_POST["college"]."', "."'". $_POST["password"]."', '" . $_POST["gender"]."')";
				// WHERE NOT EXISTS ( SELECT college FROM ".strtolower($_POST["city"]). " WHERE college = "."'".$collegename."') LIMIT 1					}
				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully \n";

					echo "You are logged in";

                    session_start();

                    $_SESSION["loggedin"] = true;

                    $_SESSION["college"] = $_POST["college"];
                    $_SESSION["username"] = $_POST["username"];

                    require "../views/portfolio.php";

				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}

			
			
		}

		else
		{
			echo "Passwords do not match";
		}
	}
		
	}
?>
