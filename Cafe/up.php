<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Book</title>
    <link href="de.css" rel="stylesheet" type="text/css">
    <style>
        .go-back-btn {
            margin-top: 20px;
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <form action="edit.php" method="post">
        <center>
            <p>Search Product</p>
        </center>
        <label for="search_title">Search by Title:</label>
        <select name="search_title" required>
            <option value="" disabled selected>Select a product</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cafe";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql_titles = "SELECT DISTINCT title FROM `product`";
            $result_titles = $conn->query($sql_titles);

            if ($result_titles->num_rows > 0) {
                while ($row_titles = $result_titles->fetch_assoc()) {
                    echo "<option value='" . $row_titles["title"] . "'>" . $row_titles["title"] . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Search">
    </form>

    <button class="go-back-btn" onclick="goBack()">← Go Back</button>
</body>
</html>
