<?php

    // configuration
    require("../includes/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("diary.php", ["title" => "Diary"]);
        
    }
    
  
    
?>