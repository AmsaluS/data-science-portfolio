<?php
// Database connection configuration
$host = "css1.seattleu.edu";    // Remote server host
$username = "ll_aschmidt";      // Your SU username
$password = "K5pwU54Tk3jw2OOw"; // Your MySQL password
$database = "ll_aschmidt";      // Your database name

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    // Log the error instead of displaying it to the user
    error_log("Database connection failed: " . $conn->connect_error);
    die("Sorry, we are experiencing technical difficulties. Please try again later.");
}

// Optional: Set charset to UTF-8 to support special characters
$conn->set_charset("utf8");

// Function to close the database connection
function closeConnection($conn) {
    if ($conn) {
        $conn->close();
    }
}

// Example usage: Call closeConnection($conn) at the end of your scripts
?>