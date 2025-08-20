<?php
$conn=mysqli_connect("localhost","root","","student_db");
if(!$conn){
    die("connection failed".mysqli_connect_error());
}
$id=$_GET['id'];
$sqll="select *form students where id=$id";
$result=mysqli_query($conn,$sqll);
if(isset($_POST['update'])){
    $student_id=$_POST['student_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $religion=$_POST['religion'];
    $address=$_POST['address'];
$sql="update students set student_id=?,name=?,email=?,phone=?,dob=?,gender=?,department=?,religion=?,address=? where id=?";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"sssssssss",$student_id,$name,$email,$phone,$dob,$gender,$department,$religion,$address,$id);
if(mysqli_stmt_execute($stmt)){
    header("location:student_list.php");
}
else{
    echo "update failed:".mysqli_error($conn);
}


}


?>
<!doctype html>
<html>
    <head><title>edit student profile</title></head>
    <body>
        <h2>EDIT student profile</h2>
        <form action="" method="post">
            Student_id:<input type="text" name="student_id" value=" <?=$data['student_id']?> " required><br><br>
            Name:<input type="text" name="name" value="<?=$data['name']?>" required><br><br>
            Email:<input type="text" name="email" value="<?=$data['email']?>" required><br><br>
            Phone: <input type="text" name="phone"value="<?=$data['phone']?>"required><br><br>
            Date of Birth: <input type="date" name="dob" value="<?=$data['dob']?>"required><br><br>
           Gender:
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="Male" <?=$data['gender']=='Male'?'selected':''?>">Male</option>
                    <option value="Female""<?=$data['gender']=='Feale'?'selected':''?>">Female</option>
        </select><br><br>

        
        Department: <input type="text" name="department" value="<?=$data['department']?>" required><br><br>
      Religion: <input type="text" name="religion"  value="<?=$data['religion']?>" required><br><br>
        Address: <textarea name="address" required></textarea><br><br>
        <input type="submit" value="update  Student">
    </form>

    <br>
    <a href="student_list.php">back to  List</a>

</body>
</html>

