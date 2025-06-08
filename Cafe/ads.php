<?php
session_start();

if (!isset($_SESSION['username'])) {
  
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="ads.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="navbar">
    <div class="dropdown">
        <button class="dropbtn" onclick="Menu()">Products</button>
        <div class="dropdown-content">
            <a onclick="insertitem()">Insert Product</a>
            <a onclick="updateitem()">Update Product</a>
            <a onclick="deleteitem()">Delete Product</a>
           
        </div>
    </div>
    <a onclick="View()">Check Review</a>
    <a onclick="order()">View Order</a>
    <a onclick="Logout()">Back To Home</a>
    <span>Welcome, <?php echo $_SESSION['username']; ?></span>
</div>

<div class="container">
   
    <h1>Welcome Admin.</h1>
    <p>This the main page of admin session and have fun!</p>
</div>

<script>
    function Menu() {
        alert('Add/Update/Delete Menu Information functionality to be implemented.');
    }

    function insertitem() {
        window.location.href = "add.html";
        
    }

    function updateitem() {
        window.location.href = "up.php";
        
    }

    function deleteitem() {
        window.location.href = "de.php";
        
    }
    
    function View() {
        window.location.href = "review.php";
        
    }
    function Logout() {
        window.location.href = "Home.php";
    }

    function order(){
        window.location.href="vieworder.php";
    }
</script>

</body>
</html>