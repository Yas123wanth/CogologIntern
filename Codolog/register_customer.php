<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if customer registration form submitted
    if (isset($_POST['customer-id']) && isset($_POST['customer-password'])) {
        $customerId = $_POST['customer-id'];
        $password = $_POST['customer-password'];

        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Database credentials
        $servername = "localhost";
        $username = "root";
        $dbpassword = "root123@#$";
        $dbname = "riwaglo";

        // Create connection
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query for customer registration
        $sql = "INSERT INTO customers (customer_id, customer_password) VALUES ('$customerId', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Customer registration successful
            echo "Customer registration successful!";
            // Redirect or perform further actions
        } else {
            // Customer registration failed
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();

    } else {
        echo "Invalid request."; // Handle invalid form submission
    }
} else {
    echo "Access denied."; // Handle direct access to this script
}

