<?php
// Start the session
session_start();

// Check if the student is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: index.html");
    exit();
}

// Include the database connection file
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_username = $_SESSION['username']; // Retrieve from session
    $query_text = $_POST['query_text'];

    $sql = "INSERT INTO queries (student_username, query_text) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $student_username, $query_text);

    if ($stmt->execute()) {
        echo "Query submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Query</title>
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
            width: 80%;
            max-width: 600px;
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

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            resize: none;
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
<div class="container">
    <h1>Submit Your Query</h1>
    <form action="" method="post">
        <textarea name="query_text" placeholder="Enter your query here" required></textarea>
        <button type="submit" class="button">Submit Query</button>
    </form>
    <a href="student_dashboard.php" class="button">Back to Dashboard</a>
    <a href="student_response_view.php" class="button">View Responses</a>
</div>
</body>
</html>
