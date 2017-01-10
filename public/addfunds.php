<?php

    // configuration
    require("../includes/config.php"); 
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        render("addfunds_form.php",["title" => "Add Funds"]);
    }
    
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        //Amount limited to 10000
        if($_POST["amount"]<=0 || $_POST["amount"]> 10000)
        {
            apologize("Please enter a valid amount");
        }
        //Update cash
        else
        {
            CS50::query("UPDATE users SET cash = cash + ? WHERE id=?",$_POST["amount"],$_SESSION["id"]);
            render("add_success.php",["title" => "Funds added successfully"]);
        }
    }
    
?>