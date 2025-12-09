<?php
$coursecode=$_POST['coursecode'];
$coursename=$_POST['coursename'];
$credit=$_POST['credit'];
$level=$_POST['level'];

//database connection
$data=new mysqli('localhost','root','','college');
if($data->connect_error)
{
    die('connection error'. $conn->connect_error);
}
else
{
    $stmt=$data->prepare("insert into addcourse(coursecode,coursename,credit,level)
       values(?,?,?,?)");
       $stmt->bind_param("isss",$coursecode, $coursename, $credit, $level);
       $stmt->execute();
       header("location: success.html");
       $stmt->close();
       $data->close();
}

?>