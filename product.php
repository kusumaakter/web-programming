<?php
$conn=mysqli_connect("localhost","root","","product_db");
if(!$conn){
    die("connection failed".mysql_connect_error());

}
$sql="insert *form products";
$result=mysqli_query($conn,$sql);

echo "<table ␣ border = ’1 ’␣ cellpadding = ’10 ’ >";
echo "<tr>"

?>