<?php
// Start the session
session_start();

// Include the database connection file
include('connection.php');

// Get the values from the login form
$username = $_POST['user'];
$password = $_POST['pass'];

// Prepare and execute a query to get the user record
$stmt = $conn->prepare("SELECT id, name, password FROM admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user was found
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['password'])) {
        // Authentication successful
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $user['name'];
        header('Location: admin_dashboard.php');
              exit;
    } else {
        // Incorrect password
        echo "<script type='text/javascript'>
                alert('Invalid username or password.');
                window.location.href = 'admin_login.html'; // Redirect back to login page
              </script>";
    }
} else {
    // No user found with that username
    echo "<script type='text/javascript'>
            alert('Invalid username or password.');
            window.location.href = 'admin_login.html'; // Redirect back to login page
          </script>";
}

// Close the connection
$stmt->close();
$conn->close();
?>
