<?php
session_start();
?>
<html>
<head>
<title>Admin signup page</title>
<meta name="viewport" content="width=device-width, initial-scale=0.75">
<link rel="stylesheet" href="external_css_signup.css">
</head>
<body>
    <div class="centered">
        <center><img src="logo4.png" alt="CMRCET" width="600px"></center>
    <center><p class="enter">ENTER YOUR CREDENTIALS</p></center>
    <div class="login_box">
<form name="f1" action = "insert_admin_signup.php"  method = "POST">  
            <p>  
                <label> Name: </label>  
                <input type = "text" placeholder="Enter name" id ="name" name  = "name" />  
            </p> 
            <p>  
                <label> UserName: </label>  
                <input type = "text" placeholder="Enter username" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" placeholder="Enter password" id ="pass" name  = "pass" />  
            </p>  
            <p>    
                <input type =  "submit" id = "btn" value = "SIGNUP" />  
            </p> 
        </form>  
</div>
<div class="text">
 <p>Already have an account?<a href="admin_login.html">Login</a></p>
</div>
</div>
</body>        
        
</html>