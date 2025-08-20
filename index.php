<?php
// Database connection
$servername = "localhost";
$username = "root";  // Default XAMPP MySQL username
$password = "";      // Default XAMPP MySQL password
$dbname = "web_lab"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert or Update Logic
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    if ($id == '') {
        // Insert new record
        $sql = "INSERT INTO teachers (name, subject, email, phone, address) VALUES ('$name', '$subject', '$email', '$phone', '$address')";
    } else {
        // Update existing record
        $sql = "UPDATE teachers SET name='$name', subject='$subject', email='$email', phone='$phone', address='$address' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch teacher records
$sql = "SELECT * FROM teachers";
$result = $conn->query($sql);

// Fetch data for editing
$teacher = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_sql = "SELECT * FROM teachers WHERE id = $id";
    $edit_result = $conn->query($edit_sql);
    $teacher = $edit_result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profiles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Teacher Profile Management</h1>

    <!-- Form to Add or Edit Teacher -->
    <form action="index.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $teacher ? $teacher['id'] : ''; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="<?php echo $teacher ? $teacher['name'] : ''; ?>"><br>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required value="<?php echo $teacher ? $teacher['subject'] : ''; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo $teacher ? $teacher['email'] : ''; ?>"><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required value="<?php echo $teacher ? $teacher['phone'] : ''; ?>"><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required><?php echo $teacher ? $teacher['address'] : ''; ?></textarea><br>

        <button type="submit" name="submit">Save Profile</button>
    </form>

    <h2>All Teacher Profiles</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
