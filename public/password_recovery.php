<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("forgot_password.php", ["title" => "Change Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Check if username is not empty
        if(empty($_POST["username"])){
            apologize("Please provide the username");
        }
        else if(empty($_POST["new_password"])){
            apologize("Password is empty");
        }
        else if(strcmp($_POST["repeat_new_password"],$_POST["new_password"]) != 0){
            apologize("Password new password confirmation does not match the new original password");
        }
        //Proceed if user provided data
        else{
            
          //Selecting the right user, since we have unique names
          
        $select_user = CS50::query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        if(empty($select_user)){
            
            apologize("The username does not exist...");
        }
        else{
            
        $user_id = $select_user[0]["id"];
        $update_password = CS50::query("UPDATE users SET hash = ? WHERE id = ?", password_hash($_POST["new_password"], PASSWORD_DEFAULT),$user_id);
        redirect("/login.php");

        }
    
        }
    }

?>