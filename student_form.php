<?php
$conn=mysqli_connect("localhost","root","","student_db");
if(!$conn){
    die("connection failed".mysqli_connect_error());

}
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $student_id=$_POST['student_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $religion=$_POST['religion'];
    $address=$_POST['address'];


    $sql="insert into students(student_id,name,email,phone,dob,gender,department,religion,address)
    values(?,?,?,?,?,?,?,?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_bind_param($stmt,"sssssssss",$student_id,$name,$email,$phone,$dob,$gender,$department,$religion,$address);
    if(mysqli_stmt_execute($stmt)){
        $message="student profile saved successfully";
    }
    else{
        $message="connection error".mysqli_connect_error($conn);
    }
}
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>Add Student Profile</h2>

    <?php
   
    if ($message) {
        echo "<p><strong>$message</strong></p>";
    }
    ?>

    <form method="post" action="">
        Student_id: <input type="text" name="student_id" required><br><br>
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        Date of Birth: <input type="date" name="dob" required><br><br>
        Gender:
        <select name="gender" required>
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        Department: <input type="text" name="department" required><br><br>
        
        Address: <textarea name="address" required></textarea><br><br>
        <input type="submit" value="Save Student">
    </form>

    <br>
    <a href="student_list.php">View Student List</a>

</body>
</html>

<?php

mysqli_close($conn);
?>


?>
