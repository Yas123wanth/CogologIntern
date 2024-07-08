<?php
// Example PHP script handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pincode = $_POST['pincode'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $message = $_POST['message'];

    // Perform database connection and insertion
    $servername = "localhost";
    $username = "root";
    $password = "root123@#$";
    $dbname = "riwaglo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement (example)
    $sql = "INSERT INTO contact_form (name, mobile, email, pincode, district, city, state, message)
            VALUES ('$name', '$mobile', '$email', '$pincode', '$district', '$city', '$state', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
