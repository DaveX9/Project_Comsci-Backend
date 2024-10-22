<?php
// Database connection
$servername = "localhost";
$username = "root";  // default XAMPP username
$password = "";      // default XAMPP password
$dbname = "project"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$title = $_POST['title'];
$content = $_POST['content'];
$image_path = $_POST['image_path'];

// Insert data into the database
$sql = "INSERT INTO news_management (title, description, image_path) VALUES ('$title', '$content', '$image_path')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('บันทึกเรียบร้อย'); window.location.href='news_management.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
