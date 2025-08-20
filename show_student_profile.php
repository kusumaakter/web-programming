<?php
$conn=mysqli_connect("localhost","root","","student_db");
if(!$conn){
    die("connection failed".mysqli_connect_error());
}
$student_id=$_POST['student_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$department=$_POST['department'];
$region=$_POST['region'];
$address=$_POST['address'];

if(empty($student_id)||empty($name) || empty($email) || empty($phone) || empty($dob) || empty($gender)|| empty($department) || empty($region)|| empty($address)){
    die("all fields are required!.");
}


$sql = "INSERT INTO students (student_id, name, email, phone, dob, gender, department, region, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt=mysqli_prepare($conn,$sql);
if($stmt){
    mysqli_stmt_bind_param($stmt,"sssssssss",$student_id,$name,$email,$phone,$dob,$gender,$department,$region,$address);
if(mysqli_stmt_execute($stmt)){

    echo "<h2> student data saved successfully</h2>";
    echo "<table border='1'cellpadding='10'";
    echo "<tr><th>Attributes</th><th>Value</th></tr>";
    echo "<tr><td>student id</td><td>$student_id</td></tr>";
    echo "<tr><td>Name</td><td>$name</td></tr>";
    echo "<tr><td>Email</td><td>$email</td></tr>";
    echo "<tr><td>phone</td><td>$phone</td></tr>";
    echo "<tr><td>Date of birth</td><td>$dob</td></tr>";
    echo "<tr><td>Gender</td><td>$gender</td></tr>";
    echo "<tr><td>department</td><td>$department</td></tr>";
    echo "<tr><td>region</td><td>$region</td></tr>";
    echo "<tr><td>address</td><td>$address</td></tr>";
    echo "</table>";
    }
    else{
        echo "error:".mysqli_error($conn);}

    mysqli_stmt_close($stmt);
}
else{
    echo "error:".mysqli_error($conn);


}
mysqli_close($conn);


?>