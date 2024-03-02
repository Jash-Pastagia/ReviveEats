<?php
session_start();
$connection = mysqli_connect('localhost:4306','root',''); //connection with server apache (servername,username,pwd)
if($connection) 
{
    echo "connection done !! ";
}
echo "<br><br>";
$database = mysqli_select_db($connection,'admin');//(connection vari,database_name) select database
if($database)
{
    echo "database find !! ";
}
echo "<br><br>";

$name=$_POST['username'];
$password=$_POST['password'];

$sql1="select * from admin where username='$name' && password='$password'";

$result=mysqli_query($connection,$sql1);
$num=mysqli_num_rows($result);

if($num==1)
{
    if($name=="admin" && $password=="admin")
    {
        header('location:log.jpg');
    }
    else
    {
        header('location:log1.png');
    }
}
else
{
    header('location:login.php');
}
    
?>      