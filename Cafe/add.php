<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your MySQL database
    $servername = "localhost"; // Change this to your server name
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "cafe"; // Change this to your MySQL database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO product (title, price, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $title, $price, $image);
    
    // Set parameters and execute
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/"; // Create a directory named 'uploads' to store uploaded images
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
