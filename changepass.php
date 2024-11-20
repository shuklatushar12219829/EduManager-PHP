<?php
session_start();
    if(!isset($_SESSION['status']))
    {
        header('Location:index.php');
        exit;
    }
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="external_css_signup.css">
<style>
body{
    background-color:#bfcba8;
    color:#464f41;
    font-family: "Lucida Console", "Courier New", monospace;
}
a
{
    text-decoration : none;
}
.logout
{
    text-align : right;
}
p
{
    color :white;
}
</style>
</head>
<title>Change Password</title>
<body>
<div class = "logout">
<a href = "personal.php">MY PROFILE </a>
</div>

<div class ="centered">

<form name="f1" action = "change_password.php"  method = "POST">  
            <p>  
                <label> Old Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p> 
            <p>  
                <label> New Password: </label>  
                <input type = "password" id ="newpass" name  = "newpass" />  
            <p>
                <input type =  "submit" id = "btn" value = "Change Password" /> 
            </p> 
            </p>
</form>
</div>

</body>
</html>