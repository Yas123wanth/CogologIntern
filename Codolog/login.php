<?php
// Database connection details
$servername = "localhost"; // Replace with your server name or IP address
$username = "root"; // Replace with your MySQL username
$password = "root123@#$"; // Replace with your MySQL password
$dbname = "riwaglo"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize and validate input
function sanitize_input($data) {
    $data = trim($data); // Remove whitespace from beginning and end of input
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $wsf_code = sanitize_input($_POST["wsf-code"]);
    $wsf_user_id = sanitize_input($_POST["wsf-user-id"]);
    $user_id = sanitize_input($_POST["user-id"]);
    $password = sanitize_input($_POST["password"]);

    // Example query to insert new user (adjust as per your database schema)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password before storing

    $sql = "INSERT INTO users (wsf_code, wsf_user_id, user_id, password) 
            VALUES ('$wsf_code', '$wsf_user_id', '$user_id', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect to another page or perform additional actions after successful insertion
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();

