<?php
session_start();

// Check if the student is logged in
if (isset($_SESSION['student_status'])) { // Assuming 'student_status' is used to track student login
    header('Location: index.html'); // Redirect to the student login page
    exit;
}

include('connection.php'); // Ensure the connection file is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $pre_requisites = mysqli_real_escape_string($conn, $_POST['pre_requisites']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);

    // Insert the data into the internships table
    $query = "INSERT INTO internships (name, branch, company_name, location, pre_requisites, link) 
              VALUES ('$name', '$branch', '$company_name', '$location', '$pre_requisites', '$link')";

    if (mysqli_query($conn, $query)) {
        echo "Internship details uploaded successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: "Lucida Console", "Courier New", monospace;
            background-color: #bfcba8;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #464f41;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #464f41;
        }

        input[type="text"],
        input[type="url"],
        select {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #5b8a72;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #56776c;
        }

        .logout {
            text-align: right;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        a {
            text-decoration: none;
            color: #464f41;
        }
    </style>
</head>

<body>

    <div class="logout">
        <a href="student_dashboard.php">HOME |</a>
        <a href="logout.php">LOGOUT</a>
    </div>

    <div class="container">
        <h2>Upload Internship Details</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="branch">Branch:</label>
            <select id="branch" name="branch" required>
                <option value="CSE">CSE</option>
                <option value="MEC">MEC</option>
                <option value="ECE">ECE</option>
            </select>

            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="pre_requisites">Pre-Requisites:</label>
            <input type="text" id="pre_requisites" name="pre_requisites">

            <label for="link">More Information (URL):</label>
            <input type="url" id="link" name="link">

            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>
