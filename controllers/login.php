<?php
	

	if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        render("/views/login_form.php");
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            echo "You must provide your username.";
        }
        else if (empty($_POST["password"]))
        {
            echo "You must provide your password.";
        }
        // query database for user
       /* $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
                $_SESSION["cash"] = $row["cash"];
                // redirect to portfolio
                redirect("/");
            }
        }
        // else apologize
        apologize("Invalid username and/or password.");*/
    }
?>