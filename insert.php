<!DOCTYPE html>
<html>
<head>
    <title>Personal Profile Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2 class="title">Enter Your Profile</h2>
    <form action="save.php" method="post" enctype="multipart/form-data">
        <label>Full Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="">-- Select Gender --</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label>Date of Birth:</label>
        <input type="date" name="dob" required>

        <label>Phone:</label>
        <input type="text" name="phone" required>

        <label>Address:</label>
        <textarea name="address" required></textarea>

        <label>Department:</label>
        <select name="department" required>
            <option value="">-- Select Department --</option>
            <option value="CSE">CSE</option>
            <option value="IT">IT</option>
            <option value="ECE">ECE</option>
        </select>

        <label>Skills:</label>
        <input type="text" name="skills" required>

        <label>Upload Profile Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" value="Save Profile">
    </form>
</body>
</html>
