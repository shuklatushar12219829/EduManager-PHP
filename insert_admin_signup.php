<?php
// Start the session
session_start();

// Include the database connection file
include('connection.php');

// Get the values from the form
$name = $_POST['name'];
$user = $_POST['user'];
$pass = $_POST['pass'];

// Hash the password
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO admin (name, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $user, $hashed_pass);

// Execute the statement
if ($stmt->execute()) {
    echo "<script type='text/javascript'>
            alert('Signup successful!');
            window.location.href = 'admin_login.html'; // Redirect to the login page
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
