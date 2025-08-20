<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $skills = $_POST['skills'];

    // Image Upload Handling
    $imageName = $_FILES['image']['name'];
    $imageTemp = $_FILES['image']['tmp_name'];
    $targetDir = "uploads/";
    $targetPath = $targetDir . basename($imageName);

    // Ensure uploads/ folder exists
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    move_uploaded_file($imageTemp, $targetPath);

    // Save data as JSON
    $profile = [
        'name' => $name,
        'email' => $email,
        'gender' => $gender,
        'dob' => $dob,
        'phone' => $phone,
        'address' => $address,
        'department' => $department,
        'skills' => $skills,
        'image' => $imageName
    ];

    file_put_contents('profile.json', json_encode($profile));
    header("Location: profile.php");
    exit();
}
?>
