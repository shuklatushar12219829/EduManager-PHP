<?php 
include('connection.php');

session_start();
$user = $_SESSION['user2'];
$assignment = $_POST['assgn'];
$due_date = $_POST['dt'];

// Sanitize inputs
$user = stripcslashes($user);   
$assignment = stripcslashes($assignment);  
$due_date = stripcslashes($due_date);

$user = mysqli_real_escape_string($conn, $user); 
$assignment = mysqli_real_escape_string($conn, $assignment); 
$due_date = mysqli_real_escape_string($conn, $due_date);

// Check if the provided date is in the future
$currentDate = date('Y-m-d H:i:s');
if ($due_date < $currentDate) {
    mysqli_close($conn);
    header('Location: todo.php');
    exit;
}

// Use prepared statements to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO todo (user, assignment, due_date) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $assignment, $due_date);

if ($stmt->execute()) {
    header('Location: todo.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
exit;

?>
