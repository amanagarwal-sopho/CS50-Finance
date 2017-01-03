<?php
    
    //configuration
    require("../includes/config.php");
    
    //if user reached the page via GET(as by clicking a link or via redirect)
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("quote_form.php",["title" => "Quote"]);
    }
    
    else if($_SERVER["REQUEST_METHOD"]== "POST" )
    {
        if(empty($_POST["symbol"]))
        apologize("Please enter a stock symbol to get quotes");
        
        else
        {   
            $stock=lookup($_POST["symbol"]);
            if($stock==false)
            apologize("Stock symbol is invalid.");
            else
            render("quote.php",$stock);
        }
    }
    
?>