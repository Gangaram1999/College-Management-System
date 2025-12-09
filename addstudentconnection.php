<?php
$symbol=$_POST['symbol'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$course=$_POST['course'];
$district=$_POST['district'];
$gender=$_POST['gender'];

//database connection
$data=new mysqli('localhost','root','','college');
if($data->connect_error)
{
    die('connection error'. $conn->connect_error);
}
else
{
    $stmt=$data->prepare("insert into addstudent(symbol,fname,lname,address,email,phone,course,district,gender)
       values(?,?,?,?,?,?,?,?,?)");
       $stmt->bind_param("issssisss",$symbol, $fname, $lname, $address,$email, $phone, $course,$district,$gender);
       $stmt->execute();
       header("location: success.html");
       $stmt->close();
       $data->close();
}

?>