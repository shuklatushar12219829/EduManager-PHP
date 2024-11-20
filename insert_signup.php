<?php 
    session_start();
    include('connection.php'); 
      $_SESSION['user2']=$_POST['user']; 
      $name = $_POST['name'];
      $username= $_POST['user'];  
      $password = $_POST['pass'];  
      $branch = $_POST['brnch']; 
      
    //$encrypted_password =  password_hash($password,PASSWORD_DEFAULT);
       // echo $encrypted_password;
      if(!empty($username))  
      { 
          $sql="SELECT * FROM students WHERE username = '$username'";
          $query = mysqli_query($conn,$sql) ;
          if(!$row = mysqli_fetch_array($query))  
          {
              $query = "INSERT INTO students (name,username,password,branch) VALUES ('$name','$username','$password','$branch')"; 
              $data = mysqli_query($conn,$query);
              if($data) 
              {
                 header('Location:index.html');
                  exit;
              }

          } 
          else 
          { 
              echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
              echo "<br>";
              echo "<a href=index.php>Go back to login page</a>";
          }
       }
       else
       {
            header('Location:signup.php');
            exit;   
       }
        mysqli_close($conn);
?>