<?php
$servername = "your_server_name";
$username = "root"; 
$password = ""; 
$dbname = "your_db_name"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
       header("Location: page1.html"); 
       exit();
    } 
    else 
    {
        
        echo "Enter correct username or password ";
         
    }
}

$conn->close();
?>
