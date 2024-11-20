<?php
session_start(); // Assuming admin is logged in
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query_id = $_POST['query_id'];
    $response_text = $_POST['response_text'];

    $sql = "UPDATE queries SET response_text = ?, responded_at = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $response_text, $query_id);

    if ($stmt->execute()) {
        echo "Response submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Redirect back to the admin view
    header("Location: admin_view_reply_queries.php");
    exit();
}
?>
