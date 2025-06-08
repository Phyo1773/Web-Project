<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
        text-align: center;
        font-family:'Times New Roman', Times, serif;
        background-image: url(images/h1.jpeg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-weight:bold;
         }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #573306;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #888;
        }

        
        .go-back-btn {
        position: absolute;
        top: 10px;
        left: 10px; /* Adjust left positioning */
        padding: 10px;
        background-color: #573306;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        .go-back-btn:hover {
        background-color: #888;
        }

    </style>

<script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_title = $_POST["search_title"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cafe";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `product` WHERE `title`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $search_title);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="update.php" method="post" enctype="multipart/form-data">
                <h2>Edit Product</h2>

                <input type="hidden" name="original_title" value="<?php echo $row['title']; ?>">

                <label for="title">Product Name:</label>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" required>

                <label for="price">Price:</label>
                <input type="text" name="price" value="<?php echo $row['price']; ?>" required>

                <label for="image">Image:</label>
                <input type="file" name="image" accept="image/*">

                <input type="submit" value="Update Product">
            </form>

            <button class="go-back-btn" onclick="goBack()">←</button>
    <?php
        } else {
            echo "Product not found.";
        }

        $conn->close();
    }
    ?>
</body>
</html>
