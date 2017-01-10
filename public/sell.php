<?php
    
    //configuration
    require("../includes/config.php");
    
    //if user reached the page via GET(as by clicking a link or via redirect)
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {  
        $symbols=CS50::query("SELECT symbol FROM portfolios WHERE user_id=?",$_SESSION["id"]);
        render("sell_form.php" ,["symbols" => $symbols , "title" => "Sell"]);
    }
    
    else if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        if(isset($_POST["symbol"]))
        {
            $row=CS50::query("SELECT share FROM portfolios WHERE user_id=? AND symbol=?",$_SESSION["id"],$_POST["symbol"]);
            $stock=lookup($_POST["symbol"]);
            $cash=$row[0]["share"]*$stock["price"];
            
            CS50::query("DELETE FROM portfolios WHERE user_id=? AND symbol=?",$_SESSION["id"],$_POST["symbol"]);
            //update cash
            CS50::query("UPDATE users SET cash= ? + cash where id=?",$cash,$_SESSION["id"]);
            //update transactions
            CS50::query("INSERT INTO transactions (user_id,type,symbol,price,shares,time) 
                         VALUES(?,'SELL',?,?,?,CURRENT_TIMESTAMP)",
                         $_SESSION["id"],$_POST["symbol"],$stock["price"],$row[0]["share"]);
            
        }
        
        else
        apologize("Please Select a Stock to Sell");
        
        redirect("/");
    }
?>