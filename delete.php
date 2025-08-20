<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "web_lab"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM teachers WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();

// Redirect back to the main page
header("Location: index.php");
exit();
?>
