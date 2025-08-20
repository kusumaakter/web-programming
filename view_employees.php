<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>All Employees</h2>

<?php
$conn = new mysqli("localhost", "root", "", "web_lab");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM employees");

if ($result->num_rows > 0) {
    echo "<table><tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Gender</th><th>DOB</th>
        <th>Position</th><th>Department</th><th>Phone</th><th>Address</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['dob']}</td>
            <td>{$row['position']}</td>
            <td>{$row['department']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['address']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No employees found.</p>";
}
$conn->close();
?>

</body>
</html>
