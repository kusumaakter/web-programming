<?php
$conn=mysqli_connect("localhost","root","","user_system");
if(!$conn){
    die("connection failed".mysqli_connect_error());
}
$username=$_POST['username'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
$email=$_POST['email'];
$full_name=$_POST['full_name'];
$contact=$_POST['contact'];

$sql="insert into users(username,password,email,full_name,contact)
values(?,?,?,?,?) ";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"sssss",$username,$password,$email,$full_name,$contact);
if(mysqli_stmt_execute($stmt)){
    echo "registration successfull! <a href='login.php'>login</a>";

}
else{
    echo "error:".mysql_error($conn);
}
mysqli_close($conn);
?>