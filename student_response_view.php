<?php
include 'connection.php';
session_start();

// Check if the student is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: index.html");
    exit();
}

$student_username = $_SESSION['username'];

// Fetch the student's queries
$sql = "SELECT * FROM queries WHERE student_username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $student_username);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Queries and Responses</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            overflow-y: auto;
            max-height: 90vh;
        }

        h1 {
            color: #464f41;
            font-size: 35px;
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
        p {
            color: #464f41;
            font-size: 20px;
            margin-bottom: 20px;
        }

        hr {
            margin: 40px 0;
            border: 0;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Your Queries and Responses</h1>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Your Query:</strong></p>";
            echo "<p>" . htmlspecialchars($row['query_text']) . "</p>";

            if (!empty($row['response_text'])) {
                echo "<p><strong>Response:</strong> " . htmlspecialchars($row['response_text']) . "</p>";
            } else {
                echo "<p><strong>Response:</strong> Awaiting response...</p>";
            }

            echo "<hr>";
        }
    } else {
        echo "<p>You have not submitted any queries yet.</p>";
    }
    ?>
    <center>
        <a href="student_dashboard.php" class="button">Back to Dashboard</a>
        <a href="query_submit.php" class="button">Submit a Query</a>
        <a href="logout.php" class="button">Logout</a>
    </center>
</div>
</body>
</html>
