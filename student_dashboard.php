<?php
session_start();
if(!isset($_SESSION['status'])) {
    header('Location:index.html');
    exit;
}
include('connection.php'); 

$username = $_SESSION['user2'];
// To prevent from MySQL injection  
$username = stripcslashes($username);   
$username = mysqli_real_escape_string($conn, $username);  
$sql = "SELECT name FROM students WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful and returned a result
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
} else {
    $name = "Guest"; // Default value or handle the case appropriately
}

mysqli_close($conn);  
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        .b1 { grid-area: 1 / 1 / 1 / 1; }
        .b2 { grid-area: 1 / 2 / 1 / 2; }
        .b3 { grid-area: 1 / 3 / 1 / 3; }
        .b4 { grid-area: 1 / 4 / 1 / 4; }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: "Lucida Console", "Courier New", monospace;
            background-color: #bfcba8;
        }
        .logout {
            text-align: right;
        }
        .header {
            text-align: left;
            color: #464f41;
            font-size: 35px;
        }
        .links {
            color: white;
        }
        .grid-container {
            display: grid;
            color: white;
            grid-template-columns: auto auto auto auto;
            grid-template-rows: auto;
        }
        .b1,
        .b2,
        .b3,
        .b4 {
            padding: 10px;
            height: 300px; /* Remove the comment */
        }
        a {
            text-decoration: none;
            color: #464f41;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="logout">
        <a href="logout.php">LOGOUT</a>
    </div>
    <div class="centered">
        <center><img src="logo4.jpg" alt="CMRCET" width="600px"></center>
        <div class="header">
            <h4><?php echo "Welcome, " . $name . " :)"; ?></h4>
        </div>
        <div class="grid-container">
            <div class="b1" style="background-color:#56776c;">
                <form name="f1" action="upload_internships.php" method="POST">
                    <a href="upload_internships.php"><div class="links">INTERNSHIPS</div></a>
                </form>
            </div>
            <div class="b2" style="background-color:#5b8a72;">
                <form name="f1" action="time_table.php" method="POST">
                    <a href="time_table.php"><div class="links">TIME TABLE</div></a>
                </form>
            </div>
            <div class="b3" style="background-color:#56776c;">
                <form name="f1" action="todo.php" method="POST">
                    <a href="todo.php"><div class="links">TO-DO</div></a>
                </form>
            </div>
            <div class="b4" style="background-color:#5b8a72;">
                <form name="f1" action="personal.php" method="POST">
                    <a href="personal.php"><div class="links">EDIT PROFILE</div></a>
                </form>
            </div>
            <div class="b5" style="background-color:#5b8a72;">
                <form name="f1" action="query_submit.php" method="POST">
                    <a href="query_submit.php"><div class="links">Q & A</div></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
