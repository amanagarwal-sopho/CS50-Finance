<?php

    // configuration
    require("../includes/config.php"); 
    
    //Select all stocks from portfolios
    $rows=CS50::query("SELECT * FROM portfolios WHERE user_id=?",$_SESSION["id"]);
    $positions=[];
    
    //creates an array that contains details along with current stock prices
    foreach ($rows as $row)
    {
        $stock=lookup($row["symbol"]);
        if($stock!==false)
        {
            $positions[]=[ "name" => $stock["name"],
                        "price" => $stock["price"],
                        "shares" => $row["share"],
                        "symbol" => $row["symbol"]
                        ];
        }
    }
    
    //determine cash the user has
    $balance=CS50::query("SELECT cash FROM users WHERE id=?",$_SESSION["id"]);
    render("portfolio.php", ["positions" => $positions , "title" => "Portfolios","balance" => $balance[0]["cash"]]);
    

?>
