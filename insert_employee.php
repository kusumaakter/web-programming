<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_lab";

// DB connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get data
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$position = $_POST['position'];
$department = $_POST['department'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Insert
$sql = "INSERT INTO employees (name, email, gender, dob, position, department, phone, address)
VALUES ('$name', '$email', '$gender', '$dob', '$position', '$department', '$phone', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "<h3>Employee added successfully!</h3><a href='employee_form.html'>Add Another</a> | <a href='view_employees.php'>View All</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
