<?php      
    include('connection.php'); 
    session_start();
        $_SESSION['branch1']=$_POST['brnch'];
            $_SESSION['status']="active"; 
    $_SESSION['user2']=$_POST['user'];  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    $branch = $_POST['brnch'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $branch= stripcslashes($branch);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
        $branch = mysqli_real_escape_string($conn, $branch);  
        
    
        $sql = "select * from students where username = '$username' and password = '$password' and branch='$branch'"; 
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['student_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $username;
              header('Location: student_dashboard.php');
              exit;
        }  
        else{  
            include('login_fail.php');
        }  
       ?>