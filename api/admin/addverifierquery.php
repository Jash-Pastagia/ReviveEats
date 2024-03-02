<?php include'conn.php';?>

<?php session_start(); if($_SESSION['session']==1){?>



<?php
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

$v_name=$_POST['addvname'];
$v_password=$_POST['addvpassword'];
$v_email=$_POST['addvemail'];
$v_username=$_POST['addvusername'];
$v_branch=$_POST['addvbranch'];

$sql1="INSERT INTO v_login (v_name,v_email,v_username,v_password,v_branch) VALUES ('$v_name','$v_email','$v_username','$v_password','$v_branch');";

if ($connection->query($sql1) === TRUE) {
    echo "New record created successfully";
    header('location:verifier.php');
  } else {
    echo "Error: " . $sql1. "<br>" . $conn->error;
  }    
?>


<?php
}

else
{?>
 <script>
        alert("Please Login !!");
        location.replace("../login_panel/login.html")
    </script>

<?php }
?>
