<?php
$servername = "localhost";
$username = "root"; // Change this if your database has a different username
$password = ""; // Change this if your database has a password
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check credentials
    $sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
             echo "<script>alert('Logged in.'); window.location.href='shopee.html';</script>";
        // Redirect to dashboard or home page
    } else {
         echo "<script>alert('Wrong Usernamd/Password.'); window.location.href='index.html';</script>";
    }
}

$conn->close();
?>