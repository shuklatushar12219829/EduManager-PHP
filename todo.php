<?php
session_start();
    if(!isset($_SESSION['status']))
    {
        header('Location:index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
.logout {
    text-align: right;
}
</style>
<head>
<title>To do page</title>
<link rel="stylesheet" href="external_css_todo.css">
</head>
<body>
<div class ="logout">
<a href="student_dashboard.php">HOME |</a>
<a href="logout.php"  ="right"> LOGOUT</a>
</div>
<h2>Find out your pending works here!</h2>
<div class="works">
<form name="f2" action="insert_to_do.php" method = "POST" >  
            <p>  
                <label> ASSIGNMENT: </label>  
                <input type = "text" placeholder="Enter the assignment" id ="assgn" name  = "assgn" />  
            </p>  
            <p>  
                <label> DEADLINE: </label>  
                <input type = "datetime-local" id ="dt" name = "dt" >  
            </p> 
              
 
            <p>     
                <input type =  "submit" id = "btn" value = "INSERT" />  
            </p>  
 
</form>  
</div>
        <?php 
            include('display_to_do.php');
        ?>
</body>
</html>