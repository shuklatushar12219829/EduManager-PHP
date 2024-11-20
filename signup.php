<?php
session_start();
?>
<html>
<head>
<title>signup page</title>
<meta name="viewport" content="width=device-width, initial-scale=0.75">
<link rel="stylesheet" href="external_css_signup.css">
</head>
<body>
    <div class="centered">
    <center><p class="enter">ENTER YOUR CREDENTIALS</p></center>
    <div class="login_box">
<form name="f1" action = "insert_signup.php"  method = "POST">  
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
                <label> Branch: </label>  
                <!--  <input type = "text" id ="brnch" name  = "brnch" />  -->
                <select name="brnch" id="brnch">
                <option value="CSE">CSE</option>
                    <option value="CSM">CSM</option>
                    <option value="AIML">AIML</option>
                    <option value="CSD">CSD</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="CIVIL">CIVIL</option>
                    <option value="MECH">MECH</option>
                  </select>
                              <p>     
                <input type =  "submit" id = "btn" value = "SIGNUP" />  
            </p>
            

            
            
        </form>  
</div>
<div class="text">
 <p>Already have an account?<a href="index.html">Login</a></p>
</div>
</div>
</body>        
        
</html>