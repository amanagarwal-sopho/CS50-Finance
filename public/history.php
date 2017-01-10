<?php
    
    //configuration
    require("../includes/config.php");
    
    //Selecting all rows from transactions
    $rows=CS50::query("SELECT * FROM transactions where user_id=?",$_SESSION["id"]);
    render("show_history.php",[ "positions" => $rows , "title" => "Transaction History"] );
    
?>