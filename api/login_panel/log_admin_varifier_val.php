<!-- <?php
// session_start();
// $connection = mysqli_connect('localhost:4306','root',''); //connection with server apache (servername,username,pwd)
// if($connection) 
// {
//     echo "connection done !! ";
// }
// echo "<br><br>";
// $database = mysqli_select_db($connection,'admin');//(connection vari,database_name) select database
// if($database)
// {
//     echo "database find !! ";
// }
// echo "<br><br>";

// if(isset($_POST['r_val']) && ($_POST['r_val']) == "verifier")
// {
//     $sql1="select * from v_login where v_username='$name' && v_password='$password'";
//     $result=mysqli_query($connection,$sql1);
//     $num=mysqli_num_rows($result);

//     if($num==1)
//     {
//         header('location:verifier_panel.php');
//     }
//     else
//     {
//         header('location:login1.html');
//         echo"Incorrect Username or Password";
//     }
// }
// elseif(isset($_POST['r_val']) && ($_POST['r_val']) == "admin")
// {
//     $sql2="select * from a_login where a_username='$name' && a_password='$password'";
//     $result=mysqli_query($connection,$sql2);
//     $num=mysqli_num_rows($result);
//     if($num==1)
//     {
//         header('location:admin_panel.php');
//     }
//     else
//     {
//         header('location:login1.html');
//         echo"Incorrect Username or Password";
//     }
// }
// else
// {
//     echo"";
// }

    
?> -->

<?php

    session_start();
// if($database)
// {
//     echo "database find !! ";
// }
// echo "<br><br>";

$name=$_POST['username'];
$password=$_POST['password'];
$_SESSION['session']=0;
    if($name=="admin" && $password=="admin")
    {
        $_SESSION['session']=1;
        header('location:../admin/index.php');

    }
    elseif($name=="verifier" && $password=="verifier")
    {
        $_SESSION['session']=1;

        header('location:../verifier/index.php');
    }
    else
    {
        header('location:login1.html');
    }
    
?>      