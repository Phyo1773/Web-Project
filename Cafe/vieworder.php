<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            background: url(images/h1.jpeg) no-repeat center center fixed;
            background-size: cover;
 
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #573306;
            text-align: center;
            margin-bottom: 30px;
        }
        .order-item {
        border-bottom: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px; /* Adjust the margin-bottom value as needed */
        position: relative;
        }

        .order-item:last-child {
            border-bottom: none;
        }
        .delete-btn {
            color: #fff;
            background-color: #573306;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .delete-btn:hover {
            background-color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order History</h2>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cafe";
        $table_name = "order";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // If delete action is requested
        if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete_query = "DELETE FROM `$table_name` WHERE orderId=?";
            $stmt = $conn->prepare($delete_query);
            $stmt->bind_param("s", $id);
            if($stmt->execute()) {
                echo "<div style='color: green;'>Record deleted successfully.</div>";
                echo "<script>window.location.reload();</script>";
            } else {
                echo "<div style='color: red;'>Error deleting record: " . $conn->error . "</div>";
            }
            $stmt->close();
        }

        // Retrieve all data from the table
        $sql = "SELECT * FROM `$table_name`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='order-item'>";
                echo "<strong>Order ID:</strong> " . $row["orderId"]. "<br>";
                echo "<strong>Customer Name:</strong> " . $row["customerName"]. "<br>";
                echo "<strong>Phone Number:</strong> " . $row["phoneNumber"]. "<br>";
                echo "<strong>Product Details:</strong> " . $row["productDetails"]. "<br>";
                echo "<strong>Amount:</strong> " . $row["amount"]. "<br>";
                echo "<strong>Delivery Address:</strong> " . $row["deliveryAddress"]. "<br>";
                echo "<strong>Delivery Date Time:</strong> " . $row["deliveryDateTime"]. "<br>";
                echo "<strong>Other Information:</strong> " . $row["otherInformation"]. "<br>";
                echo "<a class='delete-btn' href='?action=delete&id=".$row['orderId']."'>Delete</a>";
                echo "</div>";
            }
        } else {
            echo "<div style='color: #666;'>No results found.</div>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
