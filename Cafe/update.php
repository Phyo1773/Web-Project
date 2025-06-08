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
    $price = $_POST["price"];

    if ($_FILES["image"]["size"] > 0) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . uniqid() . "_" . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $sql = "UPDATE `product` SET `price`=?, `image`=? WHERE `title`=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $price, $targetFile, $title);
        } else {
            echo "Error uploading image.";
            exit();
        }
    } else {
        $sql = "UPDATE `product` SET  `price`=? WHERE `title`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $price, $title);
    }

    if ($stmt->execute()) {
        echo "Product updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
