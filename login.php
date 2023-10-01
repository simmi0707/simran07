<?php
session_start(); // Start a session to store user data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Create a MySQL connection
    $mysqli = new mysqli("localhost", "id21337537_raj", "qwer@12A", "id21337537_portfolio");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Retrieve user data from the database based on the provided email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify the provided password (plain text) with the stored password
        if ($password === $row["password"]) { // Note: This is plain text comparison
            // Authentication successful, store user data in a session
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            header("Location:index.html");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    // Close the database connection
    $mysqli->close();
}
?>
