<?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "member";

    // Create connection
    $connect = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Receive input from the form
    $username_member = $_POST['username'];
    $password_member = $_POST['password'];

    // Prepare SQL query to select user data based on the username
    $sql = "SELECT password FROM member_test WHERE username = ?";
    $stmt = $connect->prepare($sql);

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        die("Error in preparing statement: " . $connect->error);
    }

    // Bind the username parameter
    $stmt->bind_param("s", $username_member);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a record was found
    if ($result->num_rows > 0) {
        // Fetch the password from the database
        $row = $result->fetch_assoc();
        $db_password = $row['password'];

        // Compare the password from the form with the password in the database
        if ($password_member === $db_password) {
            echo "Login successful!";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that username!";
    }

    // Close statement and connection
    $stmt->close();
    $connect->close();
?>
