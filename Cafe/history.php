<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
            background-image: url(images/h1.jpeg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        h1 {
            color: #008080;
        }

        .order-details {
           
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order-details p {
            margin: 10px 0;
        }

        .error-message {
            color: #d9534f;
            margin-top: 20px;
        }

        .go-back-btn {
            background-color: #573306;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .go-back-btn:hover {
            background-color: #888;
        }

        .go-back-btn:active {
            transform: translateY(1px);
        }

    </style>
       <script>
        function goBack() {
        window.location.href = "Home.php";
        alert('Logout functionality to be implemented.');
        }
    </script>
    <title>Order Voucher</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe";
$table_name = "order";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orderId = $_GET["orderId"];

$stmt = $conn->prepare("SELECT * FROM `$table_name` WHERE orderId = ?");
$stmt->bind_param("s", $orderId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $orderDetails = $result->fetch_assoc();

    echo "<div class='order-details'>";
    echo "<h1>Order Voucher</h1>";
    echo "<p><strong>Order ID:</strong> " . $orderDetails["orderId"] . "</p>";
    echo "<p><strong>Customer Name:</strong> " . $orderDetails["customerName"] . "</p>";
    echo "<p><strong>Product Name:</strong> " . $orderDetails["productDetails"] . "</p>";
    echo "<p><strong>Amount:</strong> " . $orderDetails["amount"] . "</p>";
    echo "<p><strong>Delivery Address:</strong> " . $orderDetails["deliveryAddress"] . "</p>";
    echo "<p><strong>Delivery Time:</strong> " . $orderDetails["deliveryDateTime"] . "</p>";
    echo "</div>";
} else {
    echo "<p class='error-message'>Order not found.</p>";
}

$stmt->close();
$conn->close();
?>
<button class="go-back-btn" onclick="goBack()">Back To Home</button>
</body>
</html>