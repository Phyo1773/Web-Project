<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = $conn->prepare("SELECT * FROM login WHERE username=? AND password=?");
$sql->bind_param("ss", $username, $password);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: ads.php");
    exit();
} else {
    echo "Login failed. Please check your username and password.";
}

$conn->close();
?>
