<!DOCTYPE html>
<html>
<head>
    <title>All User Details</title>
</head>
<body>
    <h1>All User Details</h1>
    <?php
    // Database connection parameters
    $servername = "localhost";
    $username_db = "id21337537_rajdeep";
    $password_db = "raj@12AS";
    $dbname = "id21337537_portfolio";


    // Create a database connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Database connected successfully!<br>";
    }

    // Fetch all user names and email addresses from the database
    $sql = "SELECT username, email FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
