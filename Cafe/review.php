<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reviews</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family:'Times New Roman', Times, serif;
            background-color: #573306;
            margin: 0;
            padding: 0;
            background-image: url(images/h1.jpeg);
            background-size: cover;
        }

        .main-container {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        p {font-family:'Times New Roman', Times, serif;
            font-size: 24px;
            text-align: center;
            color:#573306;
            margin-bottom: 20px;
            font-weight:bold;
        }

        .table-container {
            width: 100%;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.9);
            overflow: hidden;
        }

        table {
            width: 100%;
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
<button class="go-back-btn" onclick="goBack()">←</button>
<div class="main-container">
    <div class="table-container">
    <span>Welcome, <?php echo $_SESSION['username']; ?></span>
        <p>Viewing Reviews and Recommendations</p>

        <?php
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database = 'cafe';
        $table_name = 'review';

        $connect = mysqli_connect($host, $user, $passwd, $database) or die("could not connect to the database");
        $query = "SELECT * FROM `$table_name`";
        mysqli_select_db($connect, $database);
        $result = mysqli_query($connect, $query);

        if ($result) {
            echo '<div class="table-responsive">';
            echo '<table id="myTable" class="table table-striped table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr><th>User</th><th>Star Rating</th><th>Recommendation</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>';
                foreach ($row as $field) {
                    echo "<td>$field</td>";
                }
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            die("Query=$query failed!");
        }
        mysqli_close($connect);
        
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

</body>
</html>
