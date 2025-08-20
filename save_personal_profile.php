<?php
$conn=mysqli_connect("localhost","root","","profile_db");
if(!$conn){
    die("connection failed".mysqli_connect_error());

}
if ( $_SERVER ["REQUEST_METHOD"] == "POST") {
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$nationality=$_POST['nationality'];
$religion=$_POST['religion'];
$address=$_POST['address'];

$sql="insert into profile(name,email,phone,dob,gender,nationality,religion,address)
values(?,?,?,?,?,?,?,?)";
$stmt=mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,"ssssssss",$name,$email,$phone,$dob,$gender,$nationality,$religion,$address);


if(mysqli_stmt_execute($stmt)){
    echo "<h2>personal profile</h2>";
    echo "<table border='1'cellpadding='10'>";
    echo "<tr><th>Attribute</th><th>Value</th></tr>";
    echo "<tr><td>Name</td><td>$name</td></tr>";
    echo "<tr><td>Email</td><td>$email</td></tr>";
    echo "<tr><td>Phone</td><td>$phone</td></tr>";
    echo "<tr><td>Date of birth</td><td>$dob</td></tr>";
    echo "<tr><td>Gender</td><td>$gender</td></tr>";
    echo "<tr><td>Nationality</td><td>$nationality</td></tr>";
    echo "<tr><td>Religion</td><td>$religion</td></tr>";
    echo "<tr><td>Address</td><td>$address</td></tr>";
    echo "</table>";
    echo "<a href='personal_profile.php'>back to form</a>";
}
else{
    echo "connection error".mysqli_connect_error($conn);
}
mysqli_stmt_close($stmt);}
mysqli_close($conn);





?>
