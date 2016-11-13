<?php

    // configuration
    require("../includes/config.php");
    

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Check if username is not empty
        if(empty($_POST["username"])){
            apologize("Please provide the username");
        }
        else if(empty($_POST["password"])){
            apologize("Password is empty");
        }
        else if(empty($_POST["first_name"])){
            apologize("First name is empty");
        }
        else if(empty($_POST["last_name"])){
            apologize("Last name is empty");
        }
        else if(strcmp($_POST["password"],$_POST["confirmation"]) != 0){
            apologize("Password confirmation does not match the original password");
        }
        //Proceed if user provided data
        else{
            
            $energy = rand(1000,6000);
            
$insert_result = CS50::query("INSERT IGNORE INTO diner (fname,lname, hash, username,energyneed) VALUES(?,?, ?, ?, ?)",
$_POST["first_name"],$_POST["last_name"], password_hash($_POST["password"], PASSWORD_DEFAULT),
$_POST["username"],$energy);
        
        if($insert_result == 0){
            apologize("The name you chose already exists");
        }
        
        else{
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;

            redirect("/");
            
        }
            
    
        }
    }

?>