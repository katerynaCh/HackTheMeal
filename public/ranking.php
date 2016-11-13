<?php

    // configuration
    require("../includes/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("ranking.php", ["title" => "Ranking"]);
    }
    
  
    
?>