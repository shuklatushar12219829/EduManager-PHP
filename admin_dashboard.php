<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: admin_login.html");
    exit();
}

// Include the database connection file
include('connection.php');

// Fetch the user’s name from the session
$name = $_SESSION['name'];

// Fetch internship details from the database (if applicable)
// $internships = []; // This would typically be fetched from your database

// Example query to fetch internships
// $query = "SELECT * FROM internships WHERE user_id = " . $_SESSION['user_id'];
// $result = mysqli_query($conn, $query);
// while($row = mysqli_fetch_assoc($result)) {
//     $internships[] = $row;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: "Lucida Console", "Courier New", monospace;
            background-color: #bfcba8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #464f41;
            font-size: 35px;
            margin-bottom: 20px;
        }

        p {
            color: #464f41;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .button {
            text-decoration: none;
            color: white;
            background-color: #5b8a72;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 20px;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #56776c;
        }
    </style>
</head>
<body>
<div class="centered">
    <center><img src="logo4.jpg" alt="CMRCET" width="600px"></center>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($name); ?>!</h1>
        <p>You are logged in.</p>
        <a href="view_internships.php" class="button">View Internships</a>
        <a href="admin_view_reply_queries.php" class="button">Queries</a>
        <a href="logout.php" class="button">Logout</a>
    </div>
</div>
</body>
</html>
