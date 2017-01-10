<?php

    // configuration
    require("../includes/config.php"); 
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        render("password_form.php",["title" => "Change Password"]);
    }
    
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        if(!isset($_POST["currp"])|| !isset($_POST["newp"]) || !isset($_POST["confirmp"]))
        apologize("Password not entered");
        
        else if($_POST["confirmp"]!=$_POST["newp"])
        apologize("Password confirmation failed");
        
        else
        {
            $row=CS50::query("SELECT * FROM users where id=?",$_SESSION["id"]);
            if(password_verify($_POST["currp"], $row[0]["hash"]) )
                {
                    //password updated
                    CS50::query("UPDATE users SET hash=? WHERE id=?",password_hash($_POST["newp"],PASSWORD_DEFAULT),$_SESSION["id"]);
                    render("change_success.php",["title" => "Change Successful"]);
                    
                }
        
            else
            apologize("Incorrect Password Try Again..!!");
        }
    }
?>