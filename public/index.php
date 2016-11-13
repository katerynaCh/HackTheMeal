<?php

    // configuration
    require("../includes/config.php");
    
     $user = CS50::query("SELECT fname FROM diner WHERE id = ?", $_SESSION["id"]);
     $sur = CS50::query("SELECT lname FROM diner WHERE id = ?", $_SESSION["id"]);
      $e = CS50::query("SELECT energyneed FROM diner WHERE id = ?", $_SESSION["id"]);
     $name = $user[0]["fname"];
     $energy = $e[0]["energyneed"];
     $surname = $sur[0]["lname"];
     
    
    render("dashboard.php", ["title" => "Dashboard", "fname" => $name, "lname" => $surname , "energy"=>$energy]);
    


    
    //apologize($_SESSION["id"]);
    
    
?>
