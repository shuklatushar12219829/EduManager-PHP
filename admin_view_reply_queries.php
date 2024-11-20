<?php
include 'connection.php';

// Fetch all queries
$sql = "SELECT * FROM queries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View and Respond to Queries</title>
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

        hr {
            margin: 40px 0;
            border: 0;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>View and Respond to Queries</h1>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Query by: " . htmlspecialchars($row['student_username']) . "</strong></p>";
            echo "<p>" . htmlspecialchars($row['query_text']) . "</p>";

            if (!empty($row['response_text'])) {
                echo "<p><strong>Response:</strong> " . htmlspecialchars($row['response_text']) . "</p>";
            } else {
                echo '<form method="POST" action="reply_handling.php">
                        <textarea name="response_text" required placeholder="Enter your response here"></textarea>
                        <input type="hidden" name="query_id" value="' . $row['id'] . '">
                        <button type="submit" class="button">Reply</button>
                      </form>';
            }

            echo "<hr>";
        }
    } else {
        echo "<p>No queries found.</p>";
    }
    ?>
    <center>
        <a href="admin_dashboard.php" class="button">Back to Dashboard</a>
        <a href="admin_logout.php" class="button">Logout</a>
    </center>
</div>
</body>
</html>
