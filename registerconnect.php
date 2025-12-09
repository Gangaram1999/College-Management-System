<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$district=$_POST['district'];

//database connection
$conn=new mysqli('localhost','root','','college');
if($conn->connect_error)
{
    die('connection error'. $conn->connect_error);
}
else
{
    $stmt=$conn->prepare("insert into register(fname,lname,address,email,phone,district)
       values(?,?,?,?,?,?)");
       $stmt->bind_param("ssssis", $fname, $lname, $address,$email, $phone, $district);
       $stmt->execute();
       echo" !!! CONGRATULATIONS !!! YOU ARE SUCCESSFULLY REGISTER";
       $stmt->close();
       $conn->close();
}

?>