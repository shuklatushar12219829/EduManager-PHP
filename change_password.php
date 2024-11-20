<?php
     session_start();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
a{
    text-decoration: none;
}
.center {
  position: relative;
  top: 40%;
  width: 100%;
  text-align: center;
}
body{
    background-color:#bfcba8;
    color:#464f41;
    font-family: "Lucida Console", "Courier New", monospace;
    text-align : center;
    font-size : 35px;
}
</style>
<body>
<div class="center">
<?php
include('connection.php'); 
    $_SESSION['pass1'] =$_POST['pass']; 
    $_SESSION['newp'] =$_POST['newpass'];
      $username= $_SESSION['user2'];  
      $password = $_SESSION['pass1'];  
      $newpass = $_SESSION['newp']; 
          $sql="select password FROM login WHERE username = '$username' and password = '$password'";
          $query = mysqli_query($con,$sql) ;
          if($row = mysqli_fetch_array($query))  
          {
              $query = "UPDATE login set password = '$newpass' where username = '$username'"; 
              $data = mysqli_query($con,$query);
              if($data) 
              {
                  echo "Password Changed Successfully!";
                  echo "<br>";
                  echo "<a href=personal.php>GO BACK TO MY PROFILE</a>";
              }

          } 
          else 
          { 
              echo"WRONG PASSWORD!"; 
              echo "<p position = center><a href=personal.php>GO BACK TO MY PROFILE</a></p>";
          }
        mysqli_close($con);?>
</div>
</body>
</html>