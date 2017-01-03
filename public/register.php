<?php

    //configuration
    require("../includes/config.php");
    
    //if user reached the page via GET(as by clicking a link or via redirect)
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("register_form.php",["title" => "Register"]);
    }
    
    
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        if(empty($_POST["username"]))
        apologize("Username not entered");
        else if (empty($_POST["password"]))
        apologize("Enter a Password");
        else if (empty($_POST["confirmation"]))
        apologize("Confirm your password ");
        else if ($_POST["password"]!=$_POST["confirmation"])
        apologize("Passwords do not match try again.");
        else
        {
            $insert_user=CS50::query("INSERT IGNORE INTO users (username,hash,cash) VALUES(?,?,10000.0000)",$_POST["username"],password_hash($_POST["password"],PASSWORD_DEFAULT));
            if($insert_user==0)
                apologize("Username already exists.TRY AGAIN");
        
            $rows=CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id=$rows[0]["id"];
        
            $_SESSION["id"]=$id;
        
            redirect("index.php");
        }
        
    }
    
?>