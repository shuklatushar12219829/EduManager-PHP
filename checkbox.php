<?php
    include('connection.php');
    
    if(isset($_POST['ticked']))   
    {
       foreach ($_POST["ticked"] as $assignment)
       {
           // Use a prepared statement to prevent SQL injection and improve security
           $stmt = $conn->prepare("DELETE FROM todo WHERE assignment = ?");
           $stmt->bind_param("s", $assignment);

           if($stmt->execute()) {
               // Optional: You can add logging here if needed
           } else {
               // Error handling if the query fails
               echo "ERROR: Could not execute. " . $stmt->error;
           }

           $stmt->close();
       }
    }
   
    // Redirect to todo.php after processing
    header('Location:todo.php');
    exit; 
?>
