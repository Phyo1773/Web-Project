<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link href="de.css" rel="stylesheet" type="text/css">
    
    <script>
        function goBack() {
            
            window.history.back();
        }
    </script>
</head>
<body>
   
    <form action="delete.php" method="post">
    <center>
        <p>Delete Product</p>
    </center>
        <label for="title">Select Product to Delete:</label>
        <select name="title" required>
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cafe";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT DISTINCT title FROM `product`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["title"] . "'>" . $row["title"] . "</option>";
                }
            } else {
                echo "<option value=''>No titles found</option>";
            }

            $conn->close();
            ?>
        </select><br>
        <input type="submit" value="Delete Product">
    </form>

    <button class="go-back-btn" onclick="goBack()">←</button>
</body>
</html>
