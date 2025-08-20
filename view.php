<!DOCTYPE html>
<html>
<head>
    <title>Student Profiles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="table-wrapper">
    <h2>Student Profile List</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Gender</th><th>DOB</th>
            <th>Department</th><th>Year</th><th>Phone</th><th>Address</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "web_lab");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM students");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['year']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['address']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <p class="link"><a href="insert.php">Add New Student</a></p>
</div>
</body>
</html>
