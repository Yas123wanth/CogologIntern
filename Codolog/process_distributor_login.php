<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if distributor registration form submitted
    if (isset($_POST['iba-id']) && isset($_POST['iba-password'])) {
        $ibaId = $_POST['iba-id'];
        $password = $_POST['iba-password'];

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

        // Prepare SQL query for distributor registration
        $sql = "INSERT INTO distributors (iba_id, iba_password) VALUES ('$ibaId', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Distributor registration successful
            echo "Distributor registration successful!";
            // Redirect or perform further actions
        } else {
            // Distributor registration failed
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

