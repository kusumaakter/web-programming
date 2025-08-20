<?php
$profile = json_decode(file_get_contents('profile.json'), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2 class="title">My Profile</h2>
    <div class="profile-card">
        <?php
        $imagePath = "uploads/" . $profile['image'];
        if (file_exists($imagePath)) {
            echo "<img src='$imagePath' class='profile-img'>";
        } else {
            echo "<p><em>Image not found</em></p>";
        }
        ?>
        <p><strong>Name:</strong> <?php echo $profile['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $profile['email']; ?></p>
        <p><strong>Gender:</strong> <?php echo $profile['gender']; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo $profile['dob']; ?></p>
        <p><strong>Phone:</strong> <?php echo $profile['phone']; ?></p>
        <p><strong>Address:</strong> <?php echo $profile['address']; ?></p>
        <p><strong>Department:</strong> <?php echo $profile['department']; ?></p>
        <p><strong>Skills:</strong> <?php echo $profile['skills']; ?></p>
    </div>
</body>
</html>
