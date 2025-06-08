<?php
$host = "localhost";
$username = "root"; 
$password = "";
$database = "cafe"; 

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $user_email = $conn->real_escape_string($_POST['user_email']);
    $star_rating = $conn->real_escape_string($_POST['star_rating']);
    $additional_notes = $conn->real_escape_string($_POST['additional_notes']);
    $sql = "INSERT INTO review (user_email, star_rating, additional_notes) VALUES ('$user_email', '$star_rating', '$additional_notes')";
    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
