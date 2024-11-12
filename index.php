<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>



<body>
    <form action="index.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
// Enable error reporting to see any issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost"; // Database host
$username = "root"; // Your database username (default for XAMPP is 'root')
$password = ""; // Your database password (default for XAMPP is empty)
$dbname = "loginDB"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
    } else {
        echo "Please enter both name and password.";
    }
}

// SQL query to insert data into the login table
$sql = "INSERT INTO login (name, password) VALUES ('$name', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>


<script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        let name = document.getElementById("name").value;
        let password = document.getElementById("password").value;

        if (!name || !password) {
            alert("Please fill out both fields.");
            event.preventDefault(); // prevent form from submitting
        }
    });
</script>