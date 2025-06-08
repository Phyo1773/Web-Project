<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];

    $sql = "DELETE FROM `product` WHERE `title` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $title);

    if ($stmt->execute()) {
        echo "Product with title '$title' deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
