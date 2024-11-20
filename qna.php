<?php
    include('connection.php');
    session_start();

    if(!isset($_SESSION['status'])) {
        header('Location: index.html');
        exit;
    }

    $username = $_SESSION['user2'];
    $branch = $_SESSION['branch1'];

    $username = stripcslashes($username);   
    $username = mysqli_real_escape_string($conn, $username); 
    $branch = stripcslashes($branch);   
    $branch = mysqli_real_escape_string($conn, $branch);

    $sql = "SELECT name, username, branch FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        echo "Username - " . htmlspecialchars($row['username']) . "<br>";
        echo "Name - " . htmlspecialchars($row['name']) . "<br>";
        echo "Branch - " . htmlspecialchars($row['branch']) . "<br>";
    } else {
        echo "No user found.<br>";
    }

    $stmt->close();
?>

<html>
<title>Question and Answers</title>
<body>
    <form name="f3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">  
        <p>  
            <label> Question:</label>  
            <input type="text" placeholder="Ask a question" id="q" name="q" />  
        </p>  
        <input type="submit" id="btn" value="ASK" />  
    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['q'])) {
            $q = $_POST['q'];
            $q = stripcslashes($q);   
            $q = mysqli_real_escape_string($conn, $q); 

            // Assuming you want to insert the question into the qna table
            $sql = "INSERT INTO qna (qroll, question) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $q);
            $stmt->execute();

            // Fetch the latest question for display
            $sql = "SELECT * FROM qna ORDER BY qno DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
              // echo "QNo: " . htmlspecialchars($row['qno']) . "<br>";
              echo "User: " . htmlspecialchars($row['qroll']) . "<br>";
              echo "Question: " . htmlspecialchars($row['question']) . "<br>";
          }
          

            $stmt->close();
        }
    }

    $conn->close();
?>
</body>
</html>
