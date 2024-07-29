<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "your_server_name";
$username = "root"; 
$password = ""; 
$dbname = "your_db_name"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    
    if ($user && $email && $mobile && $pass) {
        $stmt = $conn->prepare("INSERT INTO users (username, email, mobile, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $user, $email, $mobile, $pass);
        if ($stmt->execute()) {
            header("Location: login.html");
            exit(); 

        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in all fields.";
    }
}
$conn->close();
?>
