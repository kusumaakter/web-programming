<?php
$conn=mysqli_conncet("localhost","root","","student_db");
if(!$conn){
    die("connection error".mysqli_error());
}
if(isset($_GET['delete'])){
    $id=intval($_GET['delete']);
    mysqli_query($conn,"delete form student where id=$id");

}
else{
    header("location:student_list.php");
}
$result=mysqli_query($conn,"select *form students");


?>
<!doctype html>
<html>
    <head><title>student list</title></head>
    <body>
        <h2>student profile</h2>
        <a href="student_form.php">add new student</a>
        <table border='1' cellpadding='10'>
            <tr>
                <th>ID</th><th>student_id</th><th>name</th><th>email</th><th>phone</th><th>dob</th><th>gender</th><th>