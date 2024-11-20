<?php
session_start();

// Check if the admin is logged in
if (isset($_SESSION['admin_status'])) { // Assuming 'admin_status' is used to track admin login
    header('Location: admin_login.html'); // Redirect to the admin login page
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .logout {
            text-align: right;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            border-color: black;
        }

        td {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #464f41;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #464f41;
            color: white;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        h2 {
            color: #464f41;
            font-family: "Lucida Console", "Courier New", monospace;
        }
    </style>
</head>

<body bgcolor="#bfcba8">

    <div class="logout">
        <a href="admin_dashboard.php">HOME |</a>
        <a href="admin_logout.php">LOGOUT</a>
    </div>

    <center><div><h2>View Internships</h2>

    <form name="f1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p>
            <label> Branch: </label>
            <select name="bnch" id="brnch">
                    <option value="CSE">CSE</option>
                    <option value="CSM">CSM</option>
                    <option value="AIML">AIML</option>
                    <option value="CSD">CSD</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="CIVIL">CIVIL</option>
                    <option value="MECH">MECH</option>
            </select>
        </p>
        <p>
            <input type="submit" id="btn" value="GO" />
        </p>
    </form></div></center>

    <?php
    include('connection.php'); // Ensure the connection file is included

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $branch = $_POST['bnch'];
        if (!empty($branch)) {
            // Execute the query based on the selected branch
            $result = mysqli_query($conn, "SELECT * FROM internships WHERE branch = '$branch'");

            // Check if the query was successful and if any rows were returned
            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table id='customers'>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>BRANCH</th>
                        <th>COMPANY NAME</th>
                        <th>LOCATION</th>
                        <th>PRE-REQUISITES</th>
                        <th>For More Info</th>
                    </tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['intership_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['branch']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['company_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['pre_requisites']) . "</td>";
                    $internship_link = '<a href="' . htmlspecialchars($row['link']) . '">Click Here</a>';
                    echo "<td>" . $internship_link . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<center>No internships found for the selected branch.</center>";
            }
        } else {
            echo "Please select a branch.";
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
</body>

</html>
