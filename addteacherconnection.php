<?php
$tid=$_POST['tid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$subject=$_POST['subject'];
$gender=$_POST['gender'];

//database connection
$data=new mysqli('localhost','root','','college');
if($data->connect_error)
{
    die('connection error'. $conn->connect_error);
}
else
{
    $stmt=$data->prepare("insert into addteacher(tid,fname,lname,address,email,phone,subject,gender)
       values(?,?,?,?,?,?,?,?)");
       $stmt->bind_param("issssiss",$tid, $fname, $lname, $address,$email, $phone, $subject,$gender);
       $stmt->execute();
       header("location: success.html");
       $stmt->close();
       $data->close();
}

?>