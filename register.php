<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Create a MySQL connection
    $mysqli = new mysqli("localhost", "id21337537_raj", "qwer@12A", "id21337537_portfolio");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

   

    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($mysqli->query($sql) === TRUE) {
         header("Location: login.html");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>
