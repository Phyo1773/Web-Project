<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe";
$table_name="order";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderId = $_POST["orderId"];
    $customerName = $_POST["customerName"];
    $phoneNumber = $_POST["phoneNumber"];
    $productDetails = $_POST["productDetails"];
    $amount = $_POST["amount"];
    $deliveryAddress = $_POST["deliveryAddress"];
    $deliveryDateTime = $_POST["deliveryDateTime"];
    $otherInformation = $_POST["otherInformation"];

    
    $stmt = $conn->prepare("INSERT INTO `$table_name` (orderId, customerName, phoneNumber, productDetails, amount, deliveryAddress, deliveryDateTime, otherInformation)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    
    if ($stmt === false) {
        die("Error in prepare(): " . $conn->error);
    }

  
    $stmt->bind_param("ssssisss", $orderId, $customerName, $phoneNumber, $productDetails, $amount, $deliveryAddress, $deliveryDateTime, $otherInformation);

   
    if ($stmt->execute()) {
        header("Location:history.php?orderId=" . $orderId);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
