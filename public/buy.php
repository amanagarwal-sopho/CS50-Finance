<?php
    
    //configuration
    require("../includes/config.php");
    
    //if user reached the page via GET(as by clicking a link or via redirect)
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("buy_form.php",["title" => "Buy Stock"]);
    }
    
    else if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $stock=lookup($_POST["symbol"]);
        
        if($stock==false)
        apologize("Stock Symbol Invalid.");
        else if(preg_match("/^\d+$/",$_POST["shares"])==false || $_POST["shares"]==0)
        apologize("Enter a valid number of shares");
        else
        {
        $row=CS50::query("SELECT * FROM users WHERE id=?",$_SESSION["id"]);
        
        if($stock["price"]*$_POST["shares"]>$row[0]["cash"])
        {
            apologize("Insufficient Funds");
        }
        
        else
        {
            $cost=$stock["price"]*$_POST["shares"];
            CS50::query("INSERT INTO portfolios (user_id,symbol,share) VALUES(?,?,?) ON DUPLICATE KEY UPDATE share=share+ VALUES(share)",$_SESSION["id"],strtoupper($_POST["symbol"]),$_POST["shares"]);
            CS50::query("UPDATE users SET cash= cash - ? WHERE id=?",$cost,$_SESSION["id"]);
            CS50::query("INSERT INTO transactions (user_id,type,symbol,price,shares,time) VALUES(?,'BUY',?,?,?,CURRENT_TIMESTAMP)",$_SESSION["id"],$_POST["symbol"],$stock["price"],$_POST["shares"]);
            
        }
        
        }
        
        redirect("index.php");
    }
    
?>