<?php
$conn = mysqli_connect("localhost", "root", "", "user_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            echo "Welcome, " . htmlspecialchars($row['full_name']) . "!<br>";
            echo "Email: " . htmlspecialchars($row['email']) . "<br>";
            echo "Contact: " . htmlspecialchars($row['contact']);
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

mysqli_close($conn);
?>
